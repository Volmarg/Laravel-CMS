@extends('home')

@section('scripts')
  <script src="/js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
      selector: '#textAreaTinyMce',
      plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    });
</script>
@endsection

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
<!--                        !-->
<form class="" action="/posting" method="post">
  {{csrf_field()}}

 <div class="form-group">
   <label for="name">Post name</label>
   <input type="text" class="form-control" id="name" name="title" value="{{$post->title}}">
 </div>
 <div class="form-group">
   <input type="hidden" class="form-control" id="name" name="post_id" value="{{$post->id}}">
 </div>
 <div class="form-group">
   <label for="body">Post body</label>
   <textarea class="form-control" id="textAreaTinyMce" name="body" value="">{{$post->body}}</textarea>
 </div>
 <button type="submit" class="btn btn-default">Submit</button>
</form>

<hr><hr>
@if ($errors)
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
  </ul>
@endif

<!--                        !-->

          </div>
        </div>
      </div>

@endsection
