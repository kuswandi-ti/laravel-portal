@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Outstanding Dues Detail') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    @if (count($dues) > 0)
        @foreach ($dues as $year => $dues_list)
            <div class="mt-2 listview-title">
                <h1>{{ $year }}</h1>
            </div>
            <ul class="mb-4 listview image-listview media">
                @foreach ($dues_list as $due)
                    <li>
                        <div class="item">
                            <div class="imageWrapper">
                                <img src="{{ url(config('common.path_storage') . (!empty($due['user']['image']) ? $due['user']['image'] : config('common.default_image_circle')) ?? config('common.default_image_circle')) }}"
                                    alt="image" class="imaged w64">
                            </div>
                            <div class="in">
                                <div>
                                    {{ $due['user']['name'] }}
                                    <div class="text-muted">
                                        {{ $due['user']['house_street_name'] }},
                                        {{ $due['user']['house_block'] }}/{{ $due['user']['house_number'] }},
                                        {{ truncateString($due['user']['house_address_others'] ?? '', 10) }}
                                    </div>
                                    <div>
                                        <span class="badge badge-warning">{{ formatMonth($due['month']) }}</span>
                                    </div>
                                </div>
                                <div>
                                    <span>
                                        {{ formatAmount($due['dues_amount']) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endforeach
        <ul class="mb-4 listview image-listview media">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            {{ __('Total Outstanding Dues') }}
                        </div>
                        <div>
                            <span class="text-danger">
                                {{ formatAmount($notpaid_dues) }}
                            </span>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    @else
        <ul class="mt-2 mb-4 listview image-listview media inset">
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
        </ul>
    @endif
@endsection
