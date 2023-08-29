@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Create Account Subcategory') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <x-alert-message />

        <form method="POST" action="{{ route('mobile.account.store') }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="name">{{ __('Account Subcategory Name') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') }}" placeholder="{{ __('Enter account name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="category">{{ __('Account Category') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="category" id="category"
                                value="{{ old('category') ?? $account_category->name }}"
                                placeholder="{{ __('Enter account category') }}" required readonly>
                            <input type="hidden" name="account_category_id" value="{{ $account_category->id }}">
                        </div>
                    </div>
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="group">{{ __('Account Group') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="group" id="group"
                                value="{{ old('group') ?? $account_category->group }}"
                                placeholder="{{ __('Enter account group') }}" required readonly>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Create') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
