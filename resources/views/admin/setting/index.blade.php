@extends('admin.layouts.master')

@section('page_title')
    {{ __('Setting') }}
@endsection

@section('section_header_title')
    {{ __('Setting') }}
@endsection

@section('section_header_breadcrumb')
    @parent
    <div class="breadcrumb-item">{{ __('Setting') }}</div>
@endsection

@section('section_body_title')
    {{ __('Setting') }}
@endsection

@section('section_body_lead')
    {{ __('View information about setting on this page') }}
@endsection

@section('backend_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('General') }}</h4>
                    <p>{{ __('General settings such as, site title, site description, address and so on.') }}</p>
                    <a href="{{ route('admin.general_setting.index') }}" class="card-cta">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-money-check"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('Payment') }}</h4>
                    <p>{{ __('Payment settings, online and offline, manual and automatic configuration') }}.</p>
                    <a href="features-setting-detail.html" class="card-cta">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('Notification') }}</h4>
                    <p>{{ __('Email SMTP settings, notifications and others related to email') }}.</p>
                    <a href="{{ route('admin.notification_setting.index') }}" class="card-cta">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-power-off"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('System') }}</h4>
                    <p>{{ __('Application version settings, time zones and other environments') }}.</p>
                    <a href="features-setting-detail.html" class="card-cta">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('Security') }}</h4>
                    <p>{{ __('Security settings such as firewalls, server accounts and others') }}.</p>
                    <a href="features-setting-detail.html" class="card-cta">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="text-white card-icon bg-primary">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <div class="card-body">
                    <h4>{{ __('Automation') }}</h4>
                    <p>{{ __('Settings about automation such as cron job, backup automation and so on') }}.</p>
                    <a href="features-setting-detail.html" class="card-cta text-primary">
                        {{ __('Change Setting') }}
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
