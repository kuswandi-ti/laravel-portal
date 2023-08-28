@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Account Category') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 listview-title">
        @if (canAccess(['account category create', 'account create']))
            <div class="section-heading">
                <a href="{{ route('mobile.account-category.create') }}"
                    class="mb-1 btn btn-outline-secondary btn-block me-1">{{ __('Create New') }}</a>
            </div>
        @endif
    </div>

    <div class="listview-title">{{ __('Income') }}</div>
    <ul class="mb-4 listview image-listview media inset">
        @if ($account_categories_income->count() > 0)
            @foreach ($account_categories_income as $income)
                <li>
                    <div class="item">
                        <div class="in">
                            <div>
                                {{ $income->name }}
                            </div>
                            <div>
                                @if (canAccess(['account category update']))
                                    <a href="{{ route('mobile.account-category.edit', $income->id) }}"
                                        class="btn btn-primary btn-sm">
                                        {{ __('Edit') }}
                                    </a>
                                @endif
                                @if (canAccess(['account category delete']))
                                    <a href="#" class="btn btn-danger btn-sm delete"
                                        onclick="load_modal('{{ $income->id }}')">
                                        {{ __('Delete') }}
                                        </form>
                                    </a>
                                @endif
                                @if (canAccess(['account index']))
                                    <a href="{{ route('mobile.account.index', $income->id) }}"
                                        class="btn btn-sm btn-outline-warning me-1">
                                        {{ __('Account') }}
                                        <ion-icon name="chevron-forward-circle-outline"></ion-icon>
                                    </a>
                                @endif
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

    <div class="listview-title">{{ __('Expense') }}</div>
    <ul class="mb-4 listview image-listview media inset">
        @if ($account_categories_expense->count() > 0)
            @foreach ($account_categories_expense as $expense)
                <li>
                    <div class="item">
                        <div class="in">
                            <div>
                                {{ $expense->name }}
                            </div>
                            <div>
                                @if (canAccess(['account category update']))
                                    <a href="{{ route('mobile.account-category.edit', $expense->id) }}"
                                        class="btn btn-primary btn-sm">
                                        {{ __('Edit') }}
                                    </a>
                                @endif
                                @if (canAccess(['account category delete']))
                                    <a href="#" class="btn btn-danger btn-sm delete"
                                        onclick="load_modal('{{ $expense->id }}')">
                                        {{ __('Delete') }}
                                        </form>
                                    </a>
                                @endif
                                @if (canAccess(['account index']))
                                    <a href="{{ route('mobile.account.index', $expense->id) }}"
                                        class="btn btn-sm btn-outline-warning me-1">
                                        {{ __('Account') }}
                                        <ion-icon name="chevron-forward-circle-outline"></ion-icon>
                                    </a>
                                @endif
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
                url: '{{ url('mobile/account-category') }}/' + id,
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
