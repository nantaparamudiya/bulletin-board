@if ( Route::is('bulletin.index') )

  @php $id = session('bulletin.id') ?? session('input.id') @endphp

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
        </div>

        <form action="{{ route('bulletin.update', $id) }}" method="post" enctype="multipart/form-data">

          <div class="modal-body">

            @if ($errors->patch->any())
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><strong>Whoops!</strong></h4>
                @foreach ($errors->patch->all() as $error)
                  {{ $error }}
                  <br>
                @endforeach
              </div>
            @endif

            @method('PATCH')
            @csrf

            @php
              $name = (session('name') === 'No Name') ? null : session('name');
            @endphp

            <input type="hidden" name="id" value="{{ session('input.id') ?? session('bulletin.id')  }}">
            <input type="hidden" name="password" value="{{ session('input.password') ?? session('bulletin.password') }}">

            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="{{ session('input.name') ?? $name }}">
            </div>
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" value="{{  session('input.title') ?? session('bulletin.title') }}">
            </div>
            <div class="form-group">
              <label>Body</label>
              <textarea rows="5" class="form-control" name="message">{{ session('input.message') ?? session('bulletin.message') }}</textarea>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <img class="img-responsive" alt="Image Post" src="{{ session('image') }}">
              </div>
              <div class="col-md-8 pl-0">
                <label>Choose image from your computer :</label>
                <div class="input-group">
                  <input type="text" class="form-control upload-form" value="No file chosen" readonly>
                  <span class="input-group-btn">
                    <span class="btn btn-default btn-file">
                      <i class="fa fa-folder-open"></i>&nbsp;Browse <input type="file" name="image" value="{{ session('input.image') ?? session('bulletin.image') }}">
                    </span>
                  </span>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="delete">Delete image
                  </label>
                </div>
              </div>
            </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
        </div>

        <div class="modal-body pad-20">
          <p>Are you sure want to delete this item?</p>
        </div>

        <div class="modal-footer">

          <form action="{{ route('bulletin.destroy', $id) }}" method="post">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            @method('DELETE')
            @csrf
            <input type="hidden" name="password" value="{{ session('bulletin.password') }}">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>

        </div>

      </div>
    </div>
  </div>

@endif

<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
          <h4 class="alert-heading"><strong>Whoops!</strong></h4>
          <p><strong>{{ session('error') }}</strong></p>
        </div>

        @if (!is_null(session('method')))

          @if (session('method') === 'edit')
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="{{ session('bulletin.name') }}" disabled>
            </div>

            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" value="{{ session('bulletin.title') }}" disabled>
            </div>

            <div class="form-group">
              <label>Body</label>
              <textarea rows="5" class="form-control" name="message" disabled>{{ session('bulletin.message') }}</textarea>
            </div>
          @endif
          
          @if (session('showPasswordForm'))
            @include ('bulletin-board.components.password-modal')
          @endif

        @endif

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>