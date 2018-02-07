@if ( $agent->isMobile() )
	<div class="mobile-search-btn-top">
		<button class="btn btn-success" style="width: 100%">
			<i class="fa fa-search"></i> {{ trans('all.cauta') }}
		</button>
	</div>

	<!-- left-bottom -->
	<!-- <div class="mobile-search-btn">
		<button class="btn btn-primary">
			<i class="fa fa-search"></i> {{ trans('all.cauta') }}
		</button>
	</div> -->

	<!-- right-bottom -->
	<div class="mobile-top-btn">
		<button class="btn btn-primary">
			<i class="fa fa-long-arrow-up fa-2x"></i>
		</button>
	</div>
@endif