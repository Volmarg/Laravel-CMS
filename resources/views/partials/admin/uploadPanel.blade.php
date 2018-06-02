@extends('home')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <section class="uploadWrapper" >
              <h1> Media upload panel </h1>

  <form action="/media/uploading" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="allWrapper">
        <div>Select image to upload:</div>

      <div class="upload-btn-wrapper">
          <button class="formButton">Select file</button>
          <input type="file" name="fileToUpload" id="fileToUpload" multiple>
      </div>

      <div class="upload-btn-wrapper">
          <button class="formButton">Upload image</button>
          <input type="submit" value="Upload Image" name="submit">
      </div>
     </div>
  </form>

  @foreach ($errors->all() as $key => $error)
    {{$error}}
  @endforeach
            </section>
    </div>
  </div>
</div>
@endsection
