<form class="" action="/posting" method="post">
  {{csrf_field()}}
  <input name="_method" type="hidden" value="PUT">

 <div class="form-group">
   <label for="name">Post name</label>
   <input type="text" class="form-control" id="name" name="title">
 </div>
 <div class="form-group">
   <label for="body">Post body</label>
   <input type="text" class="form-control" id="body" name="body">
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
