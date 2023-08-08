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
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="card-body">
                    <h4>General</h4>
                    <p>General settings such as, site title, site description, address and so on.</p>
                    <a href="{{ route('admin.general_setting.index') }}" class="card-cta">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-search"></i>
                </div>
                <div class="card-body">
                    <h4>SEO</h4>
                    <p>Search engine optimization settings, such as meta tags and social media.</p>
                    <a href="features-setting-detail.html" class="card-cta">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="card-body">
                    <h4>Email</h4>
                    <p>Email SMTP settings, notifications and others related to email.</p>
                    <a href="features-setting-detail.html" class="card-cta">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-power-off"></i>
                </div>
                <div class="card-body">
                    <h4>System</h4>
                    <p>PHP version settings, time zones and other environments.</p>
                    <a href="features-setting-detail.html" class="card-cta">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="card-body">
                    <h4>Security</h4>
                    <p>Security settings such as firewalls, server accounts and others.</p>
                    <a href="features-setting-detail.html" class="card-cta">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-large-icons">
                <div class="card-icon bg-primary text-white">
                    <i class="fas fa-stopwatch"></i>
                </div>
                <div class="card-body">
                    <h4>Automation</h4>
                    <p>Settings about automation such as cron job, backup automation and so on.</p>
                    <a href="features-setting-detail.html" class="card-cta text-primary">Change Setting <i
                            class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
