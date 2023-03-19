@extends('seller.layouts.parent')

@section('title', __('seller.sidebar.create'))

@section('header')
    @include('seller.layouts.partials.header')
@endsection

@section('content')
    @parent
    @include('seller.layouts.partials.sidebar')
    <div class="content-wrapper">
        <section class="content my-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> {{ __('seller.sidebar.create') }} </h3>
                            </div>
                            @include('seller.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post" action="{{ route('sellers.products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('seller.add_product.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en" value="{{old('name.en')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('seller.add_product.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar" value="{{old('name.ar')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="purchase_price">{{ __('seller.add_product.purchase_price') }}</label>
                                            <input type="number" name="purchase_price" class="form-control" id="purchase_price" value="{{old('purchase_price')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">{{ __('seller.add_product.sale_price') }}</label>
                                            <input type="number" name="sale_price" class="form-control"  id="sale_price" value="{{old('sale_price')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">{{ __('seller.add_product.quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control" id="quantity" value="{{old('quantity')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.add_product.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" disabled selected></option>
                                                <option @selected(old('status') === '1') value="1" >{{__('seller.add_product.active')}}</option>
                                                <option @selected(old('status') === '0') value="0">{{__('seller.add_product.not_active')}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">{{ __('seller.add_product.category') }}</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="" disabled selected></option>
                                                    <option @selected(old('category_id') == $category->id) value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_en">{{ __('seller.add_product.description_en') }}</label>
                                            <textarea id='description_en' class="form-control" name="description[en]" placeholder="{{__('seller.add_product.description_en')}}"> {{old('description.en')}} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_ar">{{ __('seller.add_product.description_ar') }}</label>
                                            <textarea id="description_ar" class="form-control" name="description[ar]" placeholder="{{__('seller.add_product.description_ar')}}"> {{old('description.ar')}} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="file" class="d-none" name="image" id="file" onchange="loadFile(event)">
                                                    <label for="file">
                                                        <img src="{{asset('custom-images/default.png')}}" alt="default" class="w-100 " id="image" style="cursor: pointer">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50"> {{__('seller.add_product.submit')}} </button>
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
    @include('seller.layouts.partials.footer')
@endsection

@push('scripts')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
