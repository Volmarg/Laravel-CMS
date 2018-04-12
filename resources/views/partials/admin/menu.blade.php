@extends('home')

@section('content')

<section classs="mainWrap" style="display:flex;justify-content:space-around;">

  <div class="wrapper">

    <h1> Menu management here </h1>
    @foreach ($menuElements as $key => $element)
      {{$element->name}} - {{$element->slug}}</br>
    @endforeach
  </div>

</section>

@endsection
