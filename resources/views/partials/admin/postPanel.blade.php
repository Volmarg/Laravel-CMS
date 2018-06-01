
            {!! Form::open(
                ['url'=>(! empty($post->title) ? '/posting' : '/posting/put'),
                'method'=>'post'])
            !!}
            {{csrf_field()}}
            <div class="form-group">
                {!!  Form::label('name','Post name') !!}
                {!!
                    Form::text(
                    'title',
                    (! empty($post->title) ? $post->title : ''),
                    ['class'=>'form-control'])
                !!}

            </div>
            <div class="form-group">
                {!!
                    Form::hidden(
                    'post_id',
                    (! empty($post->id)?$post->id:''),
                    ['class'=>'form-control'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::label('body','Post body') !!}
                {!!
                  Form::textarea(
                  'body',
                  (! empty($post->body)?$post->body:''),
                  ['class'=>'form-control',
                  'id'=>(! empty($post->body)?'textAreaTinyMce2':'textAreaTinyMce2')])
                !!}
            </div>
            <div class="form-group">
                {!!  Form::label('metaTitle','Meta Title') !!}
                {!!
                  Form::text(
                  'metaTitle',
                  (! empty($post->metaTitle)?$post->metaTitle:''),
                  ['class'=>'form-control'])
                !!}

                {!!  Form::label('metaDescription','Meta Description') !!}
                {!!  Form::text(
                  'metaDescription',
                  (! empty($post->metaDescription) ?$post->metaDescription :''),
                  ['class'=>'form-control',])
                !!}
            </div>

            {!! Form::submit('Submit',['class'=>'btn btn-default']) !!}
            {!! Form::close() !!}

            <hr>
            @if ($errors)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

