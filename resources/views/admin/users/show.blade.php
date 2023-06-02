@extends('admin.layouts.parent')

@section('title', __('messages.frontend.shop.title'))

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
                                <h3 class="card-title"> Addresses </h3>
                                <a href="{{ route('admins.addresses.create') }}" class="button-general col-3 ml-auto"> {{ __('admin.sidebar.users.create') }} </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($user->addresses) != 0)
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="column-1 col-1 text-center"> # </th>
                                                <th class="column-2 col-1 text-center"> {{ __('messages.frontend.address.city') }} </th>
                                                <th class="column-3 col-2 text-center"> {{ __('messages.frontend.address.region') }}</th>
                                                <th class="column-4 col-1 text-center"> {{ __('messages.frontend.address.street') }} </th>
                                                <th class="column-5 col-1 text-center"> {{ __('messages.frontend.address.building') }} </th>
                                                <th class="column-6 col-1 text-center"> {{ __('messages.frontend.address.floor') }} </th>
                                                <th class="column-7 col-1 text-center"> {{ __('messages.frontend.address.flat') }} </th>
                                                <th class="column-8 col-1 text-center"> {{ __('messages.frontend.address.notes') }} </th>
                                                <th class="column-9 col-1 text-center"> {{ __('messages.frontend.address.type') }} </th>
                                                <th class="column-10 col-2 text-center"> {{ __('messages.frontend.address.actions') }} </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($user->addresses as $index => $address)
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
                                                    <td>
                                                        <a href="{{ route('admins.addresses.edit', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" class="btn btn-primary rounded-pill  mb-2"> {{ __('messages.frontend.address.edit') }} </a>
                                                        <form action="{{ route('admins.addresses.destroy', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" method="post" class="d-iniline" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger rounded-pill"> {{ __('messages.frontend.address.delete') }} </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user have no addresses</p>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Orders </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="column-1 col-1 text-center"> # </th>
                                            <th class="column-2 col-1 text-center"> code </th>
                                            <th class="column-3 col-2 text-center"> status</th>
                                            <th class="column-4 col-1 text-center"> total price </th>
                                            <th class="column-5 col-1 text-center"> final price </th>
                                            <th class="column-6 col-1 text-center"> delivery date </th>
                                            <th class="column-10 col-2 text-center"> {{ __('messages.frontend.address.actions') }} </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->addresses as $address)
                                            @if (count($address->orders) != 0)
                                                @foreach ($address->orders as $index => $order)
                                                    <tr class="table_row">
                                                        <td class="column-1 text-center"> {{ ++$index }} </td>
                                                        <td class="column-2 text-center">{{ $order->code }}</td>
                                                        <td @class([
                                                            'p-2',
                                                            'text-center',
                                                            'text-success' => $order->status == 2,
                                                            'text-primary' => $order->status == 1,
                                                            'text-danger' => !$order->status,
                                                        ])>{{ __('admin.all_orders.' . printEnum(App\Enums\OrderEnum::class, $order->status)) }}</td>
                                                        <td class="column-4 text-center"> {{ $order->total_price }} </td>
                                                        <td class="column-6 text-center"> {{ $order->final_price }} </td>
                                                        <td class="column-7 text-center"> {{ $order->delivery_date }} </td>
                                                        <td class="align-middle">
                                                            <a href="{{ route('admins.addresses.edit', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" class="btn btn-primary rounded-pill  mb-2 align-middle"> {{ __('messages.frontend.address.edit') }} </a>
                                                            <form action="{{ route('admins.addresses.destroy', \Illuminate\Support\Facades\Crypt::encryptString($address->id)) }}" method="post" class="d-iniline align-middle" style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger rounded-pill"> {{ __('messages.frontend.address.delete') }} </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <p class="text-center text-danger"> This user ha no orders</p>
                                            @endif
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Cart </h3>
                            </div>
                            <div class="card-body">
                                @if (count($user->carts) != 0)
                                    <table class="table table-bordered table-hover">
                                        <tr class="table_head">
                                            <th class="column-1 text-center"> Img </th>
                                            <th class="column-2 text-center">{{ __('messages.frontend.cart.product') }}</th>
                                            <th class="column-3 text-center"> {{ __('messages.frontend.cart.price') }} </th>
                                            <th class="column-4 text-center"> {{ __('messages.frontend.cart.quantity') }} </th>
                                            <th class="column-5 text-center"> {{ __('messages.frontend.cart.total') }} </th>
                                        </tr>
                                        @foreach ($user->carts as $index => $product)
                                            <tr class="table_row">
                                                <td class="col-1  text-center">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $product->getFirstMediaUrl('product', 'preview') }}"
                                                            alt="IMG" class="" style="width: 80%">
                                                    </div>
                                                </td>
                                                <td class="column-2 text-center">{{ $product->name }}</td>
                                                <td class="column-3 text-center productPrice"> {{ $product->sale_price_with_currency() }} </td>
                                                <td class="text-center">
                                                    {{ $product->carts->quantity }}
                                                </td>
                                                <td class="column-5  text-center">
                                                    {{ $product->sale_price_with_currency($product->carts->quantity) }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user ha no products in his cart </p>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Wishlist </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($user->wishlists) != 0)
                                    <table class="table table-bordered table-hover">
                                        <tr class="table_head">
                                            <th class="column-1 text-center"> Img </th>
                                            <th class="column-2 text-center">{{ __('messages.frontend.cart.product') }}</th>
                                            <th class="column-3 text-center"> {{ __('messages.frontend.cart.price') }} </th>
                                            <th class="column-5 text-center"> {{ __('messages.frontend.cart.total') }} </th>
                                        </tr>
                                        @foreach ($user->wishlists as $index => $product)
                                            <tr class="table_row">
                                                <td class="col-1  text-center">
                                                    <div class="how-itemcart1">
                                                        <img src="{{ $product->getFirstMediaUrl('product', 'preview') }}"
                                                            alt="IMG" class="" style="width: 80%">
                                                    </div>
                                                </td>
                                                <td class="column-2 text-center">{{ $product->name }}</td>
                                                <td class="column-3 text-center productPrice"> {{ $product->sale_price_with_currency() }} </td>
                                                <td class="column-5  text-center">
                                                    {{ $product->sale_price_with_currency() }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user have no products in thier wishlist </p>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Coupons </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($user->coupons) != 0)
                                    <table class="table table-bordered table-hover">
                                        <tr class="table_head">
                                            <th class="column-2 text-center">code</th>
                                            <th class="column-3 text-center"> Status </th>
                                            <th class="column-5 text-center"> No of usage </th>
                                        </tr>
                                        @foreach ($user->coupons as $index => $coupon)
                                            <tr class="table_row">
                                                <td class="col-1  text-center">
                                                    {{ $coupon->code }}
                                                </td>
                                                <td @class([
                                                    'p-2',
                                                    'text-center',
                                                    'text-success' => $coupon->status,
                                                    'text-danger' => !$coupon->status,
                                                ])>{{ __('admin.all_coupons.' . printEnum(App\Enums\CategoryEnum::class, $coupon->status)) }}</td>
                                                <td class="column-3 text-center productPrice"> {{ $coupon->pivot->max_no_of_usage }} </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user did not use any coupon </p>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Reviews </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($user->reviews) != 0)
                                    <table class="table table-bordered table-hover">
                                        <tr class="table_head">
                                            <th class="column-2 text-center">Product</th>
                                            <th class="column-3 text-center"> Rate </th>
                                            <th class="column-5 text-center"> Review </th>
                                        </tr>
                                        @foreach ($user->reviews as $index => $review)
                                            <tr class="table_row">
                                                <td class="col-1  text-center">
                                                    {{ $review->product->name }}
                                                </td>
                                                <td @class(['p-2', 'text-center'])>{{ $review->rate }}</td>
                                                <td class="column-3 text-center productPrice"> {{ $review->comment }} </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user did not make any review </p>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Favorites </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if (count($user->favs) != 0)
                                    <table class="table table-bordered table-hover">
                                        <tr class="table_head">
                                            <th class="column-2 text-center">Product</th>
                                            <th class="column-3 text-center"> Price </th>
                                        </tr>
                                        @foreach ($user->favs as $index => $product)
                                            <tr class="table_row">
                                                <td class="col-1  text-center">
                                                    {{ $product->name }}
                                                </td>
                                                <td @class(['text-center'])>{{ $product->sale_price }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @else
                                    <p class="text-center text-danger"> This user have no favorites </p>
                                @endif

                            </div>
                            <!-- /.card-body -->
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
    <script src="{{ asset('dashboard-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
