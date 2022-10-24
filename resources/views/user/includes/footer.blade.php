

@php
$footer1 = App\Models\Footer::where('id',1)->first();
$footer2 = App\Models\Footer::where('id',2)->first();
$footer3 = App\Models\Footer::where('id',3)->first();
$footer4 = App\Models\Footer::where('id',4)->first();   
@endphp



<!-- COMPANY-FACALITY START -->
<section class="company-facality">
<div class="container">
	<div class="row company-facality-row">
		<!-- SINGLE-FACALITY START -->
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="single-facality">
				<div class="facality-icon">
					<i class="fa fa-rocket"></i>
				</div>
				<div class="facality-text">
					<h3 class="facality-heading-text">{{ $footer1->title }}</h3>
					<span>{{ $footer1->description }}</span>
				</div>
			</div>
		</div>
		<!-- SINGLE-FACALITY END -->
		<!-- SINGLE-FACALITY START -->
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="single-facality">
				<div class="facality-icon">
					<i class="fa fa-umbrella"></i>
				</div>
				<div class="facality-text">
					<h3 class="facality-heading-text">{{ $footer2->title }}</h3>
					<span>{{ $footer2->description }}</span>
				</div>
			</div>
		</div>
		<!-- SINGLE-FACALITY END -->
		<!-- SINGLE-FACALITY START -->
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="single-facality">
				<div class="facality-icon">
					<i class="fa fa-calendar"></i>
				</div>
				<div class="facality-text">
					<h3 class="facality-heading-text">{{ $footer3->title }}</h3>
					<span>{{ $footer3->description }}</span>
				</div>
			</div>
		</div>
		<!-- SINGLE-FACALITY END -->
		<!-- SINGLE-FACALITY START -->
		<div class="col-xl-3 col-sm-6 col-12">
			<div class="single-facality">
				<div class="facality-icon">
					<i class="fa fa-refresh"></i>
				</div>
				<div class="facality-text">
					<h3 class="facality-heading-text">{{ $footer4->title }}</h3>
					<span>{{ $footer4->description }}</span>
				</div>
			</div>
		</div>
		<!-- SINGLE-FACALITY END -->
	</div>
</div>
</section>
<!-- COMPANY-FACALITY END -->
