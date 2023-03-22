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
                                <form method="post" action="{{ route('sellers.products.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('seller.add_product.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en"
                                                value="{{ old('name.en') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('seller.add_product.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                value="{{ old('name.ar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="purchase_price">{{ __('seller.add_product.purchase_price') }}</label>
                                            <input type="number" name="purchase_price" class="form-control"
                                                id="purchase_price" value="{{ old('purchase_price') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="sale_price">{{ __('seller.add_product.sale_price') }}</label>
                                            <input type="number" name="sale_price" class="form-control" id="sale_price"
                                                value="{{ old('sale_price') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">{{ __('seller.add_product.quantity') }}</label>
                                            <input type="number" name="quantity" class="form-control" id="quantity"
                                                value="{{ old('quantity') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('seller.add_product.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" disabled selected></option>
                                                <option @selected(old('status') === '1') value="1">
                                                    {{ __('seller.add_product.active') }}</option>
                                                <option @selected(old('status') === '0') value="0">
                                                    {{ __('seller.add_product.not_active') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_id">{{ __('seller.add_product.category') }}</label>
                                            <select name="category_id" class="form-control" id="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="" disabled selected></option>
                                                    <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="description_en">{{ __('seller.add_product.description_en') }}</label>
                                            <textarea id='description_en' class="form-control" name="description[en]"
                                                placeholder="{{ __('seller.add_product.description_en') }}"> {{ old('description.en') }} </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="description_ar">{{ __('seller.add_product.description_ar') }}</label>
                                            <textarea id="description_ar" class="form-control" name="description[ar]"
                                                placeholder="{{ __('seller.add_product.description_ar') }}"> {{ old('description.ar') }} </textarea>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="row">
                                                <div class="col-2">
                                                    <input type="file" class="d-none" name="image" id="file"
                                                        onchange="loadFile(event)">
                                                    <label for="file">
                                                        <img src="{{ asset('custom-images/default.png') }}" alt="default"
                                                            class="w-100 " id="image" style="cursor: pointer">
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <label for="files">
                                            <img src="{{ asset('custom-images/default.png') }}" alt="default"
                                                class="w-100 " id="image" style="cursor: pointer">
                                        </label>
                                        <input id='files' type='file' name="image" class="d-none" multiple >
                                        <output id='result'></output>
                                        
                                        <div class="form-group " id="spec">
                                            <button class="button-general w-50 mt-3" type="button" name="button"
                                                onclick="newinput()">Add spec</button>
                                            <button class="button-general w-50 mt-4" type="button" name="button"
                                                onclick="saveSpec()">Save Specs</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('seller.add_product.submit') }} </button>
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
    <script>
        var id = 1;
        var inputs = [];
        var newinput = function() {
            var parent = document.getElementById('spec')
            if (id % 2 != 0) {
                var wraper = document.createElement('div')
                wraper.className = 'row justify-content-between';
                wraper.id = 'row' + id;
                parent.appendChild(wraper)
                var specKey = document.createElement("input")
                specKey.className = id + " col-5 form-control p-2 mt-2";
                specKey.style = "display:inline-block;";
                specKey.id = "input" + id;
                inputs.push(specKey.id);
                specKey.type = 'text';
                specKey.name = specKey.inner;
                wraper.appendChild(specKey);
            } else {
                var wraper = document.getElementById('row' + (id - 1))
                var specValue = document.createElement("input")
                specValue.className = " col-5 form-control p-2 mt-2"
                specValue.style = "display:inline-block;"
                specValue.id = "input" + id;
                inputs.push(specValue.id);
                wraper.appendChild(specValue);
            }
            id += 1;
            return inputs;
        }

        var specs = {};
        var saveSpec = function() {
            for (let counter = 1; counter <= (inputs.length);) {
                if ((counter + 1) > (inputs.length)) {
                    break;
                }
                var specKey = document.getElementById("input" + counter);
                var specValue = document.getElementById('input' + (counter + 1));
                specs[specKey.value] = specValue.value;
                counter += 2;
            }
            console.log(specs);
            return specs;
        }
    </script>

    <script>
        window.onload = function() {
            //Check File API support
            if (window.File && window.FileList && window.FileReader) {
                var filesInput = document.getElementById("files");
                filesInput.addEventListener("change", function(event) {
                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");
                    for (var i = 0; i < files.length; i++) {
                        var file = files[i];
                        //Only pics
                        if (!file.type.match('image'))
                            continue;
                        var picReader = new FileReader();
                        picReader.addEventListener("load", function(event) {
                            var picFile = event.target;
                            var div = document.createElement("div");
                            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";
                            output.insertBefore(div, null);
                        });
                        //Read the image
                        picReader.readAsDataURL(file);
                    }
                });
            } else {
                console.log("Your browser does not support File API");
            }
        }
    </script>
@endpush
