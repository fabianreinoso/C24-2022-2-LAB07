<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $apellido_paterno = $_POST['txtApPaterno'];
    $apellido_materno = $_POST['txtApMaterno'];
    $fecha_nacimiento = $_POST['txtFechaNacimiento'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE persona SET nombres = ?, apellido_paterno = ?, apellido_materno = ?,fecha_nacimiento = ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellido_paterno, $apellido_materno, $fecha_nacimiento, $celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
