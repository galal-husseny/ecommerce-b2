@extends('user.layouts.parent')

@section('title', 'Addresses')

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('cart')
    @include('user.layouts.partials.cart')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <!-- breadcrumb -->
    <div class="container" style="margin-top: 100px">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a style="text-decoration: none" href="{{ route('users.dashboard') }}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
                Addresses
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->
        <div class="container">
            <div class="row bg0 p-t-75 p-b-85">
                <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        @include('seller.layouts.partials.errors')
                        <form action="{{route('users.address.update', $address->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="wrap-table-shopping-cart">
                                <div class="bor8 m-b-20 how-pos4-parent">
                                        <select class="select2" name="city_id" id="city">
                                            <option selected disabled> Choose City</option>
                                            @foreach ($cities as $city)
                                                <option @selected(old('city_id', $address->region->city->id) == $city->id) value="{{$city->id}}"> {{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <select class="select2" name="region_id" id="region">
                                        <option selected disabled> Choose Region</option>
                                        @foreach ($regions as $region)
                                                <option @selected(old('region_id', $address->region->id) == $region->id) value="{{$region->id}}"> {{$region->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="street" placeholder="Street" value="{{old('street', $address->street)}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="building" placeholder="Building"  value="{{old('building', $address->building)}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="floor" placeholder="Floor" value="{{old('floor', $address->floor)}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="flat" placeholder="Flat" value="{{old('flat', $address->flat)}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="notes" placeholder="Notes">{{old('notes', $address->notes)}}</textarea>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="type">
                                            <option @selected(old('type', $address->type) === 'HOME') value="HOME">HOME</option>
                                            <option @selected(old('type', $address->type) === 'WORK') value="WORK">WORK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <button class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $("#city").select2({
            tags: true,
            width: '100%'
        });
        $("#region").select2({ // turn on Select2
                        tags: true,
                        width: '100%'
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
                    $("#region").select2({ // turn on Select2
                        tags: true,
                        width: '100%'
                    });
                    $('#region').empty(); // Clear the options
                    $.each(result.data, function(index, value) { // append new options
                        var text = value.name.en;
                        var option = new Option(text, value.id);
                        $('#region').append(option);
                    });
                    $('#region').removeClass('d-none'); // show select 2
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
@include('components.redirect-messages')
@endpush
