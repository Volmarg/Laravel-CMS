@extends('home')

@section('content')
  <section class="mediaLibrary">
      <section class="gallery">


      @foreach ($smallImages as $num=>$oneImage)
         <div class="singleImageWrapper">
                  <img src="{!! url(str_replace('public/images/', 'storage/images/', $oneImage)) !!}" class="media-lib-image"/>
                    <span class="removalButton">
                     <a href="/media/process?method=remove&fileName={{$oneImage}}">
                       ✗
                     </a>
                    </span>
         </div>
      @endforeach

          @foreach ($bigImages as $num=>$oneImage)
              <div class="singleImageWrapper">
                  <img src="{!! url(str_replace('public/images/', 'storage/images/', $oneImage)) !!}" class="media-lib-image"/>
                  <span class="removalButton">
                     <a href="/media/process?method=remove&fileName={{$oneImage}}">
                       ✗
                     </a>
                    </span>
              </div>
          @endforeach

      </section>
  </section>

@endsection
