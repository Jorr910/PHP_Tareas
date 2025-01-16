<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="Assets/css/admin.css">
</head>
<body>

    <section class="container_perfil">


        <h1>Panel de Administración</h1>
        <p>Bienvenido al panel de administración, <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
        <a href="./index.php?action=logout">Saliendo de la sesión</a>


    </section>

    <h3>Agregar nuevo alojamiento</h3>

    <form action="index.php?action=add_alojamiento" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        
        <label>Nombre de la Imagen:</label>
        <input type="text" name="imagen" placeholder="Ejemplo: 0005.jpg" required>
        
        <button type="submit">Agregar</button>
    </form>



    
</body>
</html>