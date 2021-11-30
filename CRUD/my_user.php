<?php

session_start();
if (isset($_SESSION['user_rol'])) {
} else {
    header('Location: ../404.html');
}

$id = $_SESSION['user_id'];

require './database.php';
if ($_SESSION['user_rol'] == 1) {
    $sql = "SELECT * FROM cliente WHERE id_cliente=$id";
} else {
    $sql = "SELECT * FROM empleado WHERE id_empleado=$id";
}


$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}
//roles
$sql = "SELECT * FROM rol
     ORDER BY id_rol";
$result_rol = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$rol = array();
while ($fila = $result_rol->fetch_assoc()) {
    $rol[] = $fila;
}

//sedes
$sql = "SELECT * FROM sede
     ORDER BY nom_sede";
$result_sede = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$sede = array();
while ($fila = $result_sede->fetch_assoc()) {
    $sede[] = $fila;
}

$conexion->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Healthy Citizen</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.html">Healthy Citizen</a>
        <!--<a class="navbar-brand ps-3" href="miembros.html">miembros</a>-->
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!--Botones Login y SingUp-->
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0" id="UnloggedIcon">
            <div class="px-xxl-0 d-inline-block bg-info p-3 mb-2 bg-transparent text-dark">
                <a href="../ViewLogin.php" class="btn btn-dark">Log in</a>
                <a href="../register.html" class="btn btn-dark">Sign up</a>
            </div>
        </ul>
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0" id="LoggedIcon">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <p class="dropdown-item" id="MyUserName"></p>
                    </li>
                    <li>
                        <p class="dropdown-item" id="MyUserRol"></p>
                    </li>
                    <li><a class="dropdown-item" href="./my_user.php" id="UpdateMyUser">My User</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" id="LogoutButton" href="">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main</div>
                        <a class="nav-link" href="../index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <div class="sb-sidenav-menu-heading">Information</div>

                        <!--Sobre nosotros nav collapsed button-->
                        <a class="nav-link" href="../aboutus.html">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-heart">
                                </i>
                            </div>
                            About us
                        </a>
                        <!--Pages btn 2 en la lista-->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                            Developement
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <!--Herramientas-->
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                    Used Tools
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="https://trello.com/b/7dudAdSS/team-haba">Trello</a>
                                        <a class="nav-link" href="https://github.com/Alemax12/HABBA-TEAM">GitHub</a>
                                    </nav>
                                </div>

                                <!--Integrantes-->
                                <a class="nav-link" href="../members.html">
                                    <div class="sb-nav-link-icon">
                                        <i class="fas fa-user-friends">
                                        </i>
                                    </div>
                                    Members
                                </a>

                                <!--Registros-->
                                <a class="nav-link" id="TablesLeft" href="./CRUD/registros.php">
                                    <div class="sb-nav-link-icon">
                                    <i class="fas fa-bars">    
                                    </i>
                                    </div>
                                    Tables
                                </a>

                                <!--Clientes-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                    echo '
<a class="nav-link" href="./cliente.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Client
</a>
';
                                } ?>

                                <!--Clientes-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 8) {
                                    echo '
<a class="nav-link" href="./cliente_d.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Client AC
</a>';
                                } ?>

                                <!--Empleados-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                    echo '
<a class="nav-link" href="./empleado.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Employee
</a>
';
                                } ?>

                                <!--Empleados-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./empleado_d.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Employee DS
</a>';
                                } ?>

                                <!--Roles-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                    echo '
<a class="nav-link" href="./rol.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Role
</a>
';
                                } ?>

                                <!--País-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                    echo '
<a class="nav-link" href="./pais.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Country
</a>
';
                                } ?>

                                <!--Ciudad-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                    echo '
