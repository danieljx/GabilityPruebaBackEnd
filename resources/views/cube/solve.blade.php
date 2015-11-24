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
<nav class="navbar navbar-default navbar-fixed-top navbar-primary">
      <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://twitter.com/danieljvx">@danieljvx</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/solve">Solucion</a></li>
          </ul>
		  
              <p class="navbar-text navbar-right">Cube Summation</p>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
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
									<strong id="resposeValidateText">Formato Correcto!</strong>
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
QUERY 2 2 2 2 2 2" id="in" name="in" style="margin: 0px; height: 253px;"></textarea>
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
1" id="out" name="out" style="margin: 0px; height: 129px;"></textarea>
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
						<h4 class="list-group-item-heading">Cantidad de Pruebas</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="right" data-content="Número entero no mayor a 50.">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Tamaño del Cubo e interaciones</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="right" data-content="Dos Número entero separados por un espacio.">
						  <span class="glyphicon glyphicon-info-sign"></span>
						</button>
						</span>
				  </li>
				  <li class="list-group-item clearfix">
						<span class="pull-left">
						<h4 class="list-group-item-heading">Interaciones</h4>
						</span>
						<span class="pull-right">
						<button class="btn btn-xs btn-info" data-container="body" data-toggle="popover" data-placement="right" data-content="Query y/o Update.">
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
						cache: false,
						async: false,
						type: "POST",
						url: 'valid',
						data: {"text" : $(this).val()},
						dataType: 'json',
						success: function (dataResp) {
							$("div#formGroupInput").removeClass((dataResp.error?"has-success":"has-error")).addClass((dataResp.error?"has-error":"has-success"));
							$("div#resposeValidate").removeClass((dataResp.error?"alert-success":"alert-danger")).removeClass("hidden").addClass((dataResp.error?"alert-danger":"alert-success"));
							$("div#resposeValidate > strong").html(dataResp.errorText);
							$('button#submitCode').prop('disabled', dataResp.error);
						},
						error: function (data) {
							alert("error");
						}
					});
				} else {
					$("div#formGroupInput").removeClass("has-success").removeClass("has-error");
					$("div#resposeValidate").removeClass("alert-success").removeClass("alert-danger").addClass("hidden");
					$("button#cleanCode").prop('disabled', true);
				}
			});
			$('#cleanCode').on("click", function (e) {
				$('#in').val("");
				$("div#formGroupInput").removeClass("has-success").removeClass("has-error");
				$("div#resposeValidate").removeClass("alert-success").removeClass("alert-danger").addClass("hidden");
				$(this).prop('disabled', true);
			});
		});
	</script>
</body>
</html>