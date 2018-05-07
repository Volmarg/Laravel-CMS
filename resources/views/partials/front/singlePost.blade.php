@extends('welcome')

@section('content')

  <h1>{{$postData->title}}</h1>
  <section class="description singlePost"><b>{!!$postData->body!!}</b></section>

@endsection
