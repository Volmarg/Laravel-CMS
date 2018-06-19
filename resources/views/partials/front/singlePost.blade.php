@extends('welcome')

@section('scripts')
    <script src="/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#textAreaTinyMce2',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>
@endsection

@section('meta')
    @foreach($meta as $num=>$onePage)
      @if($meta[$num]['id']==$postData->id)
        <title>{{$meta[$num]['metaTitle']}}</title>
        <meta name="description" content="{{$meta[$num]['metaDescription']}}"/>
      @endif
    @endforeach

@endsection

@section('content')
 <section class="postHolder">
    <div class="breadcrumbs">
        <a href="{{url()->previous()}}">Home</a>
        <span>/</span>
        <span >{{$postData->title}}</span>
    </div>

  <h1>{{$postData->title}}</h1>
  <section class="description singlePost"><b>{!!$postData->body!!}</b></section>
</section>
@endsection
