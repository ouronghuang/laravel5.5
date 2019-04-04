@if (count($errors) > 0)
    <alert type="error" closable>
        Whoops!
        <div slot="desc">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </alert>
@endif
