@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('common.errors')
            <form action="{{ url('books/update') }}" method="POST">
                <div class="form-group">
                    <label for="item_name">Title</label>
                    <input type="text" id="item_name" name="item_name" class="form-control" value="{{ $book->item_name }}">
                </div>

                <div class="form-group">
                    <label for="item_number">Number</label>
                    <input type="text" id="item_number" name="item_number" class="form-control" value="{{ $book->item_number }}">
                </div>

                <div class="form-group">
                    <label for="item_name">Description</label>
                    <textarea name="ce" id="" class="form-control">{{ $book->item_description }}</textarea>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
                    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
                    <script>
                        var route_prefix = "{{ url(config('lfm.url_prefix')) }}";
                    </script>

                    <!-- CKEditor init -->
                    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
                    <script>
                        $('textarea[name=ce]').ckeditor({
                            height: 100,
                            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                            filebrowserBrowseUrl: route_prefix + '?type=Files',
                            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
                        });
                    </script>

                    <script>
                        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
                    </script>
                    <script>
                        $('#lfm').filemanager('image', {prefix: route_prefix});
                        $('#lfm2').filemanager('file', {prefix: route_prefix});
                    </script>
                </div>

                <div class="form-group">
                    <label for="item_amount">Amount</label>
                    <input type="text" id="item_amount" name="item_amount" class="form-control" value="{{ $book->item_amount }}">
                </div>

                <div class="form-group">
                    <label for="published">Published</label>
                    <input type="datetime" id="published" name="published" class="form-control" value="{{ $book->published }}">
                </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ url('/') }}">
                        <i class="glyphicon glyphicon-backward"></i> Back
                    </a>
                </div>

                <input type="hidden" name="id" value="{{ $book->id }}">

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection