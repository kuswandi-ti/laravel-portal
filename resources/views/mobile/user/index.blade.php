@extends('layouts.mobile.master')

@section('app_title')
    {{ __('User List') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="listview-title mt-2">
        <div class="section-heading">
            <h2 class="title">{{ __('User List') }}</h2>
            <a href="{{ route('mobile.user.create') }}" class="link">{{ __('Register New User') }}</a>
        </div>
    </div>
    <ul class="listview image-listview media inset mb-4">
        @if ($users->count() > 0)
            @foreach ($users as $user)
                <li>
                    <div class="item">
                        <div class="imageWrapper">
                            <img src="{{ url(config('common.path_storage') . (!empty($user->image) ? $user->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                alt="image" class="imaged w64">
                        </div>
                        <div class="in">
                            <div>
                                {{ $user->name }}
                                <span class="badge badge-info">{{ $user->getRoleNames()->first() }}</span>
                                <div class="text-muted">
                                    {{ $user->house_street_name }}, {{ $user->house_block }}/{{ $user->house_number }},
                                    {{ truncateString($user->house_address_others ?? '', 10) }}
                                </div>
                            </div>
                            <div>
                                {{-- @if ($user->getRoleNames()->isEmpty()) --}}
                                <a href="{{ route('mobile.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    {{ __('Edit') }}
                                </a>
                                <a href="#" class="btn btn-danger btn-sm delete"
                                    onclick="load_modal({{ $user->id }})">
                                    {{ __('Delete') }}
                                    </form>
                                </a>
                                {{-- @endif --}}
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

    <div class="modal fade dialogbox" id="dialog_delete" data-bs-backdrop="static" tabindex="-1" role="dialog">
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
    </div>

    <div id="toast_delete" class="toast-box toast-center">
        <div class="in">
            <ion-icon name="checkmark-circle" class="text-success"></ion-icon>
            <div class="text">
                <span id="toast_message"></span>
            </div>
        </div>
        <button type="button" class="btn btn-sm btn-text-light close-button">{{ __('OK') }}</button>
    </div>

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
