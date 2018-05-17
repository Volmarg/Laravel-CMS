@extends('home')

@section('content')

<section classs="mainWrap" style="display:flex;justify-content:space-around;">

  <div class="wrapper">
    <h1>Existing posts</h1>
    <ol>
      @foreach ($allPosts as $num => $post)
        <li><span class="postNameLinksMenu">{{$post->title}}</span> -> <a data-id="{{$post->id}}" href="{{url($post->slug)}}">{{url($post->slug)}}</a><span class="addElemenMenu">[+]</span></li>
      @endforeach
    </ol>

  </div>

  <div class="wrapper">

    <h1> Menu management here </h1>
    {{-- This one prints level 1 menu --}}
    <form action="menu-edit" method="POST" class="menuActiveElementsAdmin">
        {{csrf_field()}}
      <input type="hidden" value="test" />
      <ul>
        @foreach ($menuElements as $key => $lvl_1)
          {{-- but print only if given element doesnt have a parent so it's main menu element --}}
          @if ($lvl_1->parentID=='-1')
            <li>{{$lvl_1->name}} - {{$lvl_1->slug}}
              <input type="hidden" name="{{$lvl_1->id}}" value="true" />
              {{-- Now for each element we need to check if there is any element which parent id is eq to this one id --}}
              <ul>
                @foreach ($menuElements as $key_ => $lvl_2)
                    @if ($lvl_1->id==$lvl_2->parentID)
                      <li>{{$lvl_2->name}} <span class="removeMenuElement">[-]</span></li>
                      <input type="hidden" name="{{$lvl_2->id}}" value="true" />
                    @endif
                @endforeach
              </ul>
            </li>
          @endif
        @endforeach
      </ul>

      <input type="submit" value="Save" />
    </form>


  </div>


</section>

@endsection
