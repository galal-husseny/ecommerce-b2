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
                <div class="col-lg-4 col-xl-4 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        @include('seller.layouts.partials.errors')
                        <form action="{{route('users.address.store')}}" method="POST">
                            @csrf
                            <div class="wrap-table-shopping-cart">
                                <div class="bor8 m-b-20 how-pos4-parent">
                                        <select class="select2" name="city_id" id="city">
                                            <option selected disabled> Choose City</option>
                                            @foreach ($cities as $city)
                                                <option @selected(old('city_id') == $city->id) value="{{$city->id}}"> {{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <select class="select2 d-none" name="region_id" id="region">
                                        <option selected disabled> Choose Region</option>
                                    </select>
                                </div>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="street" placeholder="Street" value="{{old('street')}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="building" placeholder="Building"  value="{{old('building')}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="floor" placeholder="Floor" value="{{old('floor')}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="flat" placeholder="Flat" value="{{old('flat')}}">
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="notes" placeholder="Notes">{{old('notes')}}</textarea>
                                </div>
                                <div class="bor8 m-b-20 how-pos4-parent">
                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                        <select class="js-select2" name="type">
                                            <option @selected(old('type') === 'HOME') value="HOME">HOME</option>
                                            <option @selected(old('type') === 'WORK') value="WORK">WORK</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <button href="{{route('users.address.index')}}" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                    Add New Address
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-8 m-lr-auto m-b-50">
                    <div class="m-l-25 m-r--38 m-lr-0-xl">
                        <div class="wrap-table-shopping-cart">
                            <table class="table-shopping-cart ">
                                <tr class="table_head">
                                    <th class="column-1 text-center"> # </th>
                                    <th class="column-2 text-center"> City </th>
                                    <th class="column-3 text-center"> Region</th>
                                    <th class="column-4 text-center"> Street </th>
                                    <th class="column-5 text-center"> Building </th>
                                    <th class="column-6 text-center"> Floor </th>
                                    <th class="column-7 text-center"> Flat </th>
                                    <th class="column-8 text-center"> Notes </th>
                                    <th class="column-9 text-center"> Type </th>
                                    <th class="column-10 text-center"> Actions </th>
                                </tr>
                                @foreach ($addresses as $index => $address)
                                    <tr class="table_row">
                                        <td class="column-1 text-center"> {{ ++$index }} </td>
                                        <td class="column-2 text-center">{{ $address->region->city->name }}</td>
                                        <td class="column-3 text-center"> {{ $address->region->name }} </td>
                                        <td class="column-4 text-center"> {{ $address->street }} </td>
                                        <td class="column-5 text-center"> {{ $address->building }} </td>
                                        <td class="column-6 text-center"> {{ $address->floor }} </td>
                                        <td class="column-7 text-center"> {{ $address->flat }} </td>
                                        <td class="column-8 text-center"> {{ $address->notes }} </td>
                                        <td class="column-9 text-center"> {{ $address->type }} </td>
                                        <td class="column-10 text-center">
                                            <a href="{{route('users.address.edit', $address->id)}}" class="btn btn-dark"> Edit </a>
                                            <form action="{{route('users.address.destroy', $address->id)}}" method="post" class="d-iniline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"> Delete </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
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
