<?php

session_start();
if (isset($_SESSION['user_rol'])) {
    if ($_SESSION['user_rol'] != 2) {
        header('Location: ../404.html');
    }
} else {
    header('Location: ../404.html');
}

require './database.php';
$var = "selected";
$sql = "SELECT * FROM insumo AS i  
        INNER JOIN procedimiento AS p ON (i.id_procedimiento = p.id_procedimiento)
        INNER JOIN materiaprima AS m ON (i.id_materiaprima = m.id_materiaprima)
        ORDER BY id_insumo";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}

//procedimiento
$sql = "SELECT * FROM procedimiento
     ORDER BY id_procedimiento";
$result_pos = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$pos = array();
while ($fila1 = $result_pos->fetch_assoc()) {
    $pos[] = $fila1;
}

//materia prima
$sql = "SELECT * FROM materiaprima
     ORDER BY id_materiaprima";
$result_mat = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$mat = array();
while ($fila2 = $result_mat->fetch_assoc()) {
    $mat[] = $fila2;
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
                    <li><p class="dropdown-item" id="MyUserName"></p></li>
                    <li><p class="dropdown-item" id="MyUserRol"></p></li>
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

                                <!--Pa??s-->
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
                                <h1>Supplies</h1>
                            </div>
                            <div class="col-6 col-md-4"><img src="../imgC/logo.png" class="rounded" width="200"></div>
                        </div>
                    </div>


                    <br>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-secondary" id="nuevo">New</button>
                            <div id="formulario">
                                <form class="row g-3" role="form" id="form1">

                                    <div class="form-group col-3 div_id">
                                        <label>Supplies ID:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="id" id="inputID" placeholder="Enter ID" value="">
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Procedures:</label>
                                        <select class="form-control" name="pos" id="inputPos">
                                            <option value="0">Select:</option>
                                            <?php foreach ($pos as $fila) { ?>
                                                <option value="<?php echo $fila['id_procedimiento'] ?>"> <?php echo utf8_decode($fila['id_procedimiento']) ?> </option>;
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Raw Material:</label>
                                        <select class="form-control" name="mat" id="inputMat">
                                            <option value="0">Select:</option>
                                            <?php foreach ($mat as $fila) { ?>
                                                <option value="<?php echo $fila['id_materiaprima'] ?>"> <?php echo utf8_decode($fila['descripcion']) ?> </option>;
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-3">
                                        <label>Quantity of Inputs:</label>
                                        <input autocomplete="off" type="number" class="form-control" name="can" id="inputCan" placeholder="Enter quantity of inputs" value="">
                                    </div>

                                </form>
                                <div>
                                    <br>
                                    <button type="button" id="save" class="btn btn-secondary" data-tag="">Save</button>
                                    <button type="button" id="cancel" class="btn btn-secondary">Cancel</button>
                                </div>
                            </div>

                            <br><br>

                            <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Supplies ID</th>
                                        <th>Description Procedure</th>
                                        <th>Raw Material</th>
                                        <th>Quantity of Inputs</th>

                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php foreach ($listado as $fila) { ?>
                                            <td><?php echo utf8_decode($fila['id_insumo']) ?> </td>
                                            <td><?php echo utf8_decode($fila['tipo']) ?> </td>
                                            <td><?php echo utf8_decode($fila['descripcion']) ?> </td>
                                            <td><?php echo utf8_decode($fila['cantidad_insumos']) ?> </td>

                                            <td>
                                                <button class="btn btn-success btn-sm edit" data-id="<?php echo $fila['id_insumo'] ?>">
                                                    <i class="fas fa-pen" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-danger btn-sm delete" data-id="<?php echo $fila['id_insumo'] ?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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
    <script>
        $(document).ready(function() {
            $("#tabla").DataTable();
        });
    </script>
    <script type="text/javascript" src="../js/funcionesInsumos.js"></script>
    <script type="text/javascript">
        $(document).ready(operaciones)
    </script>

    <script type="text/javascript" src="../js/opps.js"></script>
    <script type="text/javascript">
        $(document).ready(Logged1)
    </script>

</body>

</html>