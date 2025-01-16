<?php 



// Llamamos los archivos a utilizar 

require_once("./config/database.php"); 
require_once("./models/UserModel.php"); 

class UserController {

    private $model; 

    public function __construct() {

        $db = (new DataBase())->getConnection(); 
        $this->model = new UserModel($db); 
    }

    public function register($username, $password) {
        return $this->model->registerUser($username, $password);
    }

    public function login($username, $password) {
        return $this->model->loginUser($username, $password);
    }

    public function addUserAlojamiento($userId, $alojamientoId) {
        return $this->model->addUserAlojamiento($userId, $alojamientoId);
    }
    
    public function getUserAlojamientos($userId) {
        return $this->model->getUserAlojamientos($userId);
    }

    public function getAllAlojamientos() {

        $db = new DataBase(); 
        $pdo = $db->getConnection(); 
    
        $stmt = $pdo->query("SELECT id, nombre FROM cat_alojamientos");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeUserAlojamiento($userId, $alojamientoId) {
        return $this->model->removeUserAlojamiento($userId, $alojamientoId);
    }
        
    

}



?>