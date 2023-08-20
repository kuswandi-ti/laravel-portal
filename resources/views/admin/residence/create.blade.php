@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Residence') }}
@endsection

@section('section_header_title')
    {{ __('admin.Residence') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Residence') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Create Residence') }}
@endsection

@section('section_body_lead')
    {{ __('admin.Create information about residence on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.Create Residence') }}</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.residence.index') }}" class="btn btn-warning">
                            <i class="fas fa-chevron-circle-left"></i> {{ __('admin.Back') }}
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.residence.store') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Residence Name') }} <x-fill-field /></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('admin.Province') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('province') is-invalid @enderror"
                                        name="province" id="province" placeholder="Choose ...">
                                        <option value="" disabled selected>
                                            {{ __('admin.Choose one ...') }}</option>
                                        @foreach ($provinces as $code => $name)
                                            <option value="{{ $code }}"
                                                {{ old('province') == $code ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('admin.City') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('city') is-invalid @enderror" name="city"
                                        id="city" placeholder="Choose ..." value="{{ old('city') }}">
                                    </select>
                                    @error('city')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('admin.District') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('district') is-invalid @enderror"
                                        name="district" id="district" placeholder="Choose ..."
                                        value="{{ old('district') }}">
                                    </select>
                                    @error('district')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('admin.Village') }} <x-fill-field /></label>
                                    <select class="form-control select2 @error('village') is-invalid @enderror"
                                        name="village" id="village" placeholder="Choose ..."
                                        value="{{ old('village') }}">
                                    </select>
                                    @error('village')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>{{ __('admin.Full Address') }}</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" rows="3" name="address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-light">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('admin.Create') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.select2')

@push('scripts')
    <script>
        $('body').on('change', '#province', function() {
            var province_code = this.value;
            $("#city").html('');
            $("#district").html('');
            $("#village").html('');
            $.ajax({
                url: "{{ route('admin.residence.get_cities') }}",
                type: "POST",
                data: {
                    province_code: province_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#city').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                    $.each(result.cities, function(key, value) {
                        $("#city").append('<option value="' + value.code + '">' + value.name +
                            '</option>');
                    });
                    $('#district').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                    $('#village').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                }
            });
        });

        $('body').on('change', '#city', function() {
            var city_code = this.value;
            $("#district").html('');
            $("#village").html('');
            $.ajax({
                url: "{{ route('admin.residence.get_districts') }}",
                type: "POST",
                data: {
                    city_code: city_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                    $.each(result.districts, function(key, value) {
                        $("#district").append('<option value="' + value.code + '">' + value
                            .name +
                            '</option>');
                    });
                    $('#village').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                }
            });
        });

        $('body').on('change', '#district', function() {
            var district_code = this.value;
            $("#village").html('');
            $.ajax({
                url: "{{ route('admin.residence.get_villages') }}",
                type: "POST",
                data: {
                    district_code: district_code,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#village').html(
                        '<option value="" disabled selected>{{ __('admin.Choose one ...') }}</option>'
                        );
                    $.each(result.villages, function(key, value) {
                        $("#village").append('<option value="' + value.code + '">' + value
                            .name +
                            '</option>');
                    });
                }
            });
        });
    </script>
@endpush
