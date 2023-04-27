@extends('admin.layouts.parent')

@section('title', __('admin.sidebar.cities.create'))

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
                                <h3 class="card-title"> {{ __('admin.sidebar.specs.create') }} </h3>
                            </div>
                            @include('admin.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post" action="{{ route('admins.specs.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('admin.add_spec.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en" value="{{ old('name.en') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('admin.add_spec.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                value="{{ old('name.ar') }}">
                                        </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('admin.add_spec.submit') }} </button>
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
