<form enctype="multipart/form-data" action="{{ url('isbn/search') }}" method="POST">
    {{ csrf_field() }}
    <input type="number" name="isbn_code">
    <input type="submit" value="検索">
</form>

@if(session('result'))
    <form enctype="multipart/form-data" action="{{ url('isbn/books') }}" method="POST">
        {{ csrf_field() }}
        @foreach(json_decode(session('result'))->items as $item)
            <input type="text" value="{{ $item->volumeInfo->title }}" name="book_name">
            <input type="text" value="{{ $item->volumeInfo->authors[0] }}" name="author">
            <input type="number" value="{{ $item->saleInfo->listPrice->amount }}" name="book_price">
            <input type="number" value="{{ $item->volumeInfo->pageCount }}" name="book_page">
            <input type="date" value="{{ $item->volumeInfo->publishedDate }}" name="published">
            <textarea name="book_description">{{ $item->volumeInfo->description }}</textarea>
            <img src="{{ $item->volumeInfo->imageLinks->smallThumbnail }}" alt="">
            <input type="hidden" value="{{ $item->volumeInfo->imageLinks->smallThumbnail }}" name="book_img">
            <input type="radio" name="flag" id="flag" value="public" checked> 公開
            <input type="radio" name="flag" id="flag" value="private"> 非公開
        @endforeach
        <input type="submit" value="本棚に入れる">
    </form>
@endif