@extends('welcome')

@section('content')


  <h1 style="">Homepage</h1>
  <div class="posts">
    <ul class="cards">
  @foreach ($posts as $key => $post)


        <li class="cards__item">
          <div class="card">
            <div class="card__image card__image--fence"></div>
            <div class="card__content">
              <div class="card__title">{{$post->title}}</div>
              <p class="card__text">
                {!! str_limit(strip_tags(trim($post->body)),100) !!}
              </p>
              <a href="{{url("/page/post/$post->slug")}}"><button class="btn btn--block card__btn">Read more</button></a>
            </div>
          </div>
        </li>

  @endforeach
        </ul>
      </div>

  <hr/>

@endsection
