<!DOCTYPE html>
<html>

<head>
	<title>PDF</title>
	<link href="{{asset('/assets/backend/plugins/datatables/buttons.bootstrap.min.css')}}" rel="stylesheet"
		type="text/css" />
	<link href="{{asset('/assets/backend/css/custom.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
	<p style="text-align:center;"></p>
	<p style="text-align:center;"><img style="height: 100 px ; width: 200px"
			src="{{asset('/assets/frontend/img/logo/logo_ministere.jpg')}}" alt="logo"></p>
	<div class="card-box">
		<div class="text-center">
			<h3 style="text-align:center;">
				ENGAGEMENT
			</h3>
		</div>
		<div class="clearfix">
			<p>

			</p>
		</div>
	</div>
	<div class="container">
		<table class="table table-bordered m-0">
			<tr>
				<td>
					<br />
					<br />
					Je soussigné {{$data['demande']->nom_p}} {{$data['demande']->prenom_p}} titulaire de la CIN
					n° {{$data['demande']->cin}} et représentant de la société/président de la coopérative
					{{$data['demande']->nom_s}} atteste par la présente, mon engagement à remettre à la Direction
					Régionale du Département de l’Energie et des Mines de {{$data['demande']->region}}., l’ensemble des
					pièces
					constituant le dossier de la demande d’autorisation d’Exploitation des Haldes et Terrils y compris
					le récépissé de versement de la rémunération des services rendus au titre de l’institution de ladite
					autorisation, et ce, dans un délai ne dépassant pas 10 jours à compter de la date de réservation du
					site minier/ à compter du {{ $data['date_creation']}} .
				</td>
			</tr>
			<tr>
				<td>
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<br /> <br />
					<br />
					<p>
						NB : Pour pouvoir payer la rémunération des services rendus au titre de l’institution de
						l’autorisation d’Exploitation des Haldes et Terrils, le demandeur de ladite autorisation doit se
						présenter à la Direction Régionale du Département de l’Energie et des Mines dont relève le site
						demandé pour lui délivrer, à cet effet, un Bulletin de Versem
					</p>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>