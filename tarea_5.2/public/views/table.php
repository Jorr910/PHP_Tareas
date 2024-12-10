<!-- TABLA PARA OBTENER LOS RESULTADOS  -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->libreria as $biblioteca): ?>
            <tr>
                <!-- MANDAMOS A LLAMARLOS POR MEDIO DE LA CLASE  -->
                <td><?php echo "{$biblioteca->getId()}"; ?></td>
                <td><?php echo "{$biblioteca->getTitulo()}"; ?></td>
                <td><?php echo "{$biblioteca->getAutor()}"; ?></td>
                <td><?php echo "{$biblioteca->getCategoria()}"; ?></td>
                <td>
                    <a href="?edit=<?php echo "{$biblioteca->getId()}"; ?>">Editar</a>
                    
                    <a href="?delete=<?php echo "{$biblioteca->getId()}"; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
