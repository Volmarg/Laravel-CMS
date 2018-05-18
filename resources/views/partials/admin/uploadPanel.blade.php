@extends('home')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">

  <form action="/media/uploading" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload" multiple>
      <input type="submit" value="Upload Image" name="submit">
  </form>

  @foreach ($errors as $key => $error)
    --{{$error}}--</br>
  @endforeach

    </div>
  </div>
</div>
@endsection
