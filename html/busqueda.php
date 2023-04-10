<?php
session_start();
if (isset($_SESSION)) {
    if (!isset($_SESSION['username'])){
        header("Location: ./login.php");
    }
} else {
    header("Location ./login.php");
}
?>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Buscar</title>
    <link rel="icon" type="image/x-icon" href="../img/resources/favicon.ico">

    <style>
        #chat4 .form-control {
            border-color: transparent;
        }

        #chat4 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .fondo-bonico {
            background-color: #262522;
            margin: 0 10% 0 10%;
            opacity: 0.98;
        }

        main {
            opacity: 1;
        }

        body {
            background-image: url("../img/resources/john-matychuk-gUK3lA3K7Yo-unsplash.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .content-input input,
        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .content-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .content-select select::-ms-expand {
            display: none;
        }

        .content-select {
            max-width: 250px;
            position: relative;
        }

        .content-select select {
            display: inline-block;
            width: 100%;
            cursor: pointer;
            padding: 7px 10px;
            height: 42px;
            outline: 0;
            border: 0;
            border-radius: 0;
            background: #262522;
            color: #7b7b7b;
            font-size: 1em;
            color: #999;
            font-family:
                'Quicksand', sans-serif;
            border: 2px solid rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            position: relative;
            transition: all 0.25s ease;
        }

        .content-select i {
            position: absolute;
            right: 20px;
            top: calc(50% - 13px);
            width: 16px;
            height: 16px;
            display: block;
            border-left: 4px solid #2AC176;
            border-bottom: 4px solid #2AC176;
            transform: rotate(-45deg);
            transition: all 0.25s ease;
        }

        .content-select:hover i {
            margin-top: 3px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-xl navbar-fixed-top navigation-clean-button" style="background-color:#F2F2F2;border-radius: 20;border-top-left-radius: 20; padding-top: 20px; padding-bottom: 10px;">
        <div class="container"><button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div style="font-weight: bold;"><a class="navbar-brand" href="#"><span style="font-size: larger">Musigente</span></a></div>
            <div id="navcol-2" class="collapse navbar-collapse" style="color: rgb(255,255,255); justify-content: space-between">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="./Principal.php">Home </a></li>
                    <li class="nav-item"><a class="nav-link active" href="./busqueda.php">Buscar</a></li>
                    <li><a class="nav-link" href="./faq.php">FAQ</a></li>
                    <li><a class="nav-link" href="./Contact.php">Contact </a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" action="./busqueda.php">
                            <div class="input-group mb-3">
                                <input type="text" id="valor" name="valor" class="form-control rounded mx-sm-1" placeholder="Buscar...">
                                <div class="content-select mx-sm-2">
                                    <select id="campo" name="campo">
                                        <option value="Nickname">Nombre de usuario</option>
                                        <option value="email">Email</option>
                                        <option value="Nombre">Nombre</option>
                                        <option value="Apellido1">Apellido1</option>
                                        <option value="Apellido2">Apellido2</option>
                                        <option value="Instrumento">Instrumento</option>
                                        <option value="Genero">Género Musical</option>
                                        <option value="Anos de experiencia">Años de experiencia mínimos</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary my-2 my-sm-0 rounded" type="submit">Search</button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <div class="d-flex fondo-bonico">
        <aside class="col-md-1 col-lg-3" style="height: 50%; background-color: #815448; border-radius: 0 10px 10px 0;">
            <nav class="navbar navbar-light navbar-expand-md d-flex d-xl-flex flex-column flex-grow-0 justify-content-start justify-content-xl-start align-items-xl-start">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-column">
                        <div id="navcol-3" class="collapse navbar-collapse " style="color: black">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <p class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <?php
                                        require("../php/conexion.php");

                                        $consulta = "SELECT ImagenDePerfil FROM usuario WHERE Nickname = '" . $_SESSION['username'] . "'";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        $fila = mysqli_fetch_array($resultado);
                                        $imagen = $fila['ImagenDePerfil'];
                                        echo "<img class='img img-responsive rounded-circle' src='../img/usuarios/$imagen' alt='Imagen de perfil' style='width: 70px; height: 70px; margin-right: 20px; background-color: white'>";
                                        echo "<p class='fs-5 fw-bold' style='color: #262522'>" . $_SESSION['username'] . "</p>";
                                        ?>
                                    </div>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <!--<li class="nav-item"><a class="nav-link" href="./Chat/chat.php">Chat</a></li>-->
                        <?php
                        echo "<li class='nav-item'><a class='nav-link' href='./perfil.php?profile=" . $_SESSION['username'] . "''>Perfil</a></li>"
                        ?>
                        <li class="nav-item"><a class="nav-link" href="./EditarPerfil.php">EditarPerfil</a></li>
                        <hr>
                        <li class="nav-item"><a class="nav-link" href="../php/LogOut.php">Logout</a></li>
                    </ul>
                    <div id="navcol-1" class="collapse navbar-collapse d-flex d-xl-flex flex-column flex-grow-0 align-items-xl-start">
                    </div>
                </div>
            </nav>
        </aside>
        <main style="width: 60%;">
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="border rounded border-0 p-4" style="background-color: #F2F2F2">
                        <h3 class="fw-bold mb-3">Búsqueda</h3>
                        <form action="./busqueda.php" class="panel-activity__status" method="get">
                            <input type="text" name="valor" class="form-control rounded mx-sm-1" placeholder="Buscar..." maxlength="60"><br>
                            <div class="content-select mx-sm-2">
                                <select id="campo" name="campo">
                                    <option value="Nickname">Nombre de usuario</option>
                                    <option value="email">Email</option>
                                    <option value="Nombre">Nombre</option>
                                    <option value="Apellido1">Apellido1</option>
                                    <option value="Apellido2">Apellido2</option>
                                    <option value="Instrumento">Instrumento</option>
                                    <option value="Genero">Género Musical</option>
                                    <option value="Anos de experiencia">Años de experiencia mínimos</option>
                                </select>
                            </div>
                            <hr>
                            <div class="actions">
                                <div class="btn-group"><button class="btn btn-primary" type="submit">Enviar</button>
                                </div>
                                <button class="btn btn-primary" type="reset">Reset</button>
                            </div>
                    </div>
                </div>
            </section>
            <section>
                <ul class="list-group">
                    <?php
                    if (isset($_SESSION)) {
                        if (isset($_SESSION['username'])) {
                            $nombreUsuario = $_SESSION['username'];
                            require("../php/conexion.php");

                            if (isset($_GET['campo']) and isset($_GET['valor'])) {
                                $campo = $_GET['campo'];
                                $valor = $_GET['valor'];
                                if ($campo != "Años de experiencia") {
                                    $consulta = "SELECT `ID`, `Nickname`, `Descripcion`, `email`, `Nombre`, `Instrumento`,
                                    `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, `Anos de experiencia`, `IdDomicilio`, `ImagenDePerfil` 
                                    FROM `usuario` WHERE `$campo` LIKE '%$valor%'";
                                } else {
                                    if ($valor == null) {
                                        $valor = 0;
                                    } else {
                                        $valor = intval($valor);
                                    }
                                    $consulta = "SELECT `ID`, `Nickname`, `Descripcion`, `email`, `Nombre`,
                                    `Instrumento`, `Apellido1`, `Apellido2`, `GeneroP`, `Genero`, `Anos de experiencia`, `IdDomicilio`, `ImagenDePerfil`
                                    FROM `usuario` WHERE `$campo` >= '$valor'";
                                }
                                if ($resultado = mysqli_query($conexion, $consulta)) {
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        echo "<li class='list-group-item link-group' style='background-color: #F2F2F2'>";
                                        echo "<div class='media'>";
                                        echo "<img src='../img/usuarios/$fila[ImagenDePerfil]' class='rounded-circle mr-2 float-start' 
                                        width='75' height='75' alt='...' style='margin: 10px; background-color: white'>";
                                        echo "<div class='media-body'>";
                                        echo "<h5 class='mt-0 mb-1'>";
                                        echo "Nickname:<br><a href='perfil.php?profile=" . $fila['Nickname'] . "'>" . $fila['Nickname'] . "</a>";
                                        echo "</h5>";
                                        echo "<p>";
                                        echo "Nombre " . $fila['Nombre'] . "<br>";
                                        echo "Primer apellido: " . $fila['Apellido1'] . "<br>";
                                        if ($fila['Apellido2'] != null) {
                                            echo "Segundo apellido: " . $fila['Apellido2'] . "<br>";
                                        }
                                        echo "</p>";
                                        echo "<p>";
                                        echo "Instrumento: " . $fila['Instrumento'];
                                        echo "</p>";
                                        echo "<p>";
                                        echo "Género Musical: " . $fila['Genero'];
                                        echo "</p>";
                                        echo "<p>";
                                        echo "Años de experiencia: " . $fila['Anos de experiencia'];
                                        echo "</p>";
                                        if ($fila['Descripcion'] != null) {
                                            echo "<p>";
                                            echo "Descripción: " . $fila['Descripcion'];
                                            echo "</p>";
                                        }
                                        echo "<a href='perfil.php?profile=" . $fila['Nickname'] . "' class='btn btn-primary'>Ver perfil</a>";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "</li>";
                                    }
                                }
                            }
                        }
                    }
                    ?>
                </ul>
            </section>
        </main>
    </div>
    <a href=" # "></a>
</body>

</html>