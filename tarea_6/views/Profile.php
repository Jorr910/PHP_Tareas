<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="Assets/css/profile.css">
</head>
<body>

    <section class="container_perfil">

    <h1>Perfil del Usuario</h1>

    <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>


    <a href="./index.php?action=logout">Cerrar Sesión</a>

    

    </section>

<?php

    if (!isset($_SESSION['user_id'])) {

    header("Location: index.php?action=login");

    exit;

    }

// Obtener interes 

$userAlojamientos = $userController->getUserAlojamientos($_SESSION['user_id']);

// Obtener todos los alojamientos

$alojamientos = $userController->getAllAlojamientos();
?>


<h2>Alojamientos de interés</h2>
<div class="alojamientos">
    <?php if (empty($userAlojamientos)): ?>

        <p>No tienes alojamientos de interés.</p>

    <?php else: ?>

    <!--Imprimir las tarjetas llamadas de la BD-->

        <?php foreach ($userAlojamientos as $a): ?>

    <div class="alojamiento">
        <h3><?= htmlspecialchars($a['nombre']) ?></h3>
        <p><?= htmlspecialchars($a['descripcion']) ?></p>
        <img src="<?= htmlspecialchars("Assets/img/{$a['imagen']}") ?>" alt="Imagen del alojamiento">

    <!--Lo eliminamos de nuestro perfil-->

        <form action="index.php?action=remove_interest" method="POST" style="display: inline;">

            <input type="hidden" name="alojamiento_id" value="<?= htmlspecialchars($a['id']) ?>">

            <button type="submit">Eliminar</button>
        </form>
    </div>
<?php endforeach; ?>

    <?php endif; ?>
</div>

<!--Buscador de alojamientos BD-->

<h3>Agregar alojamiento de interés</h3>

<form action="index.php?action=add_interest" method="POST">

    <select name="alojamiento_id">


        <?php foreach ($alojamientos as $a): ?>
            <option value="<?= $a['id'] ?>"><?= htmlspecialchars($a['nombre']) ?></option>
        <?php endforeach; ?>
        
    </select>
    <button type="submit">Agregar</button>
</form>


    
   
</body>
</html>

