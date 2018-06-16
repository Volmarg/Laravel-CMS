@extends('home')

@section('content')

    <section classs="mainWrap" style="display:flex;justify-content:space-around;">

        <div class="wrapper usersWrap usersPrivilege usersPanel">

            <h1>Users privileges</h1>
            <form action="/users/changeUserPrivileges" method="POST">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">User.</th>
                        @foreach($privileges[0] as $name=>$privilege)
                            <th scope="col">{{$name}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($allUsers as $key => $value)
                        @if(auth()->user()->name==$value->name)
                            <tr class="activeUser" style="display:none;">
                        @else
                            <tr>
                                @endif
                                <td>{{$key}}.</td>
                                <td><b>{{$value->name}}</b></td>
                                @foreach($privileges[$key] as  $count=>$oneUser)
                                    @if($oneUser=='enable')
                                        <th>
                                            <input
                                                    checked
                                                    name="pivilegeSingle{{$key}}[{{$count}}]"
                                                    class="stateMark"
                                                    data-name="{{$key}}[{{$count}}]"
                                                    type="checkbox"
                                            @if(auth()->user()->name!=$value->name)

                                            @else
                                                    readonly="readonly"
                                            @endif
                                            />
                                        </th>
                                    @else

                                        <th>
                                            <input
                                                    name="pivilegeSingle{{$key}}[{{$count}}]"
                                                    class="stateMark"
                                                    data-name="{{$key}}[{{$count}}]"
                                                    type="checkbox"
                                            @if(auth()->user()->name!=$value->name)

                                            @else
                                                    readonly="readonly"
                                            @endif
                                                />
                                                <input
                                                   type="hidden"
                                                   name="pivilegeOffSingle{{$key}}[{{$count}}]"
                                                   value="off"
                                                />
                                        </th>
                                    @endif

                                @endforeach
                            </tr>

                            @endforeach

                    </tbody>
                </table>


                {!! csrf_field() !!}
                <input type="submit" name="submited" value="Update" class="btn btn-info">
                <input type="hidden" value="{{$names}}" name="privNames" />
            </form>


        </div>

    </section>

@endsection
