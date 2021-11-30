<?php

include("../conexion.php");

$sql = "SELECT c.id_ciudad,p.nom_pais, c.nom_ciudad
        FROM ciudad AS c 
        INNER JOIN pais AS p ON c.id_pais=p.id_pais;";

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
    <title>REPORTE DE CIUDADES</title>
</head>
    <body>
        <table class="table table-bordered" id=tabla>
            <thead>
                <tr>
                    <th>ID CIUDA<D/th>
                    <th>PAIS</th>
                    <th>CIUDAD</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $fila) { ?>
                    <tr>
                        <td><?php echo utf8_encode($fila['id_ciudad']) ?> </td>
                        <td><?php echo utf8_encode($fila['id_pais']) ?> </td>
                        <td><?php echo utf8_encode($fila['nom_ciudad']) ?> </td>
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

    $dompdf->stream("Reporte_Ciudades.pdf", array("Attachment" => false));

?>
