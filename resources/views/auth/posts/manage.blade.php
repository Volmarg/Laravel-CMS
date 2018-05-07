@extends('home')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Manage posts</h1>
                <ul>
                  @foreach ($posts as $key => $single)
                    <li>
                      <a href="/posts/edit/{{$single->slug}}">{{$single->title}}</a> | <a href="/posts/remove/{{$single->slug}}"/>Remove</a>
                    </li>
                  @endforeach
                </ul>
          </div>
        </div>
      </div>

@endsection
