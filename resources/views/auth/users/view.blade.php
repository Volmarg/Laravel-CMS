@extends('home')

@section('content')

    <section classs="mainWrap" style="display:flex;justify-content:space-around;">

        <div class="wrapper usersWrap">

            <h1>Users data here</h1>
            <form action="/users/changeUserType" method="POST">
                <table>
                    <thead>

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
                                <td><b>{{$value->accountType}}</b></td>
                                <td>
                                    @if(auth()->user()->name!=$value->name)
                                        <select name="accountType-select-{{$value->name}}">
                                            @foreach($accountTypes as $key => $type)
                                                <option
                                                        @if ($value->accountType==$type->type)
                                                        selected
                                                        @endif
                                                >
                                                    {{$type->type}}
                                                </option>

                                            @endforeach
                                        </select>
                                    @else
                                        <b>Can't change</b>
                                    @endif
                                </td>
                                <td>
                                    @if(auth()->user()->name!=$value->name)
                                        <a href="/users/remove/{{$value->name}}">Remove</a>
                                    @else
                                        <b>Can't remove</b>
                                    @endif
                                </td>
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
