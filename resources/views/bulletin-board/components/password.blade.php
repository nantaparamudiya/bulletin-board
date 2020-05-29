@php $id = $bulletin->id ?? session('bulletin.id') @endphp

<form class="form-inline mt-30" method="get">
	@csrf
  <input type="hidden" name="id" value="{{ $id }}">

  @auth
  
    @if (! is_null($bulletin->user_id) )
      <button type="submit" name="method" value="edit" class="btn btn-default mb-2" data-toggle="modal" formaction="{{ route('bulletin.edit', $id) }}"><i class="fa fa-pencil p-3"></i></button>
      <button type="submit" name="method" value="delete" class="btn btn-danger mb-2" data-toggle="modal" formaction="{{ route('bulletin.delete', $id) }}"><i class="fa fa-trash p-3"></i></button>
    @endif

  @else

    @if ( is_null($bulletin->user_id) )
      <div class="form-group mx-sm-3 mb-2">
        <label for="inputPassword2" class="sr-only">Password</label>
        <input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password">
      </div>

      <button type="submit" name="method" value="edit" class="btn btn-default mb-2" data-toggle="modal" formaction="{{ route('bulletin.edit', $id) }}"><i class="fa fa-pencil p-3"></i></button>
      <button type="submit" name="method" value="delete" class="btn btn-danger mb-2" data-toggle="modal" formaction="{{ route('bulletin.delete', $id) }}"><i class="fa fa-trash p-3"></i></button>
    @endif

  @endauth
</form>