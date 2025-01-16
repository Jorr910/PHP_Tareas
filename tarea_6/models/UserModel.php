<?php

class UserModel { 

    private $database; 

    public function __construct($database) {
        $this->database = $database;
    }


    public function registerUser($username, $password, $role = 'user') {

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
    
        try {
        $stmt = $this->database->prepare($query); 
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hash);
        $stmt->bindParam(':role', $role);
        return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al registrar usuario: " . $e->getMessage();
            return false;
        }
    
    }

    public function loginUser($username, $password) { 

        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->database->prepare($query);

        $stmt->bindParam(':username', $username);
        $stmt->execute(); 

        // Obteniendo datos del usuario individualmente: 

        $user = $stmt->fetch(PDO::FETCH_ASSOC); 


        //Verificando la contraseña

        if ($user && password_verify($password, $user['password'])) {

            return $user; 
        }

        return false; 
    

    }

    public function addUserAlojamiento($userId, $alojamientoId) {
        $query = "INSERT INTO user_alojamientos (user_id, alojamiento_id) VALUES (:user_id, :alojamiento_id)";
        try {

            // Empujando los datos

            $stmt = $this->database->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':alojamiento_id', $alojamientoId);
            return $stmt->execute();
        } catch (PDOException $e) {

            echo "Error al agregar interés: " . $e->getMessage();
            return false;
        }
    }
    
    public function getUserAlojamientos($userId) {
        $db = new DataBase();
        $pdo = $db->getConnection();
    
        $stmt = $pdo->prepare("SELECT a.id, a.nombre, a.descripcion, a.imagen 
                               FROM cat_alojamientos a 
                               JOIN user_alojamientos ua ON a.id = ua.alojamiento_id 
                               WHERE ua.user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getAllAlojamientos() {
        $db = new DataBase();
        $pdo = $db->getConnection();
    
        $stmt = $pdo->query("SELECT id, nombre FROM cat_alojamientos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function removeUserAlojamiento($userId, $alojamientoId) {
        $query = "DELETE FROM user_alojamientos WHERE user_id = :user_id AND alojamiento_id = :alojamiento_id";
        try {
            $stmt = $this->database->prepare($query);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':alojamiento_id', $alojamientoId);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar interés: " . $e->getMessage();
            return false;
        }
    }
    

}


?>


