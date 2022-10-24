@extends('user.layouts.master')

@section('sub_title')
    سياسة الاستخدام
@endsection

@section('header')
    <style>
        .editor span , .editor span span {
			font-family:'DroidArabicKufiRegular',sans-serif !important;
            line-height: 1.8
		}


        .main-content-section {
            min-height: 600px;
            margin-top: 93px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .main-content-section .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .main-content-section {
                margin-top: 136px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .main-content-section {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }
        }
    </style>
@endsection

@section('content')

<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section padding_section" style="min-height: 500px;padding-top:50px">
		<div class="container">



			@php
				$privacy = App\Models\Privacy::first();
			@endphp

			<div class="row">

			    <nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{asset('/')}}">
                                الرئيسية
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            سياسة الأستخدام
                        </li>
                    </ol>
                </nav>

				<div class="col-md-12 col-12">
					<!-- SINGLE-ABOUT-INFO START -->
					<div class="single-about-info">
						<div class="our-company">

							<div class="editor">
								{!! $privacy->description !!}
							</div>

						</div>
					</div>
					<!-- SINGLE-ABOUT-INFO END -->
				</div>

			</div>
		</div>
	</section>


@endsection
