
 <?php
// Importar el archivo de conexión
require 'conexion.php';

// Obtener los datos del formulario usando filter_input para evitar problemas de seguridad
$habitacion = filter_input(INPUT_GET, 'room_id', FILTER_SANITIZE_NUMBER_INT);
$ingreso = filter_input(INPUT_GET, 'checkin_date');
$egreso = filter_input(INPUT_GET, 'checkout_date');
$nombre = filter_input(INPUT_GET, 'guest_name', FILTER_SANITIZE_STRING);
$apellido = filter_input(INPUT_GET, 'apellido');
$mail = filter_input(INPUT_GET, 'mail');


         $stmt2 = $conexion->prepare("UPDATE `habitaciones` SET `estado` = 'ocupado' WHERE `habitaciones`.`numero` =:habitacion ;");

     $stmt2->bindParam(':habitacion', $habitacion);

  $stmt2->execute();

// Verificar si todos los campos necesarios están presentes
if ($habitacion && $ingreso && $egreso && $nombre && $apellido && $mail  ) {
    try {
        // Preparar la consulta SQL con parámetros nombrados
        $stmt = $conexion->prepare("INSERT INTO reservas (fechaEntrada, fechaSalida, nombreHuesped, numero,apellido,mail) 
                                    VALUES (:ingreso, :egreso, :nombre, :habitacion,:apellido,:mail)");
        
        // Vincular los parámetros
        $stmt->bindParam(':ingreso', $ingreso);
        $stmt->bindParam(':egreso', $egreso);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':habitacion', $habitacion);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':mail', $mail);
        
        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir al usuario a la página de inicio después de la inserción exitosa
        header("Location: index.php");
        exit(); // Asegura que no se ejecute más código después de la redirección

    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
    }
} else {
    // En caso de que falten campos obligatorios, mostrar un mensaje de error o manejar de otra manera
    echo "Error: Todos los campos son obligatorios.";
}
?>
