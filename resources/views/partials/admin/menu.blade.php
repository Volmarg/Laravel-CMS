@extends('home')

@section('content')
<section class="menuBuilderWrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">


                <div class="wrapperControllers">

                    <div class="existingPosts_">
                        <h1>Existing posts</h1>
                        <div class="existingPosts">
                            <div id="A" class="">
                                @foreach ($allPosts as $num => $post)
                                    <div class="">
                                        <span class="copy">
                                           <span class="postName">{{$post->title}}</span>
                                           <span class="postLink">{{url($post->slug)}}</span>
                                        </span>
                                       <!-- <span class="containerAdder"> [ + ] </span> !-->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="createContainer">
                        <h2> Create container</h2>
                        <input type="text" name="containerName" class="containerName form-control"/>

                        <div class="upload-btn-wrapper">
                            <button class="containerAdder formButton">Add</button>
                        </div>
                    </div>
                </div>

                <h3> Containers List </h3>


                <section class="allContainersWrapper">
                    @php
                    $counter=1;
                    $num=count($menuElements)-1;
                    @endphp
                    @for($x=0;$x<=$num;$x++)
                        @if ($menuElements[$x]->slug=='#')
                            <div class="singleContainer" id="a{{$counter}}" data-num="{{$counter}}">
                                <span class="containerControll">
                                    <b class="containerName" contentEditable="true">
                                        {{$menuElements[$x]->name}}
                                    </b>
                                    <i class="containerRemoval">Remove</i>
                                </span>
                                @php
                                    $counter++
                                @endphp
                        @else
                            <div class="singleElementControll">
                                 <span class="copy">
                                     <span class="postName">
                                         {{$menuElements[$x]->name}}
                                     </span>
                                     <span class="postLink">
                                         {{$menuElements[$x]->slug}}
                                     </span>
                                 </span>
                                 <i class="js-remove">✖</i>
                            </div>
                            @if ($x+1<=$num)
                                @if($menuElements[$x+1]->slug=='#')
                            </div>
                                @endif
                            @else
                            </div>
                            @endif
                        @endif
                    @endfor

                </section>

                {!! Form::open(['url'=>'/menu-edit','method'=>'POST']) !!}
                    {!! Form::hidden('json','',['class'=>"jsonHolder"]) !!}
                    <div class="upload-btn-wrapper">
                        <button class="formButton">Save</button>
                        {!! Form::submit('Save',['class'=>'formButton']) !!}
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>

@endsection
