@if (count($errors) > 0)
    <div class="p-errors">
        <div class="c-errorsText"><strong>入力した文字を修正してください。</strong></div>
        <div class="c-errorsForm">
            <ul>
            @foreach ($errors->all() as $error)
                <li class="c-errorMsg">{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endif