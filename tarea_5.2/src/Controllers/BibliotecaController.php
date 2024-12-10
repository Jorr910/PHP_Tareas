<?php

// DEFINIMOS NAMESPACE PARA USARLO.

namespace Controllers;

// USAMOS LAS CLASES YA DEFINIDAS. 
use helpers\SessionHelper;
use classes\Biblioteca; 

// CREAMOS LA CLASE QUE MANEJE EL CRUD

class BibliotecaController
{
    // CREAMOS LA VARIABLE QUE SE CONVERTIRA EN UN ARREGLO CON LA SESSION

    private $libreria;

    public function __construct()
    {
        if (!isset($_SESSION['libreria'])) {
            $_SESSION['libreria'] = [];
        }

        $this->libreria = &$_SESSION['libreria'];
    }



    public function handleRequest()
    {
        // Por los nombres de los metodos $_post llamamos los metos a utilizar
        

        if (isset($_POST['search'])) {
            $this->searchBiblioteca();

        } elseif (isset($_POST['createForm'])) {
            $this->createBiblioteca();

        } elseif (isset($_POST['updateForm'])) {
            $this->updateBiblioteca();

        } elseif (isset($_GET['delete'])) {
            $this->deleteBiblioteca();

        } elseif (isset($_GET['borrow'])) {
            $this->borrowBiblioteca();

        } elseif (isset($_GET['edit'])) {
            $this->renderForm('edit');

        } else {
            $this->renderTable();
        }
    }

    // Hacemos la función que renderiza el formulario

    public function renderForm($mode = 'create')
    {
        if ($mode === 'edit' && isset($_GET['edit'])) {
            echo "EDITAR";
            $libreriaEditable = $this->getLibreriaPorID($_GET['edit']);
            require __DIR__ . '/../../public/views/edit_Form.php';
        } else {
            echo "AGREGAR";
            require __DIR__ . '/../../public/views/create_Form.php';
        }
    }

    // busqueda por medio de la clase y un filtro.

    private function searchBiblioteca()
    {
        if (isset($_POST['categoriaBusqueda'])) {
            $categoria = $_POST['categoriaBusqueda'];
            $resultados = array_filter($this->libreria, function ($biblioteca) use ($categoria) {
                return $biblioteca->getCategoria() === $categoria;
            });

            echo "RESULTADOS DE BÚSQUEDA";
            require __DIR__ . '/../../public/views/search_results.php';
        }
    }

    // PRESTAMO SENCILLO de true and false

    private function borrowBiblioteca()
    {
        $id = $_GET['borrow'];
        foreach ($this->libreria as $biblioteca) {
            if ($biblioteca->getId() == $id && $biblioteca->isDisponible()) {
                $biblioteca->setDisponible(false);
                $_SESSION['prestamos'][] = $biblioteca; 
                break;
            }
        }
        header('Location: /FSJ25/tareas/tarea_5.2/public/');
        exit();
    }

    // mostrar la tabla de resultado

    public function renderTable()
    {
        require __DIR__ . '/../../public/views/table.php';
    }

    // CREAR UN LIBRO

    private function createBiblioteca()
    {
        if (isset($_POST['titulo'], $_POST['autor'], $_POST['categoria'])) {
            $id = count($this->libreria) + 1;
            $biblioteca = new Biblioteca($id, $_POST['titulo'], $_POST['autor'], $_POST['categoria'], true);
            $this->libreria[] = $biblioteca;
            header('Location: /FSJ25/tareas/tarea_5.2/public/');
            exit();
        }
    }

    // ACTUALIZAR UN LIBRO

    private function updateBiblioteca()
    {
        foreach ($this->libreria as $biblioteca) {
            if ($biblioteca->getId() == $_POST['id']) {
                $biblioteca->setTitulo($_POST['titulo']);
                $biblioteca->setAutor($_POST['autor']);
                $biblioteca->setCategoria($_POST['categoria']);
            }
        }
        header('Location: /FSJ25/tareas/tarea_5.2/public/');
        exit();
    }

    //BORRAR UN LIBRO

    private function deleteBiblioteca()
    {
        $id = $_GET['delete'];
        foreach ($this->libreria as $key => $biblioteca) {
            if ($biblioteca->getId() == $id) {
                unset($this->libreria[$key]);
                break;
            }
        }
        header('Location: /FSJ25/tareas/tarea_5.2/public/');
        exit();
    }

    // OBTENER UN ID POR LIBRO

    private function getLibreriaPorID($id)
    {
        foreach ($this->libreria as $biblioteca) {
            if ($biblioteca->getId() == $id) {
                return $biblioteca;
            }
        }
        return null;
    }
}
