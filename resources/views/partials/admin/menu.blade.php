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

                </div>

                <h3> Containers List </h3>


                <section class="allContainersWrapper">
                        <div class="singleContainer"  id="a1" data-num="1">
                            <b class="containerName">qux</b>
                        </div>

                        <div class="singleContainer"  id="a2" data-num="2">
                            <b class="containerName">quux</b>
                        </div>
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
