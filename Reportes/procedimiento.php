<?php

include("../conexion.php");

$sql = "SELECT p.id_procedimiento,e.nom_empleado, c.nom_cliente,p.tipo,p.descripcion 
        FROM procedimiento AS p 
        INNER JOIN empleado AS e ON e.id_empleado=p.id_empleado
        INNER JOIN cliente AS c ON c.id_cliente=p.id_cliente;";

$resultado = $conexion->query($sql)
	or die(mysqli_errno($this->conexion) . " : "
		. mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
	$listado[] = $fila;
}

$conexion->close();
?>

    <?php
    ob_start();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
     integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" 
     crossorigin="anonymous">
    <title>REPORTE DE PROCEDIMIENTOS</title>
</head>
    <body>
        <table class="table table-bordered" id=tabla>
            <thead>
                <tr>
                    <th>ID PROCEDIMINETO</th>
                    <th>EMPLEADO</th>
                    <th>CLIENTE</th>
                    <th>PROCEDIMIENTO</th>
                    <th>DESCRIPCION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $fila) { ?>
                    <tr>
                        <td><?php echo utf8_encode($fila['id_procedimiento']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_empleado']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_cliente']) ?> </td>
                        <td><?php echo utf8_encode($fila['tipo']) ?> </td>
                        <td><?php echo utf8_encode($fila['descripcion']) ?> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>

<?php
    $html=ob_get_clean();
    //echo $html;

    require_once '../library/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf =new Dompdf();

    $options =$dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=> true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    //$dompdf->setPaper('letter');
    $dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream("Reporte_Procedimientos.pdf", array("Attachment" => false));

?>
