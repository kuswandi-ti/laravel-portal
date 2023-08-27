@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Account') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 listview-title">
        <div class="mb-2 section-title">
            <span class="text-dark">({{ $account_category->group ?? '' }})</span>
            <span class="text-warning">{{ $account_category->name ?? '' }}</span>
        </div>

        <div class="section-heading">
            <a href="{{ route('mobile.account.create', $account_category->id) }}"
                class="mb-1 btn btn-outline-secondary btn-block me-1">{{ __('Create New') }}</a>
        </div>
    </div>
    <ul class="mb-4 listview image-listview media inset">
        @if ($accounts->count() > 0)
            @foreach ($accounts as $account)
                <li>
                    <div class="item">
                        <div class="in">
                            <div>
                                {{ $account->name }}
                            </div>
                            <div>
                                <a href="{{ route('mobile.account.edit', $account->id) }}" class="btn btn-primary btn-sm">
                                    {{ __('Edit') }}
                                </a>
                                <a href="#" class="btn btn-danger btn-sm delete"
                                    onclick="load_modal('{{ $account->id }}')">
                                    {{ __('Delete') }}
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @else
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            {{ __('Data is Empty') }}
                            <div class="text-muted">{{ __('Data is Empty') }}</div>
                        </div>
                    </div>
                </div>
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
            $('#btn-confirm_delete').attr('onclick', 'confirm_delete("' + id + '")');
            $('#dialog_delete').modal('show');
        }

        function confirm_delete(id) {
            $.ajax({
                url: '{{ url('mobile/account') }}/' + id,
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
