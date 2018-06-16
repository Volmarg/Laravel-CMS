@extends('home')

@section('content')
 <section class="posts_edit_list">
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <h1>Manage posts</h1>

              <table class="responsive-table">
                  <thead>
                  <tr>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                  </tr>
                  </thead>

                  <tbod>
                      @foreach ($posts as $key => $single)
                          <tr>
                              <td>
                                  <a href="/posts/edit/{{$single->slug}}">{{$single->title}}</a>
                              </td>
                              <td>
                                  <a href="/posts/remove/{{$single->slug}}"/>✗</a>
                              </td>
                          </tr>
                      @endforeach

                  </tbod>

              </table>

          </div>
        </div>
      </div>
    </section>
@endsection
