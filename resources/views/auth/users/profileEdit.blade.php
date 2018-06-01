@extends('home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>User Settings panel</h1>
                    {!! Form::open(['url'=>'/user-settings/user-options-save','method'=>'post']) !!}
                       <div class="form-group">
                        {!! Form::label('name','Enter new name') !!}
                        {!! Form::text("name",Auth()->user()->name,['class'=>'form-control',]) !!}

                        {!! Form::label('email','Enter new email') !!}
                        {!! Form::email('email',Auth()->user()->email,['class'=>'form-control']) !!}

                        {!! Form::label('password','Enter new password') !!}
                        {!! Form::text('password','',['class'=>'form-control']) !!}

                        {!! Form::label('image','Enter external link to image') !!}
                        {!! Form::text('image',Auth()->user()->image,['class'=>'form-control']) !!}
                       </div>

                        <div class="form-group">
                            <img src="{{Auth()->user()->image}}" style="width:250px;"/>
                        </div>

                        <div class="form-group">
                        {!! Form::submit('Save changes',['class'=>'btn btn-default']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
         </div>
    </div>


@endsection
