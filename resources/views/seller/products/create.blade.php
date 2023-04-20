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

                                        <label for="files">
                                            <img src="{{ asset('custom-images/default.png') }}" alt="default"
                                                class="w-100 " id="image" style="cursor: pointer">
                                        </label>
                                        <input id='files' type='file' name="image" class="d-none" multiple>
                                        <output id='result'></output>


                                    </div>
                                    <div class="form-group">
                                        <table id="specs" data-specs ="<?= htmlspecialchars($specs) ?>"  class="table  table-responsive specs">
                                            <thead>
                                                <th class="col-2">Spec Name (AR) </th>
                                                <th class="col-2">Spec Value (AR)</th>
                                                <th class="col-2">Spec Name (EN) </th>
                                                <th class="col-2">Spec Value (EN) </th>
                                                <th class="col-2">
                                                    <a href="javascript:void(0)" class="btn btn-success addRow">Add Spec
                                                    </a>
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <select id="state" class="js-example-basic-single form-control " type="text"
                                                        style="width:90% ; height: 35px;" name='spec_names[0][ar]'>
                                                        @foreach ($specs as $spec)
                                                        <option value="{{$spec->getTranslation('name','ar')}}" class="p-2">{{$spec->getTranslation('name','ar')}}</option>
                                                        @endforeach
                                                    </select>
                                                    </td>
                                                    {{-- <td><input type="text" name="spec_names[0][ar]" class="p-2 form-control"></td> --}}
                                                    <td><input type="text" name="spec_values[0][ar]" class="p-2 form-control">
                                                    </td>
                                                    <td>
                                                        <select id="state2" class="js-example-basic-single form-control p-2" type="text"
                                                        style="width:90% ; padding: 5px;" name='spec_names[0][en]'>
                                                        @foreach ($specs as $spec)
                                                        <option value="{{$spec->getTranslation('name','en')}}" class="p-2">{{$spec->getTranslation('name','en')}}</option>
                                                        @endforeach
                                                    </select>
                                                    </td>
                                                    {{-- <td><input type="text" name="spec_names[0][en]"
                                                            class="p-2 form-control"></td> --}}
                                                    <td><input type="text" name="spec_values[0][en]"
                                                            class="p-2 form-control">
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-danger deleteRow">Delete </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
    <input type="hidden" value="<?= htmlspecialchars($specs) ?>">
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

    <script>
        var i = 1;
        var specs = document.getElementById('specs').dataset.specs
        console.log(specs)
        $('thead').on('click', '.addRow', function() {

            var tr = `<tr>
                        <td>
                            <input type="text" name="spec_names[` + i + `][ar]" class="p-2 form-control">
                        </td>
                        <td>
                            <select id="state" class="js-example-basic-single form-control " type="text" tyle="width:90% ; padding: 5px;" name='spec_names[` + i + `][ar]'>`;

                                for (const spec in specs ){

                                    tr.concat(`<option value="`+ spec.name+`" class="p-2">`+ spec.name + `</option>`)
                                }
                                tr.concat(`</select>
                        </td>
                        <td>
                            <input type="text" name="spec_values[` + i + `][ar]" class="p-2 form-control">
                        </td>
                        <td>
                            <input type="text" name="spec_names[` + i + `][en]" class="p-2 form-control">
                        </td>
                        <td>
                            <input type="text" name="spec_values[` + i + `][en]" class="p-2 form-control">
                        </td>
                        <td>
                            <a href="javascript:void(0)" class="btn btn-danger deleteRow">Delete </a>
                        </td>
                    </tr>`);
            $('tbody').append(tr);
            i++;
        });

        $('tbody').on('click', '.deleteRow', function() {
            $(this).parent().parent().remove();
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#state").select2({
            tags: true
            // height: resolve
            });

            $("#btn-add-state").on("click", function(){
            var newStateVal = $("#new-state").val();
            // Set the value, creating a new option if necessary
            if ($("#state").find("option[value='" + newStateVal + "']").length) {
                $("#state").val(newStateVal).trigger("change");
            } else {
                // Create the DOM option that is pre-selected by default
                var newState = new Option(newStateVal, newStateVal, true, true);
                // Append it to the select
                $("#state").append(newState).trigger('change');
            }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#state2").select2({
            tags: true,

            });

            $("#btn-add-state").on("click", function(){
            var newStateVal = $("#new-state").val();
            // Set the value, creating a new option if necessary
            if ($("#state").find("option[value='" + newStateVal + "']").length) {
                $("#state").val(newStateVal).trigger("change");
            } else {
                // Create the DOM option that is pre-selected by default
                var newState = new Option(newStateVal, newStateVal, true, true);
                // Append it to the select
                $("#state").append(newState).trigger('change');
            }
            });
        });


    </script>
@endpush
