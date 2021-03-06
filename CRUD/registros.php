<?php

session_start();
if (isset($_SESSION['user_rol'])) {
    if ($_SESSION['user_rol'] ==1) {
        header('Location: ../404.html');
    }
} else {
    header('Location: ../404.html');
}

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
        <!--SIDENAVBAR-->
        <div id="layoutSidenav_content">
            <!--MAIN-->
            <main>
                <div class="container-fluid px-4">
                    <div class="jumbotron">
                        <h1 class="display-4">Admin Options</h1>
                        <!--No tocar-->
                        <br>

                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <!--***GRUPO #1***-->
                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                echo '
                            <a class="btn">
                                <a href="./cliente.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/paciente.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Client</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 8) {
                                echo
                                '
                            <a class="btn">
                                <a href="./cliente_d.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/paciente.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Client AC</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                echo '
                            <a class="btn">
                                <a href="./empleado.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/medico.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Employee</p>
                                    </div>
                                </a>
                            </a>
                            ';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                echo
                                '
                            <a class="btn">
                                <a href="./empleado_d.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/medico.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Employee DS</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                echo '
                            <a class="btn">
                                <a href="./rol.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/roles.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Role</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>
                        </div>

                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <!--***GRUPO #2***-->
                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                echo '
                            <a class="btn">
                                <a href="./pais.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/pais.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Country</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2) {
                                echo '
                            <a class="btn">
                                <a href="./ciudad.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/ciudad.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">City</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 3)) {
                                echo '
                            <a class="btn">
                                <a href="./sede.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/sede.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Headquarters</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 9)) {
                                echo '
                            <a class="btn">
                                <a href="./inventario.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/inventario.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Products to buy</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>
                        </div>

                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <!--***GRUPO #3***-->

                            <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 10)) {
                                echo '
                            <a class="btn">
                                <a href="./insumos.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/insumo.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Supplies</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 9)) {
                                echo '
                            <a class="btn">
                                <a href="./materia.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/procedimiento.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Raw Material</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>

                            <?php if (isset($_SESSION['user_rol']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 10)) {
                                echo '
                            <a class="btn">
                                <a href="./procedimiento.php" class="btn btn-outline-secondary" role="button" style="width: 10rem;">
                                    <img class="card-img-top" src="../imgC/procedimiento.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Procedures</p>
                                    </div>
                                </a>
                            </a>';
                            } ?>
                        </div>

                    </div>
                    <!--No tocar-->
                </div>


            </main>
            <!--FOOTER-->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Healthy Citizen 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" src="../js/opps.js"></script>
    <script type="text/javascript">
        $(document).ready(Logged1)
    </script>
</body>

</html>