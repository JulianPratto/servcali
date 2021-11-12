<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_cliente, email, contraseña FROM cliente WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && $_POST['password']==$results['contraseña']) {
      $_SESSION['user_id'] = $results['id'];
      $message = 'yes';
      header("Location: /php-login");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }
  echo $_POST['password'];
echo $results['contraseña'];
?>
