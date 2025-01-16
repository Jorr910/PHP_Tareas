
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>

    <div class="container_login">
    
    <h1>Registro</h1>

    <form action="./index.php?action=register" method="POST">

        <label for="username">Nombre de Usuario</label>

        <input type="text" name="username" id="username" required>
        
        <label for="password">Contraseña</label>

        <input type="password" name="password" id="password" required>
        
        <button type="submit">Registrarse</button>
    </form>
    
    <p>¿Ya tienes una cuenta?  <a href="./index.php?action=login">Inicia sesión aquí</a>.</p>

    </div>


</body>
</html>