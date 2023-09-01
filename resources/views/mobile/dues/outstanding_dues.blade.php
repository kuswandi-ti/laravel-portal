@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Outstanding Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 listview-title">
        <form class="search-form mb-2" action="{{ route('mobile.outstanding_dues.index') }}" method="GET">
            <div class="form-group searchbox">
                <input type="text" class="form-control" name="search" value="{{ old('search') }}">
                <i class="input-icon">
                    <ion-icon name="search-outline" role="img" class="md hydrated"
                        aria-label="search outline"></ion-icon>
                </i>
            </div>
        </form>
    </div>

    <ul class="mb-4 listview image-listview media inset">
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <li>
                    <div class="item">
                        <div class="imageWrapper">
                            <img src="{{ url(config('common.path_storage') . (!empty($due->user->image) ? $user->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                {{ $user->name }}
                                <span class="badge badge-info">{{ $user->getRoleNames()->first() }}</span>
                                <div class="text-muted">
                                    {{ $user->house_street_name }},
                                    {{ $user->house_block }}/{{ $user->house_number }},
                                    {{ truncateString($user->house_address_others ?? '', 10) }}
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('mobile.outstanding_dues.show', $user->id) }}">
                                    <span
                                        class="badge badge-secondary p-2">{{ formatAmount($user->dues_sum_dues_amount) }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="{{ asset(config('common.path_template_mobile') . 'assets/img/sample/brand/1.jpg') }}"
                            alt="image" class="imaged w64">
                    </div>
                    <div class="in">
                        <div>
                            {{ __('Data is Empty') }}
                            <div class="text-muted">{{ __('Data is Empty') }}</div>
                        </div>
                    </div>
                </a>
            </li>
        @endif
    </ul>

    {{-- <div class="modal fade dialogbox" id="dialog_delete" data-bs-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-icon text-danger">
                    <ion-icon name="alert" role="img" class="md hydrated" aria-label="alert"></ion-icon>
                </div>
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                </div>
                <div class="modal-body">
                    {{ __("You won't be able to revert this!") }}
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </a>
                        <a href="#" class="btn btn-text-danger" data-bs-dismiss="modal" id="btn-confirm_delete">
                            {{ __('Yes') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div id="toast_delete" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
            <div class="text">
                <span id="toast_message"></span>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div> --}}

    @include('layouts.mobile.includes.toast')
@endsection

@push('scripts')
    <script>
        function load_modal(id) {
            $('#btn-confirm_delete').attr('onclick', `confirm_delete(${id})`);
            $('#dialog_delete').modal('show');
        }

        function confirm_delete(id) {
            $.ajax({
                url: '{{ url('mobile/user') }}/' + id,
                type: 'post',
                data: {
                    '_method': 'delete',
                },
                success: function(data) {
                    if (data.success == true) {
                        $('#toast_message').text(data.message);
                        toastbox('toast_delete', 5000)
                        window.location.reload(true);
                    }
                },
                error: function(error) {
                    $('#toast_message').text(error.message);
                    toastbox('toast_delete', 5000)
                }
            });
        }
    </script>
@endpush
