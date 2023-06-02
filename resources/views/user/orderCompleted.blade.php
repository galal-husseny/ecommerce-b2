@extends('user.layouts.parent')
@section('title', __('messages.frontend.cart.your_cart'))

@section('header')
    @include('user.layouts.partials.header')
@endsection

@section('footer')
    @include('user.layouts.partials.footer')
@endsection



@section('content')
    @parent
    <div class="container mb-5" style="margin-top: 10rem">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card p-2">
                    <div class="card-body " >
                        <h2 class="text-success text-center"> Your order is submitted successfully </h2>

                        <div class=" my-5">
                            You should expect delivery within 5 working days
                            You will be redirected to home page after 5 seconds
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@if(session()->has('success'))
    <script>
        Swal.fire(
            'Good Job',
            '{{session()->get('success')}}',
            'success'
        );
    </script>
    @elseif (session()->has('error'))
    <script>
        Swal.fire(
            'Failed',
            '{{session()->get('error')}}',
            'error'
        );
    </script>
    @endif

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                window.location.href = "{{ route('users.dashboard') }}";
            }, 7000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endpush
