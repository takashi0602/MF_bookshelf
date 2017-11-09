@if (count($errors) > 0)
    <div class="p-errors">
        <div class="c-errors">
            <ul class="c-lists">
                @foreach ($errors->all() as $error)
                    <li class="c-list">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif