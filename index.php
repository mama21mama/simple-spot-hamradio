<!--
   Simple Spot HamRadio v1.0
   Código generado por IA (COPILOT)

   Copyright 2024 Fabián Bonetti <lu4ehf@gmail.com>
   
   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 2 of the License, or
   (at your option) any later version.
   
   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.
   
   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software
   Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
   MA 02110-1301, USA.

 -->
<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "dxcluster2";
$password = "dxcluster2";
$dbname = "dxcluster2";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autor = $_POST["autor"];
    $frecuencia = $_POST["frecuencia"];
    $licencia_corresponsal = $_POST["licencia_corresponsal"];
    $info = $_POST["info"];
    $fecha = $_POST["fecha"];
    //$hora = $_POST["hora"];

    // Insertar la entrada en la base de datos
    $sql = "INSERT INTO dxcluster2 (autor, frecuencia, licencia_corresponsal, info, fecha)
            VALUES ('$autor', '$frecuencia', '$licencia_corresponsal', '$info', '$fecha')";

    if ($conn->query($sql) === TRUE) {
        echo "Entrada guardada correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener todas las entradas de la base de datos
//$sql = "SELECT * FROM dxcluster2";
date_default_timezone_set("UTC");
$sql = "SELECT * FROM dxcluster2 ORDER BY fecha DESC limit 50 offset 0;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Spotter</th><th>Freq</th><th>DX</th><th>Info</th><th>Time UTC</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["autor"] . "</td><td>" . $row["frecuencia"] . "</td><td>" . $row["licencia_corresponsal"] . "</td><td>" . $row["info"] . "</td><td>" . $row["fecha"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No hay entradas en la base de datos.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<html>
<head>
	<meta charset="UTF-8">
    	<title>Simple Spot HamRadio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Author" lang="es" content="Reisub Informatica" />
	<meta name="keywords" content="spot, pulls, dxsummit.fi, Spotter, dxspider, cluster, hamradio, clusterdx" />
	<meta name="description" content=">Simple Spot HamRadio." />
<style>
/* Link copyright */
a:link {
  color: #f51;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: #f51;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: #f51;
  background-color: transparent;
  text-decoration: underline;
}
        /* Estilos generales para toda la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #333; /* Fondo oscuro */
            color: #f51; /* Texto blanco */
            margin: 0;
            padding: 0;
        }

        /* Estilos para el encabezado */
        h1 {
            text-align: center;
            padding: 20px 0;
        }

        /* Estilos para el formulario */
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>Spots de Radioaficionados</h1>
    <form method="post">
        Spotter: <input type="text" name="autor" required><br>
        Freq: <input type="text" name="frecuencia" required><br>
        DX: <input type="text" name="licencia_corresponsal" required><br>
	Info: <input type="text" name="info"><br>
	Fecha <input type="datetime-local" name="fecha" requerid><br><br>
        <input type="submit" value="Guardar">
    </form>
(C) 2024 - <a href="https://www.qrz.com/db/LU4ehf">LU4EHF</a>
</body>
</html>

