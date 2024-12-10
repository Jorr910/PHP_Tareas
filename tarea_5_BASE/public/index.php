<?php

// Visualización de errores: 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// IMPORTAR UN ARCHIVO: DIR NOS AYUDA CON LAS RUTAS RELATIVAS. 

require('./biblioteca.php');

// Iniciamos sessión para trabajar con el localstorage 

session_start(); 

    //  Arreglo para guardar la informacion 

    if(!isset($_SESSION['libreria'])) {

        $_SESSION['libreria'] = []; 

    }

    $libreria = $_SESSION['libreria']; 

    //Visualizar todos los metodos POST
    
   if(isset($_POST['createForm'])) {
    //print_r($_POST); // Verificar el metodo de crear

    // Guardar en la LIBRERIA: 

       if(isset($_POST['titulo'],$_POST['autor'], $_POST['categoria'])) {
        

            $id= count($libreria)+1;
            $titulo = $_POST['titulo'];
            $nombre = $_POST['autor'];
            $categoria = $_POST['categoria'];

            $biblioteca = new Biblioteca($id, $titulo, $nombre, $categoria);
            //print_r($biblioteca);  

        // Agregando la informacion al arreglo vacio "libreria"
            array_push($libreria,$biblioteca); 
            echo "<br/>";
            $_SESSION['libreria']= $libreria;

            header('Location:/FSJ25/tareas/tarea_5/public/index.php '); 
        }

}

    // ACTUALIZAR EL FORMULARIO (PASO 3, LUEGO OBTENER ID)

    if(isset($_POST['updateForm'])) {
        foreach($libreria as $biblioteca) {
            if($biblioteca->getId() == $_POST['id']) {

                $biblioteca->setTitulo($_POST['titulo']); 
                $biblioteca->setAutor($_POST['autor']);
                $biblioteca->setCategoria($_POST['categoria']);
            }
        }

        header('Location:/FSJ25/tareas/tarea_5/public/');
    }


    // OBTENER EL IDs

    function getLibreriaPorID($id,$libreria) {
        foreach($libreria as $biblioteca) {
            if($biblioteca->getId() == $id) {
                return $biblioteca;
            }
        }
    }

        // ELIMINAR DATOS DEL FORMULARIO: 

        if(isset($_GET['delete'])) {
            $id = $_GET['delete']; 

            foreach($libreria as $key => $biblioteca) {
                if($biblioteca->getId() == $id){
                    unset($libreria[$key]);
                    break;
                }
            }

            $_SESSION['libreria'] = $libreria;
            header('Location:/FSJ25/tareas/tarea_5/public/');
            exit;

        }

    ?>

<!-- ESTRUCTURA DEL DOM-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>

    <h1>Biblioteca</h1>

    <section>

        <h3>Agrega un libro a nuestro sistema bibliotecarío:</h3>

    <!-- PARA EDITAR UTILIZAMOS METODO GET, PASO URL-->

        <?php if(isset($_GET['edit'])){

            $libreriaEditable = getLibreriaPorID($_GET['edit'],$libreria);
           // print_r($libreriaEditable);
        
        ?>
        
        <!--FORMULARIO PARA EDITAR -->


        <form method="POST" action="">

            <!-- Para verificar -->
             <input type="hidden" name="updateForm" value="Soy el update">

            <input type= "hidden" name = "id" value = "<?php echo "{$libreriaEditable->getId()}"?>">
           
            <label>Título del libro: </label>
            <input type="text" name="titulo" class="input" value="<?php echo "{$libreriaEditable->getTitulo()}"?>">

            <label>Autor del título: </label>
            <input type="text" name="autor" class="input" value="<?php echo "{$libreriaEditable->getAutor()}"?>">
            
            <label>Categoría del título: </label>
            <input type="text" name="categoria" value="<?php echo "{$libreriaEditable->getCategoria()}"?>">

            <button type="submit">Editar libro</button>

        </form> 

        <?php } else {?> 

     
        <!-- Formulario para crear-->

        <form method="POST" action="" >

            <!-- Para verificar -->

            <input type="hidden" name="createForm" value="Im the Creator">

            <label>Título del libro a registrar: </label>
            <input type="text" name="titulo" class="input">

            <label>Autor del título: </label>
            <input type="text" name="autor" class="input">
            
            <label>Categoría del título: </label>
            <select name="categoria">
                <option value="amor">Amor</option>
                <option value="terror">Terror</option>
                <option value="comedia">Comedia</option>
                <option value="accion">Acción</option>
                <option value="fantasia">Fantasía</option>
            </select>

            <button type="submit">Agregar libro</button>

        </form> 

        <?php }?>

        <main>

            <table>
                <thead>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                </thead>

                    <tbody>

                    <?php foreach($libreria as $biblioteca):?>


                        <tr>
                            <th><?php echo "{$biblioteca->getId()}"?></th>
                            <td><?php echo "{$biblioteca->getTitulo()}"?></td>
                            <td><?php echo "{$biblioteca->getAutor()}"?></td>
                            <td><?php echo "{$biblioteca->getCategoria()}"?></td>
                            <td>
                                <a href='?edit=<?php echo "{$biblioteca->getId()}"?>'>Editar <a/>
                                <a href='?delete=<?php echo "{$biblioteca->getId()}"?>'>Eliminar <a/>
                            </td>
                        </tr>

                    <?php endforeach ?>


                    </tbody>
                
            </table>
        </main>






    </section>

    
    
</body>
</html>
