@if ($message = Session::get('success'))
    @push('scripts')
        <script>
            toastbox('toast', 5000)
        </script>
    @endpush
    <div id="toast" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
            <div class="text">
                {{ $message }}
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div>
@endif

@if ($message = Session::get('error'))
    @push('scripts')
        <script>
            toastbox('toast', 5000)
        </script>
    @endpush
    <div id="toast" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="close-circle" class="text-danger"></ion-icon>
            <div class="text">
                {{ $message }}
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div>
@endif

@if ($message = Session::get('warning'))
    @push('scripts')
        <script>
            toastbox('toast', 5000)
        </script>
    @endpush
    <div id="toast" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="pause-circle" class="text-warning"></ion-icon>
            <div class="text">
                {{ $message }}
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div>
@endif

@if ($message = Session::get('info'))
    @push('scripts')
        <script>
            toastbox('toast', 5000)
        </script>
    @endpush
    <div id="toast" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="information-circle" class="text-info"></ion-icon>
            <div class="text">
                {{ $message }}
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div>
@endif
