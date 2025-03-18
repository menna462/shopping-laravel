@extends('backend.admindashboard')
@section('main')
<div class="container">
    <div class="row">
        @if(session('reload'))
    <script>
        window.location.reload();
    </script>
@endif
        <div class="col-md-4 mb-4">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="mb-0">{{$totalUsers}}</h4>
                    <p class="small text-muted mb-0">User</p>
                  </div>
                  <div class="col-5">
                    <div id="gauge1" class="gauge-container"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="mb-0">{{$totalProducts}}</h4>
                    <p class="small text-muted mb-0">Product</p>
                  </div>
                  <div class="col-5">
                    <div id="gauge2" class="gauge-container"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
