<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: ../index.html');
}
require 'database.php';
$tipoid = '';
$tiponom = '';
$query = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  if ($_POST['options'] == 'Cliente') {
    $tipoid = 'id_cliente';
    $tiponom = 'nom_cliente';
    $query = 'SELECT * FROM cliente AS c INNER JOIN rol AS r ON (c.id_rol = r.id_rol) WHERE email = :email';
  } else {
    $tipoid = 'id_empleado';
    $tiponom = 'nom_empleado';
    $query = 'SELECT * FROM empleado AS e INNER JOIN rol AS r ON (e.id_rol = r.id_rol) WHERE email = :email';
  }
  $records = $conn->prepare($query);
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  try {
    if (isset($results) > 0 && $_POST['password'] == $results['contraseña']) {
      $_SESSION['user_rol'] = $results['id_rol'];
      $_SESSION['user_id'] = $results[$tipoid];
      $_SESSION['user_name'] = $results[$tiponom];
      $_SESSION['user_rol_t'] = $results['nom_rol'];
      header("Location: ../");
    } else {
      header("Location: ../ViewLogin.php?ress=1");
    }
  } catch (PDOException $e) {
    header("Location: ../ViewLogin.php?ress=1");
  }
}
