<?php
$id = isset($datos['id'])?$datos['id']:'';
$nombre = isset($datos['nombre'])?$datos['nombre']:'';
$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Marcas Equipos':'Marcas Equipos';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?=$titulo?></h1>
    <form action="?ctrl=CtrlMarcas_eq&accion=guardar" method="post">
        id:
        <input type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Marcas Equipos:
        <input type="text" name="nombre" value="<?=$nombre?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlMarcas_eq">Retornar</a>
</body>
</html>