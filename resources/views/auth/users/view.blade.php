@extends('home')

@section('content')

<section classs="mainWrap" style="display:flex;justify-content:space-around;">

  <div class="wrapper usersWrap">

    <h1>Users data here</h1>
<form action="/users-change-privilage" method="POST">
    <table>
      <thead>

      </thead>
      <tbody>

          @foreach ($allUsers as $key => $value)
        <tr>
            <td>{{$key}}.</td>
            <td><b>{{$value->name}}</b></td>
            <td><b>{{$value->accountType}}</b></td>
            <td><select name="accountType-select-{{$value->name}}">
                @foreach($accountTypes as $key => $type)
                    <option
                      @if ($value->accountType==$type->type)
                        selected
                      @endif
                    >
                      {{$type->type}}
                    </option>
                @endforeach
            </select></td>
            <td><a href="user-remove/{{$value->name}}">Remove</a></td>
        </tr>
          @endforeach

      </tbody>
    </table>


      {!! csrf_field() !!}
      <input type="submit" name="submited" value="Update" class="btn btn-warning">
    </form>


  </div>

</section>

@endsection
