@extends('home')

@section('content')
  @foreach ($allImages as $oneImage)
    <img src="{!! url(str_replace('public/images/', 'storage/images/', $oneImage)) !!}" class="media-lib-image"/>
    <a href="/media-process?method=remove&fileName={{$oneImage}}"><button>Remove</button></a>
  @endforeach
@endsection
