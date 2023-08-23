@extends('layouts.mobile.master')

@section('app_title')
    {{ __('Update Profile Image') }}
@endsection

@section('content')
    @include('layouts.mobile.partials._title')

    <div class="mt-2 mb-2 section">
        <form method="POST" action="{{ route('mobile.profile_image.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">
                    <div class="custom-file-upload" id="image_preview" style="height: 600px">
                        <input type="file" id="fileuploadInput" name="image" accept=".png, .jpg, .jpeg">
                        <input type="hidden" name="old_image" value="{{ $user->image }}">
                        <label for="fileuploadInput">
                            <span>
                                <strong>
                                    <ion-icon name="arrow-up-circle-outline" role="img" class="md hydrated"
                                        aria-label="arrow up circle outline"></ion-icon>
                                    <i>{{ __('Upload Image') }}</i>
                                </strong>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-2 row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Update') }}</button>
                </div>
            </div>
        </form>
    </div>

    @include('layouts.mobile.includes.toast')
@endsection

@include('layouts.mobile.includes.upload_preview')
