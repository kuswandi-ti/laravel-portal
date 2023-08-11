@extends('admin.layouts.master')

@section('page_title')
    {{ __('Package') }}
@endsection

@section('section_header_title')
    {{ __('Package') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Package') }}</div>
@endsection

@section('section_body_title')
    {{ __('Package') }}
@endsection

@section('section_body_lead')
    {{ __('View information about package on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary mb-3">
                <div class="card-body">
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab"
                                aria-controls="home" aria-selected="true">{{ __('Monthly') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                                aria-controls="profile" aria-selected="false">{{ __('Yearly') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tab-content" id="myTabContent2">
                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $package->name ?? '' }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>{{ amountFormat($package->cost_per_month) ?? '0' }}
                                            </div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->staff_limit_per_month ?? '0' }}</strong>
                                                    {{ __('Staff Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ $package->user_limit_per_month ?? '0' }}</strong>
                                                    {{ __('User Accounts') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">
                                                    <strong>{{ amountFormat($package->wallet_amount_limit_per_month) ?? '0' }}</strong>
                                                    {{ __('Wallet Balance Limits') }}
                                                </div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->live_chat_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="pricing-item-icon bg-danger text-white"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('Live Chat') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->support_ticket_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="pricing-item-icon bg-danger text-white"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('Support Ticket') }}</div>
                                            </div>
                                            <div class="pricing-item">
                                                @if ($package->online_payment_per_month == 1)
                                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                @else
                                                    <div class="pricing-item-icon bg-danger text-white"><i
                                                            class="fas fa-times"></i></div>
                                                @endif
                                                <div class="pricing-item-label">{{ __('Online Payment') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="#">{{ __('Edit') }} <i class="fas fa-edit"></i></a>
                                        <a href="#">{{ __('Delete') }} <i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis
                    quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                    Etiam ac vehicula eros, pharetra consectetur dui.
                </div>
            </div>
        </div>
    </div>
@endsection

<x-swal />

@include('admin.includes.datatable')
