<div class="row">
	<div class="col-xs-12" id="star-box-element">

		@if (isset($session_apartamente))
			@foreach ($session_apartamente as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/apartament/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Apartament - {{ $r->numar_de_camere }} camere - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Suprafața totală {{ $r->suprafata_totala }} (m2)
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

		@if (isset($session_case))
			@foreach ($session_case as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/casa/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Casă - {{ $r->numar_de_camere }} camere - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Suprafața totală {{ $r->suprafata_totala }} (m2)
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

		@if (isset($session_comerciale))
			@foreach ($session_comerciale as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/comercial/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Comercial - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Suprafața totală {{ $r->suprafata_totala }} (m2)
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

		@if (isset($session_industriale))
			@foreach ($session_industriale as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/industrial/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Industrial - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Suprafața totală {{ $r->suprafata_totala }} (m2)
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

		@if (isset($session_terenuri))
			@foreach ($session_terenuri as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/teren/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Teren - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Suprafața totală {{ $r->suprafata_terenului }} (ari)
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

		@if (isset($session_garaje))
			@foreach ($session_garaje as $r) 
				<div style="float: left">
					<div class="star-box-delete" id="{{ $r->category }}{{ $r->id }}" onclick="deleteStarBox( '{{ $r->category }}', {{ $r->id }} )">
						<i class="fa fa-close"></i>
					</div>
					<a href="/garaj/{{ $r->id }}">
						<div class="star-box-img">
							<img src="{{ $r->foto_1 }}" height="50px" width="70px">
						</div>

						<div class="star-box-content-block">
							<div class="star-box-title">
								Comercial - {{ $r->sector }}
							</div>
							<div class="star-box-content">
								Parcare: {{ $r->parcare }}
							</div>
							<div class="star-box-price">
								{{ $r->pret }} €
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif

	</div>
</div>