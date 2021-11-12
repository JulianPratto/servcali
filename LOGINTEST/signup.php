<?php

  require 'database.php';
  $message = '';
echo $_POST['email'];
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO cliente (email, contraseña,id_rol) VALUES (:email, :password,1)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header("Location: ../");
    } else {
      $message = 'Sorry there must have been an issue creating your account';
      header("Location: ../");
    }
  }