@foreach (['error', 'warning', 'success', 'info'] as $msg)
    @if (Session::has($msg))
        <script>
            $(function () {
                toastr.{{ $msg }}('{{ Session::pull($msg) }}');
            });
        </script>
    @endif
@endforeach
