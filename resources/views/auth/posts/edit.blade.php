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

          {!! Form::open(['url'=>'/posting', 'method'=>'post']) !!}
              <div class="form-group">
                  {!!  Form::label('name','Post name') !!}
                  {!!  Form::text('title',$post->title,['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::hidden('post_id',$post->id,['class'=>'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('body','Post body') !!}
                  {!! Form::textarea('body',$post->body,['class'=>'form-control','id'=>'textAreaTinyMce']) !!}
              </div>
                  {!! Form::submit('Submit',['class'=>'btn btn-default']) !!}
          {!! Form::close() !!}

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