<a class="nav-link" href="./ciudad.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    City
</a>
';
                                } ?>

                                <!--Sede-->
                                <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 3)) {
                                    echo '
<a class="nav-link" href="./sede.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Headquarters
</a>
';
                                } ?>

                                <!--Inventario-->
                                <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 9)) {
                                    echo '
<a class="nav-link" href="./inventario.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Products to buy
</a>
';
                                } ?>

                                <!--Insumos-->
                                <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 10)) {
                                    echo '
<a class="nav-link" href="./insumos.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Supplies
</a>
';
                                } ?>

                                <!--Materia Prima-->
                                <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 9)) {
                                    echo '
<a class="nav-link" href="./materia.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Raw Material
</a>
';
                                } ?>

                                <!--Procedimiento-->
                                <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 10)) {
                                    echo '
<a class="nav-link" href="./procedimiento.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Procedures
</a>
';
                                } ?>

                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div id="layoutSidenav_content">

            <!--Carousel-->

            <style>
                .carousel-item {
                    height: 10rem;
                    background: rgb(206, 203, 203);
                    position: relative;
                }

                .contenedor {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    padding-bottom: 10px;
                    padding-left: 50px;
                }

                .btnOpt2 {
                    padding-left: 50px;
                }
            </style>

            <div class="--Carousel--">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1>Clients</h1>
                            </div>
                            <div class="col-6 col-md-4"><img src="../imgC/logo.png" class="rounded" width="200"></div>
                        </div>
                    </div>


                    <br>
                    <div class="card">
                        <div class="card-header text-white bg-dark">
                            Information
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-secondary" id="EditMyUser">Edit</button>
                        </div>

                        <div class="card-body">
                            <div id="div-cliente">
                                <form class="row g-3" role="form" id="form-cliente">

                                    <div class="form-group col-3 div_id">
                                        <label>Client ID:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="id" id="inputID" disabled placeholder="Enter Number" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Name:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="name" id="inputName" disabled placeholder="Enter Name" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client's Date of Birth:</label>
                                        <input autocomplete="off" type="date" class="form-control" name="fec_nac" id="inputFecNac" disabled placeholder="Enter Date of Birth" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Cell Phone:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="cel" id="inputCel" disabled placeholder="Enter the Cell Phone Number" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Email:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="email" id="inputEmail" disabled placeholder="Enter Email" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Weigth:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="peso" id="inputPeso" disabled placeholder="Enter Weight" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Height:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="est" id="inputEst" disabled placeholder="Enter Height" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Address:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="dir" id="inputDir" disabled placeholder="Enter Address" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Client Password:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="contra" id="inputContra" disabled placeholder="Enter Password" value="">
                                    </div>

                                </form>
                                <div>
                                    <br>
                                    <button type="button" id="save-cliente" class="btn btn-secondary" data-tag="">Save</button>
                                    <button type="button" id="cancel-cliente" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                            <div id="div-emp">
                                <form class="row g-3" role="form" id="form-emp">

                                    <div class="form-group col-3 div_id">
                                        <label>Employee ID:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="id" id="inputID_E" disabled placeholder="Enter Number" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Name:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="name" id="inputName_E" disabled placeholder="Enter Name" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee's Date of Birth:</label>
                                        <input autocomplete="off" type="date" class="form-control" name="fec_nac" id="inputFecNac_E" disabled placeholder="Enter Date of Birth" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Email:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="email" id="inputEmail_E" disabled placeholder="Enter Email" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Cell Phone:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="cel" id="inputCel_E" disabled placeholder="Enter the Cell Phone Number" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Weigth:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="peso" id="inputPeso_E" disabled placeholder="Enter Weight" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Height:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="est" id="inputEst_E" disabled placeholder="Enter Height" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Address:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="dir" id="inputDir_E" disabled placeholder="Enter Address" value="">
                                    </div>
                                    <div class="form-group col-3">
                                        <label>Employee Password:</label>
                                        <input autocomplete="off" type="text" class="form-control" name="contra" id="inputContra_E" disabled placeholder="Enter Password" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Roles:</label>
                                        <select class="form-control" name="rol" id="inputRol_E" disabled>
                                            <option value="0">Select:</option>
                                            <?php foreach ($rol as $fila) { ?>
                                                <option value="<?php echo $fila['id_rol'] ?>"> <?php echo utf8_decode($fila['nom_rol']) ?> </option>;
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Headquarters:</label>
                                        <select class="form-control" name="sede" id="inputSede_E" disabled>
                                            <option value="0">Select:</option>
                                            <?php foreach ($sede as $fila) { ?>
                                                <option value="<?php echo $fila['id_sede'] ?>"> <?php echo utf8_decode($fila['nom_sede']) ?> </option>;
                                            <?php } ?>
                                        </select>
                                    </div>

                                </form>
                                <div>
                                    <br>
                                    <button type="button" id="save-emp" class="btn btn-secondary" data-tag="">Save</button>
                                    <button type="button" id="cancel-emp" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>
                            <br><br>

                        </div>
                    </div>
                </div>
                <!--INICIO-->


            </div>
            <!--FIN-->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/chart-area-demo.js"></script>
    <script src="../assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../js/funcionesCliente.js"></script>
    <script type="text/javascript">
        $(document).ready(operaciones)
    </script>

    <script type="text/javascript" src="../js/opps.js"></script>
    <script type="text/javascript">
        $(document).ready(Logged1)
    </script>


</body>

</html>