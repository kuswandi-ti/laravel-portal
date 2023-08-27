@extends('layouts.admin.master')

@section('page_title')
    {{ __('admin.Package') }}
@endsection

@section('section_header_title')
    {{ __('admin.Package') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('admin.Package') }}</div>
@endsection

@section('section_body_title')
    {{ __('admin.Package') }}
@endsection

@section('section_body_lead')
    {{ __('admin.View information about package on this page') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="mb-3 card card-primary">
                <div class="card-header">
                    <h4>{{ __('admin.All Package') }}</h4>
                    @if (canAccess(['package create']))
                        <div class="card-header-action">
                            <a href="{{ route('admin.package.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> {{ __('admin.Create') }}
                            </a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab"
                                aria-controls="monthly" aria-selected="true">{{ __('admin.Monthly') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab"
                                aria-controls="yearly" aria-selected="false">{{ __('admin.Yearly') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $package->name ?? '' }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>{{ formatAmount($package->cost_per_month) ?? '0' }}
                                            </div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->staff_limit_per_month ?? '0' }}</strong>
                                                    {{ __('admin.Staff Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->user_limit_per_month ?? '0' }}</strong>
                                                    {{ __('admin.User Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ ($package->wallet_amount_limit_per_month == 'unlimited' ? 'unlimited' : formatAmount($package->wallet_amount_limit_per_month)) ?? '0' }}</strong>
                                                    {{ __('admin.Wallet Balance Limits') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->live_chat_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Live Chat') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->support_ticket_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Support Ticket') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->online_payment_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Online Payment') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        @if ($package->status == 1)
                                            @if (canAccess(['package update']))
                                                <a href="{{ route('admin.package.edit', $package->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    {{ __('admin.Edit') }} <i class="fas fa-edit"></i>
                                                </a>
                                            @endif
                                            @if (canAccess(['package delete']))
                                                <a href="{{ route('admin.package.destroy', $package->id) }}"
                                                    class="btn btn-primary btn-sm delete_item">{{ __('admin.Delete') }} <i
                                                        class="fas fa-trash-alt"></i></a>
                                            @endif
                                        @else
                                            @if (canAccess(['package restore']))
                                                <a href="{{ route('admin.package.restore', $package->id) }}"
                                                    class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                    title="{{ __('Restore to Active') }}">
                                                    {{ __('admin.Restore') }} <i class="fas fa-undo"></i>
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $package->name ?? '' }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>{{ formatAmount($package->cost_per_year) ?? '0' }}
                                            </div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->staff_limit_per_year ?? '0' }}</strong>
                                                    {{ __('admin.Staff Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->user_limit_per_year ?? '0' }}</strong>
                                                    {{ __('admin.User Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ ($package->wallet_amount_limit_per_year == 'unlimited' ? 'unlimited' : formatAmount($package->wallet_amount_limit_per_year)) ?? '0' }}</strong>
                                                    {{ __('admin.Wallet Balance Limits') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->live_chat_per_year == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Live Chat') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->support_ticket_per_year == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Support Ticket') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->online_payment_per_year == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="text-white pricing-item-icon bg-danger"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('admin.Online Payment') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ route('admin.package.edit', $package->id) }}"
                                            class="btn btn-primary btn-sm">
                                            {{ __('admin.Edit') }} <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.package.destroy', $package->id) }}"
                                            class="btn btn-primary btn-sm delete_item">{{ __('admin.Delete') }} <i
                                                class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('layouts.admin.includes.datatable')
