@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Outstanding Dues') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 listview-title">
        <form class="mb-2 search-form" action="{{ route('mobile.outstanding_dues.index') }}" method="GET">
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
                @if ($user->dues_sum_dues_amount > 0)
                    <li>
                        <a href="{{ route('mobile.outstanding_dues.show', $user->id) }}" class="item">
                            <div class="item">
                                <div class="imageWrapper">
                                    <img src="{{ url(config('common.path_storage') . (!empty($user->image) ? $user->image : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                        alt="image" class="imaged w64">
                                </div>
                                <div class="in">
                                    <div>
                                        {{ $user->name }}
                                        <div class="text-muted">
                                            {{ $user->house_street_name }},
                                            {{ $user->house_block }}/{{ $user->house_number }},
                                            {{ truncateString($user->house_address_others ?? '', 10) }}
                                        </div>
                                        <div>
                                            <span class="badge badge-info">{{ $user->getRoleNames()->first() }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <span
                                            class="p-2 badge {{ $user->dues_sum_dues_amount > 0 ? 'badge-danger' : 'badge-success' }}">{{ formatAmount($user->dues_sum_dues_amount) }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
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
@endsection
