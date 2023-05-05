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
                                                <option value="" disabled selected></option>
                                                @foreach ($categories as $category)
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
                                        <input id='files' type='file' name="images[]" class="d-none" multiple />
                                        <div id="myImg">
                                        </div>


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
                                                    <td><input type="text" name="spec_values[0][ar]" class="p-2 form-control">
                                                    </td>
                                                    <td>
                                                        <select id="state0" class="js-example-basic-single form-control p-2" type="text"
                                                        style="width:90% ; padding: 5px;" name='spec_names[0][en]'>
                                                        @foreach ($specs as $spec)
                                                        <option value="{{$spec->getTranslation('name','en')}}" class="p-2">{{$spec->getTranslation('name','en')}}</option>
                                                        @endforeach
                                                    </select>
                                                    </td>
                                                    <td><input type="text" name="spec_values[0][en]" class="p-2 form-control">
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
        $(function() {
            $(":file").change(function() {
                if (this.files && this.files[0]) {
                for (var i = 0; i < this.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[i]);
                }
                }
            });
            });

function imageIsLoaded(e) {
    $('#myImg').append(`
    <div class="d-inline">
    <img src='` + e.target.result + `' style="width:150px; ">
    <a href="javascript:void(0)" class="btn btn-danger deleteImg"><i class="zmdi zmdi-delete"></i> </a>
    </div>`);
};

$('#myImg').on('click', '.deleteImg', function() {
            $(this).parent().remove();
        })
    </script>

    <script>
        var i = 1;
        var specs = document.getElementById('specs').dataset.specs
        var specs = JSON.parse(specs)
        $('thead').on('click', '.addRow', function() {
            let tRow = document.createElement('tr');
            var td1 = document.createElement('td');
            var td2 = document.createElement('td');
            var td3 = document.createElement('td');
            var td4 = document.createElement('td');
            var td5 = document.createElement('td');

            var select = document.createElement('select');
            select.setAttribute('id' , 'state'+i+'');
            select.setAttribute('class' , 'js-example-basic-single form-control');
            select.setAttribute('type' , 'text');
            select.setAttribute('name' , 'spec_names['+ i +'][ar]');
            select.style.width = "90%";
            select.style.padding = "5px";

            for (let x = 0; x<specs.length; x++){
                var option = `<option value="`+ specs[x].name.ar+`" class="p-2">`+ specs[x].name.ar + `</option>`;
                select.innerHTML+=option;
            }
            td1.appendChild(select);
            td2.innerHTML = `<input type="text" name="spec_values[` + i + `][ar]" class="p-2 form-control">`;
            var select2 = document.createElement('select');
            select2.setAttribute('id' , 'state'+(i+2)+'');
            select2.setAttribute('class' , 'js-example-basic-single form-control');
            select2.setAttribute('type' , 'text');
            select2.setAttribute('name' , 'spec_names['+ i +'][en]');
            select2.style.width = "90%";
            select2.style.padding = "5px";
            for (let x = 0; x<specs.length; x++){
                var option = `<option value="`+ specs[x].name.en+`" class="p-2">`+ specs[x].name.en + `</option>`;
                select2.innerHTML+=option;
            }
            td3.appendChild(select2);
            td4.innerHTML= `<input type="text" name="spec_values[` + i + `][en]" class="p-2 form-control">`;
            td5.innerHTML = `<a href="javascript:void(0)" class="btn btn-danger deleteRow">Delete </a>`;
            tRow.append(td1);
            tRow.append(td2);
            tRow.append(td3);
            tRow.append(td4);
            tRow.append(td5);

            $('tbody').append(tRow);
            $("#state"+i+"").select2({
            tags: true
            });
            $("#state"+(i+2)+"").select2({
            tags: true
            });
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
            $("#state0").select2({
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
