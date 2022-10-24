@extends('user.layouts.master')

@section('sub_title')
    {{ $search }}
@endsection

@section('header')

    <style>


        .shop-area {
            min-height: 600px;
            margin-top: 113px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 0 !important
        }

        .shop-area .tab-content .single-product {
            margin-top: 15px !important
        }

        @media (max-width: 767px) {
            .shop-area {
                margin-top: 132px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .shop-area {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }
        }

    </style>

@endsection

@section('content')


<div class="shop-area mt-4 padding_section" style="margin-top:0px;padding-top:30px">
    <div class="container">
        <div class="row">

            <nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{asset('/')}}">
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                         {{ $search }}
                    </li>
                </ol>
            </nav>

            @if($Products != null && $Products->count() > 0)


            <div class="col-lg-12">
                <div class="shop-right-area">

                    <div class="tab-content mrgn-40">
                        <div id="grid" class="tab-pane fade show active">
                            <div class="row">

                                @foreach ($Products as $item)
                                    @include('user.includes.product2')
                                @endforeach

                            </div>
                        </div>


                    </div>

                </div>
            </div>

            @else

            <div class="col-lg-12" style="padding-top: 100px">
                <h2>
                    عفوا لا يوجد منتجات
                </h2>
            </div>

            @endif


        </div>
    </div>
</div>





@endsection
