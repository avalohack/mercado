	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?><!DOCTYPE html>
	<html lang="en">
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">

		#pre-load-web {width:100%;position:absolute;background:#fff;left:0px;top:0px;z-index:100000}
		#pre-load-web #imagen-load{left:50%;margin-left:-30px;position:absolute}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){

			$("body").css({"overflow-y":"hidden"});
			var alto=$(window).height();
			$("body").append("<div id='pre-load-web'><div id='imagen-load'><img src='http://preloaders.net/preloaders/359/Filling%20circles.gif'  /><br />Cargando...</div>");
			$("#pre-load-web").css({height:alto+"px"});
			$("#imagen-load").css({"margin-top":(alto/2)-30+"px"});
		}) 

		$(window).load(function(){
			$("#pre-load-web").fadeOut(1000,function()
			{ 
	               //eliminamos la capa de precarga
	               $(this).remove();
	               //permitimos scroll
	               $("body").css({"overflow-y":"auto"}); 

	           });        
		}) 
	</script>


	<meta charset="utf-8">
	<title>Lista de mercado</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
</style>
</head>
<body style="width:  100%">

<?php echo form_open('nuevo/nuevo') ?>
	<div id="container">
		<h1>Lista De Mercado</h1>

		<div id="body">
			<code>
				<label for="correo">Correo</label>
				<input type="email" name="correo" id="correo" placeholder="Correo" required>
			</code>
			<code>
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave">
			</code>
			<code>
				<label for="clave">Clave</label>
				<input type="password" name="clave2" id="clave" placeholder="Clave">
			</code>
			<?php if (isset($mensaje)){echo $mensaje;}
					  echo validation_errors();
			?>
			<code>
				<button>confirmar</button>
				<a href="<?php echo site_url('login');?>">Regresar</a>

			</code>
	</div>
</form>
</div>

</body>
</html>