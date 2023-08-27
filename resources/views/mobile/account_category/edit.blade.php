@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Edit Account Category') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <x-alert-message />

        <form method="POST" action="{{ route('mobile.account-category.update', $account_category->id) }}">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="name">{{ __('Category Name') }} <x-fill-field /></label>
                            <input type="text" class="form-control" name="name" id="name"
                                value="{{ old('name') ?? $account_category->name }}"
                                placeholder="{{ __('Enter category name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <label class="label" for="group">{{ __('Group') }} <x-fill-field /></label>
                        <select class="form-control custom-select" name="group">
                            <option value="" selected disabled>{{ __('Choose one ...') }}
                            </option>
                            <option value="Income" {{ $account_category->group == 'Income' ? 'selected' : '' }}>
                                {{ __('Income') }}</option>
                            <option value="Expense" {{ $account_category->group == 'Expense' ? 'selected' : '' }}>
                                {{ __('Expense') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
