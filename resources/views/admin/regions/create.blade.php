@extends('admin.layouts.parent')

@section('title', __('admin.sidebar.create'))

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
                                <h3 class="card-title"> {{ __('admin.sidebar.create') }} </h3>
                            </div>
                            @include('admin.layouts.partials.errors')
                            <div class="card-body">
                                <form method="post" action="{{ route('admins.regions.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name_en">{{ __('admin.add_region.name_en') }}</label>
                                            <input type="text" name="name[en]" class="form-control" id="name_en"
                                                value="{{ old('name.en') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('admin.add_region.name_ar') }}</label>
                                            <input type="text" name="name[ar]" class="form-control" id="name_ar"
                                                value="{{ old('name.ar') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">{{ __('admin.add_region.status') }}</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="" disabled selected></option>
                                                <option value="1">
                                                    {{ __('admin.add_region.active') }}</option>
                                                <option value="0">
                                                    {{ __('admin.add_region.not_active') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="city_id">{{ __('admin.add_region.city') }}</label>
                                            <select name="city_id" class="form-control" id="city_id">
                                                <option value="{{__('admin.add_region.choose')}}" selected >{{__('admin.add_region.choose')}}</option>
                                                @foreach ($cities as $city)
                                                    <option @selected(old('city_id') == $city->id) value="{{ $city->id }}">
                                                        {{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer ">
                                        <button type="submit" class="button-general w-50">
                                            {{ __('admin.add_region.submit') }} </button>
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
    @include('admin.layouts.partials.footer')
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
