@if (count($errors) > 0)
    <div class="p-errors">
        <strong>入力した文字を修正してください。</strong>
        <div class="c-errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="c-error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif