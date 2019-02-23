@if (session('success'))
  <div class="alert alert-success">
    <strong>{{ session('success') }}</strong>
  </div>
@endif


@if (session('error'))
  <div class="alert alert-danger">
    <strong>{{ session('error') }}</strong>
  </div>
@endif
