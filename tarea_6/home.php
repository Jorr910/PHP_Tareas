<?php
require_once 'config/database.php';

$db = new DataBase();
$pdo = $db->getConnection();

try {
    $stmt = $pdo->query("SELECT * FROM cat_alojamientos");
    $alojamientos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los alojamientos: " . $e->getMessage();
    $alojamientos = [];
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="Assets/css/home.css">
</head>

<body>
    <div class="header-actions">
       
        <?php if (isset($_SESSION['user_id'])): ?>

            <!-- Sesión iniciada -->

            <form action="index.php?action=add_interest" method="POST">
            <input type="hidden" name="alojamiento_id" value="<?= $a['id'] ?>">
            <button type="submit" class="btn interes-btn">Perfil</button>
   
        </form>

            <a href="index.php?action=logout"><button class="btn logout-btn">Cerrar sesión</button></a>
            
        <?php else: ?>

            <!-- Generales -->

            <a href="index.php?action=login"><button class="btn login-btn">Iniciar sesión</button></a>
            <a href="index.php?action=register"><button class="btn register-btn">Registrarse</button></a>
        <?php endif; ?>
    </div>

    <h1>Alojamientos disponibles:</h1>
    <div class="alojamientos">
        <?php if (empty($alojamientos)): ?>
            <p>No hay alojamientos disponibles en este momento.</p>
        <?php else: ?>
            <?php foreach ($alojamientos as $a): ?>
                <div class="alojamiento">
                    <h2><?= htmlspecialchars($a['nombre']) ?></h2>
                    <p><?= htmlspecialchars($a['descripcion']) ?></p>
                    <img src="<?= htmlspecialchars("Assets/img/{$a['imagen']}") ?>" alt="Imagen del alojamiento">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>
