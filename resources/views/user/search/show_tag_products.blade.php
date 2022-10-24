@extends('user.layouts.master')

@section('sub_title')
    {{ $key }}
@endsection


@section('content')

<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section" style="padding-top: 50px;padding-bottom: 50px;min-height:500px">
		<div class="container">
			
			

			<div class="row">
				
				<div class="col-md-12 col-12">
					

					<!-- ALL GATEGORY-PRODUCT START -->
					<div class="all-gategory-product">
						<div class="row gategory-product">
							
							@if($count > 0)
								@foreach ($Products as $item)
								<!-- SINGLE ITEM START -->
								<div class="col-xl-3 col-lg-4 col-md-6 col-12">
									<div class="gategory-product-list">
										@include('user.includes.shop_product',['item' => $item])
									</div>
								</div>
								<!-- SINGLE ITEM END -->
								@endforeach
							@else
								<b style="display: block;text-align:center;margin: auto;margin-top: 100px;font-size: 40px;"> عفوا لا يوجد منتجات</b>
							@endif

	
						</div>
					</div>
					<!-- ALL GATEGORY-PRODUCT END -->
					

				</div>
			</div>
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->
	
	
	

@endsection
