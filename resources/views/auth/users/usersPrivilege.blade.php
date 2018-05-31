@extends('home')

@section('content')

    <section classs="mainWrap" style="display:flex;justify-content:space-around;">

        <div class="wrapper usersWrap usersPrivilege">

            <h1>Users data here</h1>
            <form action="/users/changeUserPrivileges" method="POST">
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
                                @foreach($privileges[$key] as  $count=>$oneUser)
                                        @if($oneUser=='enable')
                                            <th><input type="checkbox" checked name="pivilegeSingle{{$key}}[{{$count}}]" class="stateMark" data-name="{{$key}}[{{$count}}]"/> </th>
                                        @else
                                            <th><input type="checkbox" name="pivilegeSingle{{$key}}[{{$count}}]" class="stateMark" data-name="{{$key}}[{{$count}}]"/>
                                                <input type="hidden" name="pivilegeOffSingle{{$key}}[{{$count}}]" value="off"/>
                                            </th>
                                        @endif

                                @endforeach
                            </tr>

                    @endforeach

                    </tbody>
                </table>


                {!! csrf_field() !!}
                <input type="submit" name="submited" value="Update" class="btn btn-warning">
                <input type="hidden" value="{{$names}}" name="privNames" />
            </form>


        </div>

    </section>

@endsection
