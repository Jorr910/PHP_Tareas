<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="Assets/css/style.css">
</head>
<body>

    <div class="container_login">


        <h1>Inicio de Sesión</h1>
        <form action="./index.php?action=login" method="POST">
            <label for="username">Nombre de Usuario</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="./index.php?action=register">Registrate aquí</a>.</p>
    
    </div>
    
</body>
</html>