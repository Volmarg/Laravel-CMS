@extends('home')

@section('content')

<h1>Users data here</h1>

@foreach ($allUsers as $key => $value)

  {{$key}}. <b>{{$value->name}}</b><br/>

@endforeach

@endsection
