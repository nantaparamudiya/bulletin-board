<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\User;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ImageController as Image;

class BulletinController extends Controller
{
    private $rules = [
        'name'     => ['nullable', 'between:3,16'],
        'title'    => ['required', 'between:10,32'],
        'message'  => ['required', 'between:10,200'],
        'image'    => ['file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulletins = Bulletin::orderBy('id', 'desc')->paginate(10);

        $render = function($image) { $this->renderImage($image); };

        return view('bulletin-board.index', compact('bulletins', 'render'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->rules['password'] = ['nullable', 'digits:4'];
        $this->rules['user'] = ['sometimes', 'nullable'];

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        if (!empty($data['image'])) {
            $imageController = new Image();

            $image = $imageController->upload($data['image']);
            unset($data['image']);
        } else {
            $image = ['name' => null];
        }

        $data['password'] = !is_null($data['password']) ? Hash::make($data['password']) : null;

        if (!empty($data['user'])) unset($data['user']);

        $bulletin = Bulletin::create($data);

        $bulletin->image()->create($image);

        if (!empty($data['user'])) User::where('id', $data['user'])->update(compact('bulletin_id'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $bulletin = Bulletin::find($request->id);

        if ( Auth::check() && (Auth::user()->id === $bulletin->user_id) ) {
            
            return redirect()->back()->with([
                'modal'     => '#editModal',
                'bulletin'  => $bulletin,
                'name'      => $this->createPlaceholderName($bulletin->name),
                'image'     => $bulletin->image->name,
            ]);

        } else {
            $hashedPassword = $bulletin->password;

            $error = $this->checkPassword($request->password, $hashedPassword);

            if ($error) {
                return redirect()->back()->with($this->showError($error, $bulletin, $request->method));
            }

            return redirect()->back()->with([
                'modal'     => '#editModal',
                'bulletin'  => $bulletin,
                'name'      => $this->createPlaceholderName($bulletin->name),
                'image'     => $this->createImagePath($bulletin->image),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bulletin $bulletin)
    {
    	if (+$request->id !== $bulletin->id) {
    		return redirect()->back()->with('scissor', 'Ikuti alurnya, please :(');
    	}
    
        $validator = Validator::make($request->all(), [
            'name'     => 'nullable|between:3,16',
            'title'    => 'required|between:10,32',
            'message'  => 'required|between:10,200',
            'image'    => 'file|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if ($validator->fails()) {

            if (is_null($request->file('image'))) {
                $request->session()->put('image', 'img-placeholder.png');
            }

            return redirect()->back()->with([
                'modal'  => '#editModal',
                'input'  => $request->all(),
            ])->withErrors($validator, 'patch');
        }

        $imageController = new Image();

        if ($request->password === $bulletin->password || Auth::user()->id === $bulletin->user->id) {

            $image = (! $request->delete) ? $imageController->upload($request->file('image')) : null;

            Bulletin::where('id', $bulletin->id)->update([
                'name'    => $request->name ?? null,
                'title'   => $request->title,
                'message' => $request->message,
                'image'   => $image,
            ]);
            
            if (!is_null($bulletin->image->name)) {
                if ($image === $bulletin->image->name && is_null($request->delete)) {
                    return redirect()->back();
                }
                $imageController->delete($bulletin->image->name);
            }

            return redirect()->back();

        } else {
            return redirect()->back()->with([
                'modal' => '#errorModal',
                'error' => 'Not Authorized to Access',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $bulletin = Bulletin::find($request->id);

        if ( Auth::check() && (Auth::user()->id === $bulletin->user_id) ) {

            return redirect()->back()->with([
                'modal' => '#deleteModal',
                'bulletin' => $bulletin,
            ]);

        } else {
            $hashedPassword = $bulletin->password;

            $error = $this->checkPassword($request->password, $hashedPassword);

            if ($error) {
                return redirect()->back()->with($this->showError($error, $bulletin, $request->method));
            } else {
                return redirect()->back()->with([
                    'modal' => '#deleteModal',
                    'bulletin' => $bulletin,
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bulletin  $bulletin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Bulletin $bulletin)
    {
    	if (+$request->id !== $bulletin->id) {
    		return redirect()->back()->with('scissor', 'Ikuti alurnya, please :(');
    	}
    	
        if ($request->password === $bulletin->password || Auth::user()->id === $bulletin->user_id) 
        {
            Bulletin::destroy($bulletin->id);

            if (! is_null($bulletin->image)) {
                // unlink(public_path(sprintf('%s/%s', Bulletin::IMAGE_PATH, $bulletin->image)));
                Storage::disk('local')->delete( sprintf('public/%s/%s', Bulletin::IMAGE_PATH, $bulletin->image) );
            }
            
            return redirect()->back();
        } 
        else
        {
            return redirect()->back()->with([
                'modal' => '#errorModal',
                'error' => 'Not Authorized to Access',
            ]);
        }
    }

    protected function renderImage($image)
    {
        return !is_null($image)
            ? asset('storage/images/245/' . $image)
            : asset('null.png');
    }

    protected function checkPassword($newPassword, $hashedPassword)
    {
        if (!is_null($hashedPassword)) {
            if (Hash::check($newPassword, $hashedPassword)) {
                return false;              
            } else {
                return 'The password you entered does not match. Please try again.';
            }
        } else {
            return 'This message can’t %s, because this message has not been set password.';
        }
    }

    protected function showError($errorMessage, $data, $method)
    {
        $components = [
            'modal'            => '#errorModal',
            'error'            => sprintf($errorMessage, $method),
            'method'           => $method,
            'bulletin'         => $data,
            'showPasswordForm' => true,
        ];

        if (in_array('%s,', explode(' ', $errorMessage))) {
            $components['showPasswordForm'] = false;
        }

        return $components;
    }

}
