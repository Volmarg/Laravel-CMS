@extends('home')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">

  <form action="/uploading" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
      Select image to upload:
      <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
      <input type="submit" value="Upload Image" name="submit">
  </form>

    </div>
  </div>
</div>
@endsection
