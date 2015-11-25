<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<title>Cube Summation</title>

	{!! Html::style('assets/css/bootstrap.css') !!}
	{!! Html::style('assets/css/cover.css') !!}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="https://www.hackerrank.com/contests/101jan14/challenges/cube-summation">
						<strong>Cube</strong>Summation::<strong>hackerrank<strong>
					</a>
				</div>
				<div class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
					<ul id="menu" class="nav navbar-nav navbar-right">
						<li class="active">
							<a href="http://twitter.com/danieljvx">@danieljvx</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
		<div class="container-fluid" style="margin-top: 80px;">
			<div class="row">
			<div id="contentModule" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
			<div class="col-xs-8">
				<div class="alertDiv oculto"></div>
				<div class="tab-content">
					<div class="tab-pane active">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 id="panel-title" class="panel-title">Datos del Cubo</h3>
							</div>
							<div class="panel-body">
								<div class="alert alert-success hidden" role="alert" id="resposeValidate">
									<strong id="resposeValidateLine"></strong>
									<span id="resposeValidateText"></span>
								</div>
								<div class="form-group has-feedback" id="formGroupInput">
									<div class="input-group">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-edit"></span>
										</span>
										<textarea class="form-control" placeholder="2
4 5
UPDATE 2 2 2 4
QUERY 1 1 1 3 3 3
UPDATE 1 1 1 23
QUERY 2 2 2 4 4 4
QUERY 1 1 1 3 3 3
2 4
UPDATE 2 2 2 1
QUERY 1 1 1 1 1 1
QUERY 1 1 1 2 2 2
QUERY 2 2 2 2 2 2" id="in" name="in" style="margin: 0px; height: 333px;"></textarea>
									</div>
								</div>
								<div class="container-fluid">
									<div class="btn-group">
										<button type="button" id="submitCode" class="btn btn-success" disabled>
											<i class="glyphicon glyphicon-flash"></i>
											Resultado
										</button>
										<button type="button" id="cleanCode" class="btn btn-info" disabled>
											<i class="glyphicon glyphicon-erase"></i>
											Limbiar
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 id="panel-title" class="panel-title">Resultado del Cubo</h3>
							</div>
							<div class="panel-body" >
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-share"></span>
										</span>
										<textarea disabled class="form-control" placeholder="4
4
27
0
1
1" id="out" name="out" style="margin: 0px; height: 333px;"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
				<ul class="list-group">
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Linea 1</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="left" data-content="Cantidad de Test. Número entero no mayor a 50.">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Linea 2</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="left" data-content="Tamaño del Cubo e Interaciones con el. Dos Número entero separados por un espacio.">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Update</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="left" data-content="Interacion Update para cargar el cubo Formato: UPDATE x y z valor">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Query</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="left" data-content="Interacion Query para buscar en un rango de cordenadas los valores y sumarlos en el cubo Formato: QUERY x y z x1 y1 z1">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				</ul>
			</div>
			</div>
			</div>
		</div>
	<!-- Scripts -->
	{!! Html::script('assets/js/jquery-1.11.3.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	<script>
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$(function () {
			$('[data-toggle="popover"]').popover();
			$('#in').keyup(function () {
				$('button#submitCode').prop('disabled', true);
				if($(this).val().length > 0) {
					$("button#cleanCode").prop('disabled', false);
					$.ajax({
						async: true,
						type: "POST",
						url: 'valid',
						data: {"text" : $(this).val()},
						dataType: 'json',
						success: function (dataResp) {
							if(dataResp.error) {
								$("div#formGroupInput").removeClass("has-success").removeClass("has-warning").addClass("has-error");
								$("div#resposeValidate").removeClass("alert-success").removeClass("hidden").addClass("alert-danger");
								$("div#resposeValidate > strong").html("Linea " + dataResp.errorLine + ": ");
								$("div#resposeValidate > span").html(dataResp.errorInfo);
								$('button#submitCode').prop('disabled', true);
							} else if(dataResp.warning) {
								$("div#formGroupInput").removeClass("has-success").removeClass("has-error").addClass("has-warning");
								$("div#resposeValidate").addClass("hidden");
								$('button#submitCode').prop('disabled', true);
							} else {
								$("div#formGroupInput").removeClass("has-error").removeClass("has-warning").addClass("has-success");
								$("div#resposeValidate").addClass("hidden");
								$('button#submitCode').prop('disabled', false);
							}
						},
						error: function (data) {
							alert("error");
						}
					});
				} else {
					$("div#formGroupInput").removeClass("has-success").removeClass("has-error").removeClass("has-warning");
					$("div#resposeValidate").removeClass("alert-success").removeClass("alert-danger").addClass("hidden");
					$("button#cleanCode").prop('disabled', true);
				}
			});
			$('#cleanCode').on("click", function (e) {
				$('#in').val("");
				$("div#formGroupInput").removeClass("has-success").removeClass("has-error").removeClass("has-warning");
				$("div#resposeValidate").removeClass("alert-success").removeClass("alert-danger").addClass("hidden");
				$('button#submitCode').prop('disabled', true);
				$(this).prop('disabled', true);
			});

			$('#submitCode').on("click", function () {
				$.ajax({
					async: true,
					type: "POST",
					url: 'sum',
					data: {"text" : $('#in').val()},
					dataType: 'json',
					success: function (dataResp) {
						if(dataResp.length > 0) {
							text = "";
							for(var i=0; i<dataResp.length; i++) {
								text+= dataResp[i] + "\n";
							}
							$('#out').html(text);
						}
					},
					error: function (data) {
						alert("error");
					}
				});
			});
		});
	</script>
</body>
</html>