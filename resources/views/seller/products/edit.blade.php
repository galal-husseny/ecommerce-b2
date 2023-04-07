@extends('seller.layouts.parent')

@section('title', __('seller.edit_product.title'))

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
                                <h3 class="card-title"> {{ __('seller.edit_product.title') }} </h3>
                            </div>
                            @include('seller.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post"
                                    action="{{ route('sellers.products.update', \Illuminate\Support\Facades\Crypt::encryptString($product->id)) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('seller.edit_product.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en"
                                                value="{{ old('name.en', $product->getTranslation('name', 'en')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('seller.edit_product.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                value="{{ old('name.ar', $product->getTranslation('name', 'ar')) }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="purchase_price">{{ __('seller.edit_product.purchase_price') }}</label>
                                            <input type="number" name="purchase_price" class="form-control"
                                                id="purchase_price"
                                                value="{{ old('purchase_price', $product->purchase_price) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">{{ __('seller.edit_product.sale_price') }}</label>
                                            <input type="number" name="sale_price" class="form-control" id="sale_price"
                                                value="{{ old('sale_price', $product->sale_price) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">{{ __('seller.edit_product.quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control" id="quantity"
                                                value="{{ old('quantity', $product->quantity) }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.edit_product.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1" @selected((string) old('staus', $product->status) === '1')>
                                                    {{ __('seller.edit_product.active') }}
                                                </option>
                                                <option value="0" @selected((string) old('staus', $product->status) === '0')>
                                                    {{ __('seller.edit_product.not_active') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">{{ __('seller.edit_product.category') }}</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $category)
                                                    <option @selected(old('category_id', $product->category_id == $category->id)) value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[en]" placeholder="{{ __('seller.edit_product.description_en') }}"> {{ old('description.en', $product->getTranslation('description', 'en')) }} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[ar]" placeholder="{{ __('seller.edit_product.description_ar') }}"> {{ old('description.ar', $product->getTranslation('description', 'ar')) }} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="file" class="d-none" name="image" id="file"
                                                        onchange="loadFile(event)">
                                                    <label for="file">
                                                        <img src="{{ $product->getFirstMediaUrl('product') }}"
                                                            alt="default" class="w-100 " id="image" name="image"
                                                            style="cursor: pointer">
                                                    </label>

                                                </div>
                                                <a @style(['height: 20%', 'width: 5%']) class="btn btn-danger  p-2 mt-4">
                                                    <i @style(['color: #fff']) class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('seller.edit_product.submit') }} </button>
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
