@php $id = $bulletin->id ?? session('bulletin.id') @endphp

<form class="form-inline mt-30" method="get">
  @csrf

  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" name="password" id="inputPassword2" placeholder="Password">
    <input type="hidden" name="id" value="{{ $id }}">
  </div>

  @if (session('method') === 'edit')
    <button type="submit" name="method" value="edit" class="btn btn-primary mb-2" data-toggle="modal" formaction="{{ route('bulletin.edit', $id) }}">Edit</button>
  @else
    <button type="submit" name="method" value="delete" class="btn btn-danger mb-2" data-toggle="modal" formaction="{{ route('bulletin.destroy', $id) }}">Delete</button>
  @endif

</form>