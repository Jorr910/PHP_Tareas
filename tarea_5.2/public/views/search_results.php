<!-- RESULTADOS DE BUSQUEDA -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoría</th>
            <th>Disponible</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultados as $biblioteca): ?>
            <tr>
                <td><?php echo $biblioteca->getId(); ?></td>
                <td><?php echo $biblioteca->getTitulo(); ?></td>
                <td><?php echo $biblioteca->getAutor(); ?></td>
                <td><?php echo $biblioteca->getCategoria(); ?></td>
                <td><?php echo $biblioteca->isDisponible() ? 'Sí' : 'No'; ?></td>
                <td>
                    <?php if ($biblioteca->isDisponible()): ?>
                        <a href="?borrow=<?php echo $biblioteca->getId(); ?>">Solicitar Préstamo</a>
                    <?php else: ?>
                        No disponible
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
