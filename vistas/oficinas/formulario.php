<?php
$id = isset($datos['id'])?$datos['id']:'';
$nombre = isset($datos['nombre'])?$datos['nombre']:'';
$esNuevo = isset($datos['id'])?0:1;
$titulo = $esNuevo==1?'Nuevo Oficinas':'Editando Oficinas';
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
    <form action="?ctrl=CtrlOficinas&accion=guardar" method="post">
        id:
        <input type="text" name="id" value="<?=$id?>">
        <input type="hidden" name="esNuevo" value="<?=$esNuevo?>">
        <br>
        Oficina:
        <input type="text" name="nombre" value="<?=$nombre?>">
        <br>
        <input type="submit" value="Guardar">

    </form>

    <a href="?ctrl=CtrlOficinas">Retornar</a>
</body>
</html>