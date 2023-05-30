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
                        <div class="card p-4">
                            <div class="card-header">
                                <h3 class="card-title"> {{ __('admin.sidebar.cities.create') }} </h3>
                            </div>
                            @include('admin.layouts.partials.errors')
                            <form action="{{ route('admins.addresses.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="rs1-select2 rs2-select2 ">
                                        <select class="select2" name="user_id" id="user">
                                            <option selected disabled> choose a user</option>
                                            @foreach ($users as $user)
                                                <option @selected(old('user_id') == $user->id) value="{{ $user->id }}" class='px-4'> {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="rs1-select2 rs2-select2 ">
                                        <select class="select2" name="city_id" id="city">
                                            <option selected disabled> {{__('messages.frontend.address.choose_city')}} </option>
                                            @foreach ($cities as $city)
                                                <option @selected(old('city_id') == $city->id) value="{{ $city->id }}" class='px-4'> {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="form-group d-none" id="region_wrap">
                                    <div class="rs1-select2 rs2-select2 bg0">
                                        <select class="select2 d-none" name="region_id" id="region">
                                            <option selected disabled> {{__('messages.frontend.address.choose_region')}} </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control mt-3" type="text" name="street" placeholder="{{ __('messages.frontend.address.street') }}" value="{{ old('street') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control mt-3" type="text" name="building" placeholder="{{ __('messages.frontend.address.building') }}" value="{{ old('building') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control mt-3" type="text" name="floor" placeholder="{{ __('messages.frontend.address.floor') }}" value="{{ old('floor') }}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control mt-3" type="text" name="flat" placeholder="{{ __('messages.frontend.address.flat') }}" value="{{ old('flat') }}">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mt-3 " name="notes" placeholder="{{ __('messages.frontend.address.notes') }}">{{ old('notes') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="rs1-select2 rs2-select2 bor8 bg0">
                                        <select class="js-select2" name="type" id="type">
                                            <option @selected(old('type') === 'HOME') value="HOME">{{ __('messages.frontend.address.home') }}</option>
                                            <option @selected(old('type') === 'WORK') value="WORK">{{ __('messages.frontend.address.work') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <button href="{{ route('users.address.index') }}" class="button-general w-25 m-tb-5">
                                    {{ __('messages.frontend.address.add_address') }}
                                </button>
                            </form>
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

@push('scripts')
<script>
$(document).ready(function() {
    $("#user").select2({
        tags: true,
        width: '100%',
        templateSelection: function(data, container) {
            // Add the 'pl-3' and 'pr-3' classes to the selected option element
            $(container).addClass('');
            return data.text;
        }
    });
    $("#city").select2({
        tags: true,
        width: '100%',
        templateSelection: function(data, container) {
            // Add the 'pl-3' and 'pr-3' classes to the selected option element
            $(container).addClass('');
            return data.text;
        }
    });
    $("#region").select2({ // turn on Select2
        tags: true,
        width: '100%',
        templateSelection: function(data, container) {
            // Add the 'pl-3' and 'pr-3' classes to the selected option element
            $(container).addClass('');
            return data.text;
        }
    });
    $("#type").select2({
        tags: true,
        width: '100%',
        templateSelection: function(data, container) {
            // Add the 'pl-3' and 'pr-3' classes to the selected option element
            $(container).addClass('');
            return data.text;
        }
    });

    $('#city').on('select2:select', function(event) {
        var city_id = event.target.value;
        const url = "{{ asset('api/regions') }}";
        const method = "POST";
        const body = {
            'city_id': city_id,
        };
        const button = $(this);
        $.ajax({
            url: url,
            type: method,
            headers: {
                'accept': 'application/json'
            },
            data: body,
            success: function(result) {
                console.log(result)
                $('#region').empty(); // Clear the options
                $.each(result.data, function(index, value) { // append new options
                    if ($('html').attr('lang') == 'en') {
                        var text = value.name.en;
                    } else if ($('html').attr('lang') == 'ar') {
                        var text = value.name.ar;
                    }
                    var option = new Option(text, value.id);
                    $('#region').append(option);
                });
                $('#region').removeClass('d-none'); // show select 2
                $('#region_wrap').removeClass('d-none'); // show select 2

            },
            error: function(result) {
                console.log(result);
                Swal.fire(
                    'Failed',
                    'Something went wrong',
                    'error'
                );
            }
        });
    });
});
    </script>
@endpush
