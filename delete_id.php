<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "dxcluster2";
$password = "dxcluster2";
$dbname = "dxcluster2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID a borrar (puedes pasarlo como parámetro en la URL o desde un formulario)
$id_to_delete = $_GET['id'];

// Consulta SQL para borrar la fila con el ID especificado
$sql = "DELETE FROM dxcluster2 WHERE id = $id_to_delete";

if ($conn->query($sql) === TRUE) {
    echo "Fila con ID $id_to_delete borrada correctamente.";
} else {
    echo "Error al borrar la fila: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Borrar fila por ID</title>
</head>
<body>
    <h1>Borrar fila por ID</h1>
    <form action="delete_id.php" method="get">
        <label for="id">ID a borrar:</label>
        <input type="text" name="id" id="id">
        <input type="submit" value="Borrar">
    </form>
</body>
</html>

