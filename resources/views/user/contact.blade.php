@extends('user.layouts.parent')

@section('title', __('messages.frontend.contact.contact'))

@section('header')
    @parent
    @include('user.layouts.partials.header')
@endsection

@section('cart')
    @include('user.layouts.partials.cart')
@endsection

@section('footer')
    @parent
    @include('user.layouts.partials.footer')
@endsection

@section('content')
    @parent
    <!-- Title page -->
    <section class="bg-img1 txt-center p-lr-15 p-b-92 m-t-100"
        style="background-image: url('{{ asset('frontend-assets/images/bg-01.jpg') }}');">
        <h2 class="ltext-105 cl0 txt-center pt-4">
            {{ __('messages.frontend.contact.contact') }}
        </h2>
    </section>

    <!-- Content page -->
    <section class="bg0 p-t-104 m-b-100">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            {{ __('messages.frontend.contact.send_message') }}
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="{{ __('messages.frontend.contact.email') }}">
                            <img class="how-pos4 pointer-none"
                                src="{{ asset('frontend-assets/images/icons/icon-email.png') }}" alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                                placeholder="{{ __('messages.frontend.contact.how_we_help') }}"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            {{ __('messages.frontend.contact.submit') }}
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                {{ __('messages.frontend.contact.address') }}
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Coza Store Center 8th floor, 379 Hudson St, New York, NY 10018 US
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                {{ __('messages.frontend.contact.talk') }}
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                +1 800 1236879
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                {{ __('messages.frontend.contact.sale_support') }}
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                contact@example.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
