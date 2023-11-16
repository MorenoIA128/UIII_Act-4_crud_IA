<?php

# Salir si alguno de los datos no está presente
if (
    !isset($_POST["idProducto"]) ||
    !isset($_POST["nombre"]) ||
    !isset($_POST["descripcion"]) ||
    !isset($_POST["precio"]) ||
    !isset($_POST["stock"]) ||
    !isset($_POST["marca"]) ||
    !isset($_POST["codigo"]) ||
    !isset($_POST["tamano"])
) exit();

# Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$idProducto = $_POST["idProducto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$stock = $_POST["stock"];
$marca = $_POST["marca"];
$codigo = $_POST["codigo"];
$tamano = $_POST["tamano"];
$id = $_POST["id"];  // Añadí la línea para mantener la variable $id

$sentencia = $base_de_datos->prepare("UPDATE tbl_productos SET idProducto = ?, nombre = ?, descripcion = ?, precio = ?, stock = ?, marca = ?, codigo = ?, tamano = ? WHERE id = ?;");
$resultado = $sentencia->execute([$idProducto, $nombre, $descripcion, $precio, $stock, $marca, $codigo, $tamano, $id]);

if ($resultado === TRUE) {
    header("Location: ./listar.php");
    exit;
} else {
    echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
}
?>
