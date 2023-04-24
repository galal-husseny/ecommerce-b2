@extends('admin.layouts.parent')

@section('title', __('admin.edit_category.title'))

@section('header')
    @include('admin.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('admin.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{ __('admin.edit_category.title') }} </h3>
                            </div>
                            @include('admin.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post"
                                    action="{{ route('admins.cities.update', \Illuminate\Support\Facades\Crypt::encryptString($city->id)) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('admin.edit_category.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en"
                                                value="{{ old('name.en', $city->getTranslation('name', 'en')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('admin.edit_category.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                value="{{ old('name.ar', $city->getTranslation('name', 'ar')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('admin.edit_category.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1" @selected((string) old('staus', $city->status) === '1')>
                                                    {{ __('admin.edit_category.active') }}
                                                </option>
                                                <option value="0" @selected((string) old('staus', $city->status) === '0')>
                                                    {{ __('admin.edit_category.not_active') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('admin.edit_category.submit') }} </button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('footer')
    @include('admin.layouts.partials.footer')
@endsection
