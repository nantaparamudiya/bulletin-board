@foreach ($bulletins as $bulletin)
  <div class="post">
    <div class="clearfix">

      <div class="pull-left">
        <h2 class="mb-5 text-green">
          <b>{{ $bulletin->name ?? 'No Name' }}</b>
        </h2>
      </div>

      <div class="pull-right text-right">
        <p class="text-lgray">
          {{ $bulletin->created_at->format('d-m-Y') }}
          <br/>
          <span class="small">{{ $bulletin->created_at->format('H:i') }}</span>
        </p>
      </div>

    </div>

    <h4 class="mb-20">{{ $bulletin->title }}</h4>
    <p class="mb-20">{!! nl2br($bulletin->message) !!}</p>
    <img class="img-responsive" src="{{ $render($bulletin->image->name) }}" alt="">

    @include('bulletin-board.components.password')
  </div>
@endforeach