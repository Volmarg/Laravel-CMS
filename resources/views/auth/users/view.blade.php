@extends('home')

@section('content')

<section classs="mainWrap" style="display:flex;justify-content:space-around;">

  <div class="wrapper">

    <h1>Users data here</h1>

    <table>
      <thead>

      </thead>
      <tbody>

          @foreach ($allUsers as $key => $value)
        <tr>
            <td>{{$key}}.</td>
            <td><b>{{$value->name}}</b></td>
            <td><b>{{$value->accountType}}</b></td>
        </tr>
          @endforeach

      </tbody>
    </table>

  </div>

</section>

@endsection
