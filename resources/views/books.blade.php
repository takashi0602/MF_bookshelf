@extends('layouts.app')

@section('content')
    <div class="panel-body">
        @include('common.errors')
        <form action="{{ url('books') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-sm-6">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">Amount</label>
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>

                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">Number</label>
                    <input type="text" name="item_number" id="book-number" class="form-control">
                </div>


                <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">Published</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>
            </div>

            <div class="col-sm-12">
                <label for="item_name">Description</label>
                <textarea name="ce" id="" class="form-control"></textarea>
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
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="glyphicon glyphicon-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>
        @if (count($books) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在の本
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>本一覧</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $book->item_name }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ url('booksedit/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-primary">
                                                <i class="glyphicon glyphicon-pencil"></i> 更新
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ url('book/' . $book->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i> 削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="col-md-4 col-md-offset-4">
            {{ $books->links()}}
        </div>
    </div>
@endsection