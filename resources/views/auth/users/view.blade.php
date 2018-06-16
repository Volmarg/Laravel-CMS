@extends('home')

@section('content')

    <section class="mainWrap usersPanel" style="display:flex;justify-content:space-around;">

        <div class="wrapper usersWrap ">

            <h1>Users roles</h1>
            <form action="/users/changeUserType" method="POST">
                <table class="usersRoles table table-responsive responsive-table">
                    <thead>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Curr. role</th>
                        <th scope="col">Select role</th>
                        <th scope="col">Remove</th>
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
                                <td><b>{{$value->accountType}}</b></td>
                                <td >
                                    @if(auth()->user()->name!=$value->name)
                                        <select name="accountType-select-{{$value->name}}" class="form-control">
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
                                      <a href="/users/remove/{{$value->name}}">
                                        <img class="removeButton" src="{{asset('/img/icons8-delete-64.png')}}"/>
                                        </a>
                                    @else
                                        <b>Can't remove</b>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>


                {!! csrf_field() !!}
                <input type="submit" name="submited" value="Update" class="btn btn-info">
            </form>


        </div>

    </section>

@endsection
