@extends('home')

@section('content')

<section classs="mainWrap" style="display:flex;justify-content:space-around;">

  <div class="wrapper">
    <h1>Existing posts</h1>
    <ol>
      @foreach ($allPosts as $num => $post)
        <li>{{$post->title}} -> <a href="{{url($post->slug)}}">{{url($post->slug)}}</a></li>
      @endforeach
    </ol>

  </div>

  <div class="wrapper">

    <h1> Menu management here </h1>
    @foreach ($menuElements as $key => $element)
      {{$element->name}} - {{$element->slug}}</br>
    @endforeach
  </div>


</section>

@endsection
