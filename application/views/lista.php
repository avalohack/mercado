<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista De Mercado</title>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity=" 384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>

	.tooltip.top .tooltip-inner
	{
	    color:#fff;
	    background-color:#17a2b8;
	}
	/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
	.row.content {height: 1500px}

	/* Set gray background color and 100% height */
	.sidenav {
		background-color: #f1f1f1;
		height: 100%;
	}

	/* Set black background color, white text and some padding */
	footer {
		background-color: #555;
		color: white;
		padding: 15px;
	}

	/* On small screens, set height to 'auto' for sidenav and grid */
	@media screen and (max-width: 767px) {
		.sidenav {
			height: auto;
			padding: 15px;
		}
		.row.content {height: auto;} 
	}
</style>
</head>
<body>
<?php $atributo = array('class' => 'form-horizontal','role'=>'form');?>
<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-3 sidenav">
					<div class="col-sm-12 col-sd-7">
						<h1 class="text-center">Lista de Mercado </h1>
						<h4 class="text-center">Hola! <?php echo $correo; ?></h4>		
						<br><br><br>
					</div>
					<div class="col-sm-12 col-sd-7">
						<h4 class="text-center">Comparte tu lista con alguien</h4>
						<?php echo form_open('lista/compartir',$atributo) ;?>
						<div class="form-group ">
							<input type="mail" name="mail" class="form-control col-xs-4" placeholder="Correo" ></input>	
							<!--<input type="text" class="" id="" placeholder="Cantidad"></input>-->
							<button class="form-control col-xs-4  btn btn-info">Guardar</button>
							<a href="<?php echo site_url('salir'); ?>" class=" form-control col-xs-4  btn btn-info"> Salir</a>
						</div>
						</form>
<table class="table table-striped">
<tbody>
<tr>
<th>Compartido</th>
<th></th>
</tr>
</tbody>
<tbody>
<?php  //var_dump($compartido);
foreach ($compartido as $key){?>
<tr>
<td> <?php echo $key['compartir']; ?> </td>
<td> <a href="<?php echo site_url('lista/eliminar/').$key['id'].'/1';?>">x</a></td>
</tr>
<?php } ?>
</tbody>
</table>						
					</div>
			</div>
			<div class="col-sm-9">
				<br>
				<?php 
				echo form_open('lista',$atributo) ;?>
				<div class="form-group ">
					<input type="text" name="producto" class="form-control col-sm-12 col-md-3"  placeholder="Producto" ></input>

					<input type="text" name="cantidad" class="form-control col-sm-12 col-md-3"  placeholder="cantidad" ></input>

					<input type="text" name="nota"     class="form-control col-sm-12 col-md-3"  placeholder="nota" ></input>

					<!--<input type="text" class="" id="" placeholder="Cantidad"></input>-->
					<button class="form-control col-sm-12 col-md-3 btn btn-info">Agregar</button>

					<?php 
					if (validation_errors() || '0') 
					{	
						?>
						<div class="alert alert-warning">
							<strong>Hola!</strong> <?php echo validation_errors(); ?>.
						</div>
						<?php
					}
					?>




				</div>
			</form>
			<!-- <h4><small>Mis Productos</small></h4>-->
			<hr>
			<h2>Mis Productos</h2>
      <!--<h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
      	<h5><span class="label label-danger">Food</span> <span class="label label-primary">Ipsum</span></h5> <br>-->

      	<table class="table table-striped">
      		<thead>
      			<tr>
      				<th>Producto</th>
      				<th>cantidad</th>
      				<th>nota</th>
      				<th></th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($tabla as $key) { ?>
      			<tr>
      				<td><?php echo  $key['nombre_producto']?></td>
      				<td><?php echo  $key['cantidad']?></td>
      				<td><?php echo  $key['nota']?></td>
      				<td><a data-toggle="tooltip" title="estas seguro de eliminar el producto <?php echo  $key['nombre_producto']?>"  href="<?php echo site_url('lista/eliminar/').$key['id'].'/2';?> ">x</a></td>
      			</tr>
      			<?php } ?>

      		</tbody>
      	</table>
      	<br>
      	<!--<h4><small>RECENT POSTS</small></h4>-->
      	<hr>
      	<h2>Compartido con Migo</h2>
      <!--<h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
      	<h5><span class="label label-success">Lorem</span></h5><br>-->
      	<table class="table table-striped">
      		<thead>
      			<tr>
      				<th>Producto</th>
      				<th>cantidad</th>
      				<th>nota</th>
      			</tr>
      		</thead>
      		<tbody>
      			<?php foreach ($compartido_con_migo as $key) { ?>
      			<tr>
      				<td><?php echo  $key['nombre_producto']?></td>
      				<td><?php echo  $key['cantidad']?></td>
      				<td><?php echo  $key['nota']?></td>
      				<td><a href="  <?php echo site_url('lista/eliminar/').$key['id'].'/2';?> ">x</a></td>
      			</tr>
      			<?php } ?>

      		</tbody>
      	</table>
      	<hr>
      	
      </div>
  </div>
</div>
<footer class="container-fluid">
	<p class="text-center"><a href="http://vacasenvuelo.com" target="_black" > vacas en vuelo </a>  luis alejandro villegas | Yadir Jassan Zuleta García</p>
</footer>
</body>
</html>