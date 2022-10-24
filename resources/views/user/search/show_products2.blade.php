@extends('user.layouts.master')

@section('sub_title')
    {{ $Item->title }}
@endsection

@section('header')

    <link href="{{asset('files/select2/select2.min.css')}}" rel="stylesheet" />

    <style>


        .select2-container--default .select2-selection--multiple="true" {
            min-width: auto !important;
            height: 40px !important
        }

        .select2-container--default .select2-selection--single {
            height: 40px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 40px !important
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top:75%
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            text-align: right !important;
            padding-top: 6px !important;
            padding-right: 10px !important;
            font-family:'DroidArabicKufiRegular',sans-serif !important;
            height: 25px;
        }

        .hidden_filter {
            display:none;
            width:100%;
        }

        .shop-area {
            min-height: 600px;
            margin-top: 144px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .shop-area .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .shop-area {
                margin-top: 136px !important;
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


    <div class="shop-area mt-4 padding_section">
        <div class="container">

            {!! Form::open(['url' => "products-search", 'role'=>'form','class' => '' ,'id'=>'search-form', 'method'=>'get']) !!}

                <div class="row" style="margin-top: 50px">

                    <nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{asset('/')}}">
                                    الرئيسية
                                </a>
                            </li>
                            @if($Item->main_category != null)
                            <li class="breadcrumb-item">
                                <a href="{{asset($Item->main_category->url)}}">
                                    {{ $Item->main_category->title }}
                                </a>
                            </li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">
                                 {{ $Item->title }}
                            </li>
                        </ol>
                    </nav>

                </div>

                <div class="row hidden_filter main_filter">

                    @php
                        $sizes  = App\Models\Size::where('sub_category_id',$Item->id)->where('status',1)->pluck('title','id');
                        $colors  = App\Models\Color::where('status',1)->pluck('title','id');
                    @endphp

                    <input type="hidden" name="sub_category_id" value="{{ $Item->id }}">

                    <div class="col-md-4 selec2_div">
                        <select title="المقاسات" name="size_id[]" multiple="true" id="size_id" class="form-control js-example-basic-multiple">
                            <option value="" disabled>
                                من فضلك اختر مقاس
                            </option>
                            @if($sizes != null)
                                @foreach ($sizes as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-4 selec2_div">
                        <select title="الألوان" name="color_id[]" multiple="true" id="color_id" class="form-control js-example-basic-multiple">
                            <option value="" disabled>
                                من فضلك اختر لون
                            </option>
                            @if($colors != null)
                                @foreach ($colors as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-md-3 selec2_div">
                        <select title="السعر" name="price" id="price" class="form-control js-example-basic-multiple">
                            <option value="" disabled selected>
                                من فضلك اختر السعر
                            </option>
                            <option value="1">
                                السعر من الأقل ل الأعلي
                            </option>
                            <option value="2">
                                السعر من الأعلي ل الأقل
                            </option>
                        </select>
                    </div>

                    <div class="col-md-1 selec2_div">
                        <button type="submit" form="search-form" style="width: 100%;" class="btn btn-primary">
                            بحث
                        </button>
                    </div>

                </div>

            {!! Form::close() !!}
            <!--end::Form-->





            <div class="row">

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
                        عفوا لا يوجد منتجات في هذا القسم
                    </h2>
                </div>

                @endif


            </div>
        </div>
    </div>


@endsection

@section('footer')

    <script src="{{asset('files/select2/select2.min.js')}}"></script>


    <script>

        $(document).ready(function(){

            $('.js-example-basic-multiple').select2();

            $('#size_id').select2({
                placeholder: 'أختر مقاس',
                allowClear:true
            });

            $('#color_id').select2({
                placeholder: 'أختر لون',
                allowClear:true
            });

        });

        $(window).load(function() {

            $('.row').removeClass('hidden_filter');

            $('.js-example-basic-multiple').select2();

            $('#size_id').select2({
                placeholder: 'أختر مقاس',
                allowClear:true
            });

            $('#color_id').select2({
                placeholder: 'أختر لون',
                allowClear:true
            });

        });

    </script>




@endsection

