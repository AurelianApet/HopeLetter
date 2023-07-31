<script type="text/javascript">
    $(document).ready(function() {
        @if ($errors->any())
            toastr['error']('Please check the form below for errors', '');
        @endif

        @if ($message = Session::get('success'))
            toastr['success']('{!! $message !!}', '');
        @endif

        @if ($message = Session::get('error'))
            toastr['error']('{!! $message !!}', '');
        @endif

        @if ($message = Session::get('warning'))
            toastr['warning']('{!! $message !!}', '');
        @endif

        @if ($message = Session::get('info'))
            toastr['info']('{!! $message !!}', '');
        @endif
    })
</script>
