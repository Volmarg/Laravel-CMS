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
            <td><select>
                @foreach($accountTypes as $key => $type)
                    <option>
                      {{$type->type}}
                    </option>
                @endforeach
            </select></td>
            <td>Remove</td>
        </tr>
          @endforeach

      </tbody>
    </table>

    <button class="btn btn-warning">Update</button>

  </div>

</section>

@endsection
