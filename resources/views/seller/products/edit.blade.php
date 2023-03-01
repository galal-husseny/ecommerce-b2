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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- {{dd($product[0])}} --}}
                            <div class="card-body">
                                <form method="post" action="{{ route('sellers.products.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('seller.edit_product.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en" value="{{$product[0]->getTranslation('name' , 'en')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('seller.edit_product.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar" value="{{$product[0]->getTranslation('name' , 'ar')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="purchase_price">{{ __('seller.edit_product.purchase_price') }}</label>
                                            <input type="number" name="purchase_price" class="form-control" id="purchase_price" value="{{$product[0]->purchase_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">{{ __('seller.edit_product.sale_price') }}</label>
                                            <input type="number" name="sale_price" class="form-control"  id="sale_price" value="{{$product[0]->sale_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantiy">{{ __('seller.edit_product.quantity') }}</label>
                                            <input type="number" name="quantiy" class="form-control" id="quantiy" value="{{$product[0]->quantity}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.edit_product.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                @if($product[0]->status == 1)
                                                    <option value="1" selected>{{__('seller.edit_product.active')}}</option>
                                                    <option value="0">{{__('seller.edit_product.not_active')}}</option>
                                                @else
                                                    <option value="1" >{{__('seller.edit_product.active')}}</option>
                                                    <option value="0" selected>{{__('seller.edit_product.not_active')}}</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">{{ __('seller.edit_product.category') }}</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $category)
                                                @if ($product[0]->category_id === $category->id)
                                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                                                @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[en]" placeholder="{{__('seller.edit_product.description_en')}}" > {{$product[0]->getTranslation('description' , 'en')}} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description[ar]" placeholder="{{__('seller.edit_product.description_ar')}}"> {{$product[0]->getTranslation('description' , 'ar')}} </textarea>
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
                                        <button type="submit" class="button-general w-50"> {{__('seller.edit_product.submit')}} </button>
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
