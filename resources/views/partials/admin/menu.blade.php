@extends('home')

@section('content')
<section class="menuBuilderWrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">


                <div class="wrapper">
                    <h1>Existing posts</h1>
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

                    <h2> Create container</h2>
                    <input type="text" name="containerName" class="containerName"/>
                    <button class="containerAdder">Add</button>

                </div>

                <h3> Containers List </h3>


                <section class="allContainersWrapper">
                    @php
                    $counter=1;
                    $num=count($menuElements)-1;
                    @endphp
                    @for($x=0;$x<=$num;$x++)
                        @if ($menuElements[$x]->slug=='#')
                            <div class="singleContainer" id="a{{$counter}}">
                                <b class="containerName" contentEditable="true">{{$menuElements[$x]->name}}</b>
                                <i class="containerRemoval">Remove</i>
                                @php
                                    $counter++
                                @endphp
                        @else
                            <div>
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
                    {!! Form::submit('Save') !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>

@endsection
