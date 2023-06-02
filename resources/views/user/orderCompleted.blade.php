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
                            @if(session()->has('success'))
                                <h2 class="text-success text-center">{{session()->get('success')}}</h2>
                                 <div class=" my-5">
                                    You should expect delivery within 5 working days
                                    You will be redirected to home page after 5 seconds
                                </div>
                            @elseif (session()->has('error'))
                                <h2 class="text-danger text-center">{{session()->get('error')}}</h2>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                window.location.href = "{{ route('users.dashboard') }}";
            }, 7000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endpush
