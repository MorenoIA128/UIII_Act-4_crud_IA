<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="idProducto">idProducto:</label>
			<input value="<?php echo $producto->idProducto ?>" class="form-control" name="idProducto" required type="number" id="idProducto" placeholder="Escribe el idProducto">

			<label for="nombre">Nombre:</label>
			<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

			<label for="stock">Stock:</label>
			<input value="<?php echo $producto->stock ?>" class="form-control" name="stock" required type="number" id="stock" placeholder="Cantidad o stock">
			
			<label for="marca">Marca:</label>
			<input value="<?php echo $producto->marca ?>" class="form-control" name="marca" required type="text" id="marca" placeholder="Escribe la marca">

			<label for="codigo">Codigo:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="number" id="codigo" placeholder="codigo">

			<label for="tamano">Tamano:</label>
			<input value="<?php echo $producto->tamano ?>" class="form-control" name="tamano" required type="text" id="tamano" placeholder="Escribe el tamano">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
