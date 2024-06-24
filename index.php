<?php
    // Connect to database
    $con = mysqli_connect("localhost","root","","telo");
    // mysqli_connect("servername","username","password","database_name")
    // Get all the categories from category table
    $consulta="SELECT numero FROM habitaciones WHERE estado='libre'";
    $all_categories2 = mysqli_query($con,$consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Habitaciones de Hotel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 20px;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 50%;
            margin: 0 auto;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="date"],
        form input[type="text"],
        form input[type="email"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        form button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
        }
        #habitaciones-list {
            margin-bottom: 20px;
        }
        #message {
            text-align: center;
            margin-top: 20px;
            color: green;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="habitaciones-list"></div>

    <h2>Reservar Habitación</h2>

    <form action="reservar.php">

        <label for="room_id">Número de Habitación:</label>
        <select id="room_id" name="room_id">
            <?php while ($category2 = mysqli_fetch_array($all_categories2, MYSQLI_ASSOC)): ?>
                <option value="<?php echo $category2["numero"];?>">
                    <?php echo $category2["numero"]; ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label for="checkin_date">Fecha de Entrada:</label>
        <input type="date" id="checkin_date" name="checkin_date" required><br><br>

        <label for="checkout_date">Fecha de Salida:</label>
        <input type="date" id="checkout_date" name="checkout_date" required><br><br>

        <label for="guest_name">Nombre del Huésped:</label>
        <input type="text" id="guest_name" name="guest_name" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br><br>

        <label for="mail">Correo Electrónico:</label>
        <input type="email" id="mail" name="mail" required><br><br>

        <button type="submit">Reservar Habitación</button>
    </form>

    <div id="message"></div>

    <h2>Habitaciones Disponibles</h2>
    <?php 
        require 'conexion.php'; // Incluir el archivo de conexión

        $consulta = $conexion->prepare("SELECT * FROM habitaciones WHERE estado='libre'");
        $consulta->execute();
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        echo "<table>";
        echo "<tr><th>###</th><th>Número de Habitación</th><th>Tipo</th><th>Precio</th><th>Capacidad</th><th>Estado</th></tr>";
        $n = 1;
        foreach ($datos as $elemento) {
            echo "<tr>";
            echo "<td>".$n."</td>";
            echo "<td>".$elemento['numero']."</td>";
            echo "<td>".$elemento['tipo']."</td>";
            echo "<td>".$elemento['precio']."</td>";
            echo "<td>".$elemento['capacidad']."</td>";
            echo "<td>".$elemento['estado']."</td>";
            echo "</tr>";
            $n++;
        }
        echo "</table>";
    ?>

</body>
</html>
