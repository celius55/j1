<div class="row">
	<div class="star-box-element">
		<div style="float: left;">
			<div class="star-box-delete" id="" onclick="deleteStarBox('`+value.category+`', `+value.id+`)">
				<i class="fa fa-close"></i>
			</div>
			<a href="/apartament/`+value.id+`">
				<div class="star-box-img">
					<img src="`+value.foto_1+`" height="50px" width="70px">
				</div>

				<div class="star-box-content-block">
					<div class="star-box-title">
						Apartament - `+value.numar_de_camere+` camere - `+value.sector+`
					</div>
					<div class="star-box-content">
						Suprafața totală `+value.suprafata_totala+` (m2)
					</div>
					<div class="star-box-price">
						`+value.pret+` €
					</div>
				</div>
			</a>
		</div>
	</div>
</div> 