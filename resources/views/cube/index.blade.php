<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">Cube Summation</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link active" href="#">Home</a>
              </nav>
            </div>
          </div>
          <div class="inner cover">
			<h1 class="cover-heading">Challenges Cube Summation</h1>
			<p class="lead">
				Se le da una matriz de 3 - D en el que cada bloque contiene 0 inicialmente . El primer bloque está definido por las coordenadas (1,1,1 ) y el último bloque se define por la coordenada (N , N, N). Hay dos tipos de consultas.
				<a class="btn btn-info btn-xs" href="https://www.hackerrank.com/contests/101jan14/challenges/cube-summation" role="button">Más Info</a>
			</p>
			<p class="lead">
			  <a href="cube/solution" class="btn btn-lg btn-primary">Solucion</a>
			</p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Cube Summation, by <a href="https://twitter.com/@danieljvx">@danieljvx</a>::Daniel Villanueva</p>
            </div>
          </div>

        </div>

      </div>

    </div>

	<!-- Scripts -->
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	
	@section('jquery_on_ready')
		$('[data-toggle="popover"]').popover();
</body>
</html>