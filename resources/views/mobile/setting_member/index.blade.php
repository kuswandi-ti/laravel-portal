@extends('layouts.mobile.master')

@section('app_title')
    {{ __('System Setting') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <form method="post" action="{{ route('mobile.setting-member.update', getLoggedUserAreaId()) }}">
        @csrf
        @method('PUT')

        <ul class="listview simple-listview mt-2">
            <li>
                <strong>{{ __('Dues Amount') }}</strong>
                <span class="text-success">
                    <input type="text" class="form-control" name="dues_amount" id="dues_amount"
                        value="{{ $setting_member['dues_amount'] ?? '' }}" required autofocus>
                </span>
            </li>
        </ul>

        <div class="mt-2 mb-2 section">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Save Changes') }}</button>
        </div>
    </form>

    @include('layouts.mobile.includes.toast')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $("#dues_amount").keypress(function(e) {
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                    return false;
                }
            });
        });
    </script>
@endpush
