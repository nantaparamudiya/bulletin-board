<?php

namespace App\Http\Controllers;

use App\Models\Image as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use File;

class ImageController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        $this->path = storage_path(Model::$path);
        $this->dimensions = Model::$dimensions;
    }

    public function upload($file)
    {
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $fileName = $file->hashName();
        Image::make($file)->save(sprintf('%s/%s', $this->path, $fileName));

        foreach ($this->dimensions as $row) {
            $canvas = Image::canvas($row, $row);

            $resizeImage = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });

            $rowPath = sprintf('%s/%s', $this->path, $row);

            if (!File::isDirectory($rowPath)) {
                File::makeDirectory($rowPath);
            }

            $canvas->insert($resizeImage, 'center');
            $canvas->save(sprintf('%s/%s', $rowPath, $fileName));
        }

        return ['name' => $fileName];
    }

    public function delete($image)
    {
        Storage::disk('local')->delete(sprintf('%s/%s', $this->path, $image));

        foreach ($this->dimensions as $row) {
            Storage::disk('local')->delete(sprintf('%s/%s/%s', $this->path, $row, $image));
        }

        return $image;
    }
}
