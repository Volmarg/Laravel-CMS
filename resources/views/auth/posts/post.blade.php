@extends('home')

@section('scripts')
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

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Post data</h1>
                @include('partials/admin/postPanel')
          </div>
        </div>
      </div>

@endsection
