@extends('welcome')

@section('content')
  <h1>this is content</h1>

  @foreach ($posts as $key => $post)
    <div class="post">

    <h2><a href="{{url("/page/post/$post->slug")}}">{{$post->title}}</a></h2>
    <p>{!! $post->body !!}</p>
         <h6>Posted by: {!! $post->user->name !!}</h6>

  </div>

  @endforeach
@endsection
