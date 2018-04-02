@extends('home')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Post data</h1>
                @include('partials/admin/postPanel')
          </div>
        </div>
      </div>

@endsection
