<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once './config/database.php';
require_once './controller/UserController.php';
require_once './config/constans.php';

// Inicializar el controlador de usuario
$userController = new UserController();

// Determinar la acción solicitada
$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        include './home.php'; // Vista general de la página web
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($userController->register($username, $password)) {
                header("Location: " . BASE_URL . "index.php?action=login");
                exit;
            } else {

                $var = "Error de registro.";
                echo "<script> alert('".$var."'); </script>";
            }
        }
        include './views/Register.php';
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $userController->login($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                if ($user['role'] === 'admin') {
                    header("Location: " . BASE_URL . "index.php?action=admin");
                } else {
                    header("Location: " . BASE_URL . "index.php?action=home");
                }
                exit;
            } else {

                $var = "Usuario o contraseña incorrecto";
                echo "<script> alert('".$var."'); </script>";

            }
        }
        include './views/Login.php';
        break;

    case 'profile':
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "index.php?action=login");
            exit;
        }
        include './views/Profile.php';
        break;

    case 'admin':
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            header("Location: " . BASE_URL . "index.php?action=login");
            exit;
        }
        include './views/Admin.php';
        break;

    case 'add_interest':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $alojamientoId = $_POST['alojamiento_id'] ?? null;
       
               if (!isset($_SESSION['user_id']) || !$alojamientoId) {
                  header("Location: index.php?action=login");   
                   exit;
                }
        
                try {
                    $db = new DataBase();
                    $pdo = $db->getConnection();
        
                    $stmt = $pdo->prepare("INSERT INTO user_alojamientos (user_id, alojamiento_id) VALUES (?, ?)");
                    $stmt->execute([$_SESSION['user_id'], $alojamientoId]);
        
                    echo "<script>alert('Alojamiento agregado a tus intereses.');</script>";
                } catch (PDOException $e) {
                    echo "<script>alert('Error al agregar el interés: {$e->getMessage()}');</script>";
                }
            }
            include './views/Profile.php';
            break;
        

        case 'add_alojamiento':
           if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = $_POST['nombre'] ?? '';
                $descripcion = $_POST['descripcion'] ?? '';
                $imagen = $_POST['imagen'] ?? '';
    
                // Validar que el archivo exista en el directorio
                $rutaImagen = "Assets/img/" . $imagen;
                if (!file_exists($rutaImagen)) {
                    echo "<script>alert('La imagen especificada no existe en la carpeta Assets/img/.');</script>";
               include './views/Admin.php';
               break;
               }

            
               try {
                        // Conexión a la base de datos
                $db = new DataBase();
                $pdo = $db->getConnection();
            
                 // Insertar datos en la base de datos

                $stmt = $pdo->prepare("INSERT INTO cat_alojamientos (nombre, descripcion, imagen) VALUES (?, ?, ?)");
                $stmt->execute([$nombre, $descripcion, $imagen]);
            
                 echo "<script>alert('Alojamiento agregado correctamente.');</script>";
            
                  } catch (PDOException $e) {
                      echo "<script>alert('Error al agregar el alojamiento: {$e->getMessage()}');</script>";
                  }
                }

                include './views/Admin.php';
                break;
                

        case 'remove_interest':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                $alojamientoId = $_POST['alojamiento_id'] ?? null;
                if (!isset($_SESSION['user_id']) || !$alojamientoId) {
                     header("Location: index.php?action=login");
                     exit;
                  }
                
                    if ($userController->removeUserAlojamiento($_SESSION['user_id'], $alojamientoId)) {
                       echo "<script>alert('Alojamiento eliminado de tus intereses.');</script>";
                 } else {
                      echo "<script>alert('Error al eliminar el interés.');</script>";
                        }
                    }
                    include './views/Profile.php';
                    break;

        case 'logout':
            // Limpia todas las variables de sesión
            session_unset();
            session_destroy();
        
            // Redirige al login
            header("Location: index.php?action=home");
            exit;
        
}
?>
