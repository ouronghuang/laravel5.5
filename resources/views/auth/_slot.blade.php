<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-5">
      <card>
        @include('layouts._errors')
        {{ $slot }}
      </card>
    </div>
  </div>
</div>
