@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Update Profile Data') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <form method="POST" action="{{ route('mobile.profile_data.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body pt-0">
                    <ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                aria-selected="true">
                                {{ __('General') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab" aria-selected="false">
                                {{ __('ID & Contact') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab3" role="tab" aria-selected="false">
                                {{ __('House') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-2">
                        <div class="tab-pane fade active show" id="tab1" role="tabpanel">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="name">{{ __('Full Name') }}
                                        <x-fill-field /></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $user->name }}"
                                        placeholder="{{ __('Enter your full name') }}" required autofocus>
                                </div>
                                @error('name')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary" for="gender">{{ __('Gender') }}</label>
                                            <select class="form-control custom-select" name="gender">
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                <option value="Man" {{ $user->gender == 'Man' ? 'selected' : '' }}>
                                                    {{ __('Man') }}</option>
                                                <option value="Woman" {{ $user->gender == 'Woman' ? 'selected' : '' }}>
                                                    {{ __('Woman') }}</option>
                                            </select>
                                            @error('gender')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary"
                                                for="marital_status">{{ __('Marital Status') }}</label>
                                            <select class="form-control custom-select" name="marital_status">
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                <option value="Single"
                                                    {{ $user->marital_status == 'Single' ? 'selected' : '' }}>
                                                    {{ __('Single') }}</option>
                                                <option value="Married"
                                                    {{ $user->marital_status == 'Married' ? 'selected' : '' }}>
                                                    {{ __('Married') }}</option>
                                                <option value="Divorced"
                                                    {{ $user->marital_status == 'Divorced' ? 'selected' : '' }}>
                                                    {{ __('Divorced') }}</option>
                                            </select>
                                            @error('marital_status')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary mb-1"
                                        for="place_of_birth">{{ __('Place of Birth') }}</label>
                                    <select class="form-control custom-select select2" name="place_of_birth">
                                        <option value="" selected disabled>{{ __('Choose one ...') }}</option>
                                        @foreach ($cities as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $user->place_of_birth == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('place_of_birth')
                                        <div class="input-info">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="name">{{ __('Birth of Date') }}</label>
                                    <input type="text" name="date_of_birth" id="date_of_birth"
                                        class="flatpickr form-control @error('date_of_birth') is-invalid @enderror"
                                        value="{{ $user->date_of_birth }}"
                                        placeholder="{{ __('Enter your birth of date') }}">
                                </div>
                                @error('date_of_birth')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary mb-1" for="profession">{{ __('Profession') }}</label>
                                    <select class="form-control custom-select select2" name="profession">
                                        <option value="" selected disabled>{{ __('Choose one ...') }}</option>
                                        @foreach ($professions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $user->profession == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('profession')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="workplace">{{ __('Workplace') }}</label>
                                    <input type="text" name="workplace" id="workplace"
                                        class="form-control @error('workplace') is-invalid @enderror"
                                        value="{{ old('workplace') ?? $user->workplace }}"
                                        placeholder="{{ __('Enter your workplace') }}">
                                </div>
                                @error('workplace')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary mb-1" for="religion">{{ __('Religion') }}</label>
                                    <select class="form-control custom-select" name="religion">
                                        <option value="" selected disabled>{{ __('Choose one ...') }}
                                        </option>
                                        @foreach ($religions as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $user->religion == $key ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('religion')
                                        <div class="input-info">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="email">{{ __('Email') }}
                                        <x-fill-field /></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $user->email }}" placeholder="{{ __('Enter your email') }}" readonly>
                                    @error('email')
                                        <div class="input-info">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="phone">{{ __('Phone') }}</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') ?? $user->phone }}"
                                        placeholder="{{ __('Enter your phone number') }}">
                                </div>
                                @error('phone')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary"
                                        for="family_card_no">{{ __('Family Card No') }}</label>
                                    <input type="text" name="family_card_no" id="family_card_no"
                                        class="form-control @error('family_card_no') is-invalid @enderror"
                                        value="{{ old('family_card_no') ?? $user->family_card_no }}"
                                        placeholder="{{ __('Enter your family card no') }}">
                                </div>
                                @error('family_card_no')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="id_card_no">{{ __('ID Card No') }}</label>
                                    <input type="text" name="id_card_no" id="id_card_no"
                                        class="form-control @error('id_card_no') is-invalid @enderror"
                                        value="{{ old('id_card_no') ?? $user->id_card_no }}"
                                        placeholder="{{ __('Enter your ID card no') }}">
                                </div>
                                @error('id_card_no')
                                    <div class="input-info">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="house_street_name">{{ __('Street') }}
                                        <x-fill-field /></label>
                                    <input type="text" name="house_street_name" id="house_street_name"
                                        class="form-control @error('house_street_name') is-invalid @enderror"
                                        value="{{ $user->house_street_name }}"
                                        placeholder="{{ __('Enter your address street') }}" readonly>
                                    @error('house_street_name')
                                        <div class="input-info">
                                            <span class="text-danger">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary" for="house_block">{{ __('Block') }}
                                                <x-fill-field /></label>
                                            <input type="text" name="house_block" id="house_block"
                                                class="form-control @error('house_block') is-invalid @enderror"
                                                value="{{ $user->house_block }}"
                                                placeholder="{{ __('Enter your address block') }}" readonly>
                                            @error('house_block')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary" for="house_number">{{ __('No') }}
                                                <x-fill-field /></label>
                                            <input type="text" name="house_number" id="house_number"
                                                class="form-control @error('house_number') is-invalid @enderror"
                                                value="{{ $user->house_number }}"
                                                placeholder="{{ __('Enter your address house number') }}" readonly>
                                            @error('house_number')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary"
                                        for="house_address_others">{{ __('Address Others') }}</label>
                                    <textarea name="house_address_others" id="house_address_others" rows="2" class="form-control"
                                        placeholder="{{ __('Enter your address house others') }}">{{ $user->house_address_others }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary"
                                                for="house_ownership">{{ __('House Ownership') }}</label>
                                            <select class="form-control custom-select" name="house_ownership">
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                <option value="Owner"
                                                    {{ $user->house_ownership == 'Owner' ? 'selected' : '' }}>
                                                    {{ __('Owner') }}</option>
                                                <option value="Rent"
                                                    {{ $user->house_ownership == 'Rent' ? 'selected' : '' }}>
                                                    {{ __('Rent') }}</option>
                                                <option value="Other"
                                                    {{ $user->house_ownership == 'Other' ? 'selected' : '' }}>
                                                    {{ __('Other') }}</option>
                                            </select>
                                            @error('house_ownership')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group basic">
                                        <div class="input-wrapper">
                                            <label class="label text-primary"
                                                for="house_stay">{{ __('House Stay') }}</label>
                                            <select class="form-control custom-select" name="house_stay">
                                                <option value="" selected disabled>{{ __('Choose one ...') }}
                                                </option>
                                                <option value="Permanent"
                                                    {{ $user->house_stay == 'Permanent' ? 'selected' : '' }}>
                                                    {{ __('Permanent') }}</option>
                                                <option value="Non Permanent"
                                                    {{ $user->house_stay == 'Non Permanent' ? 'selected' : '' }}>
                                                    {{ __('Non Permanent') }}</option>
                                                <option value="Other"
                                                    {{ $user->house_stay == 'Other' ? 'selected' : '' }}>
                                                    {{ __('Other') }}</option>
                                            </select>
                                            @error('house_stay')
                                                <div class="input-info">
                                                    <span class="text-danger">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group basic">
                                <div class="input-wrapper">
                                    <label class="label text-primary" for="house_note">{{ __('House Note') }}</label>
                                    <textarea name="house_note" id="house_note" rows="2" class="form-control"
                                        placeholder="{{ __('Enter your house note') }}">{{ $user->house_note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Upate') }}</button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.mobile.includes.toast')
@endsection

@include('layouts.mobile.includes.flatpicker')
@include('layouts.admin.includes.select2')
