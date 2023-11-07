<?php
setcookie('nombre', $_POST['nombre'], 0, '/');
setcookie('dni', $_POST['dniCliente'], 0, '/');
header("location:principal.php");