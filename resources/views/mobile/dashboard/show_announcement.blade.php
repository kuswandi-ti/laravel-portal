@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Announcement') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="section mt-2 mb-4">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center mb-4">{{ __($announcement->title) }}</h2>
                <div class="blog-header-info mt-4 mb-2">
                    <div>
                        {{ __('by') }} <span class="text-success">{{ $announcement->created_by }}</span>
                    </div>
                    <div>
                        <span class="text-success">{{ $announcement->updated_at }}</span>
                    </div>
                </div>
                <div class="lead">
                    {!! $announcement->body !!}
                </div>
            </div>
        </div>
    </div>
@endsection
