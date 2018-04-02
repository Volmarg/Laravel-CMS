@extends('welcome')

@section('content')
  <h1>this is content</h1>

  @foreach ($posts as $key => $post)
    <div class="post">

    <h2>{{$post->title}}</h2>
    <p>{!! $post->body !!}</p>
    <h6>Posted by: {!! $post->user->name !!}</h6>

  </div>

  @endforeach
@endsection
