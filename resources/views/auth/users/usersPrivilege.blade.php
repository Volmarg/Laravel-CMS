@extends('home')

@section('content')

    <section classs="mainWrap" style="display:flex;justify-content:space-around;">

        <div class="wrapper usersWrap usersPrivilege">

            <h1>Users data here</h1>
            <form action="/users/changeUserType" method="POST">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>User.</th>
                            @foreach($privileges[0] as $name=>$privilege)
                                <th>{{$name}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($allUsers as $key => $value)
                        @if(auth()->user()->name==$value->name)
                            <tr class="activeUser">
                        @else
                            <tr>
                        @endif
                                <td>{{$key}}.</td>
                                <td><b>{{$value->name}}</b></td>
                                @foreach($privileges[$key] as  $oneUser)
                                        @if($oneUser=='enable')
                                            <th><input type="checkbox" checked/> </th>
                                        @else
                                            <th><input type="checkbox"/> </th>
                                        @endif

                                @endforeach
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
