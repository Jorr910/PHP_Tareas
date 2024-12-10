
<!-- CREAMOS EL FORMULARIO PARA EDITAR LOS DATOS  -->

<form method="POST" action="">
    <input type="hidden" name="updateForm" value="Soy el update">
    <input type="hidden" name="id" value="<?php echo "{$libreriaEditable->getId()}"; ?>">

    <label>Título del libro: </label>
    <input type="text" name="titulo" class="input" value="<?php echo "{$libreriaEditable->getTitulo()}"; ?>" required>

    <label>Autor del título: </label>
    <input type="text" name="autor" class="input" value="<?php echo "{$libreriaEditable->getAutor()}"; ?>" required>
    
    <label>Categoría del título: </label>
    <select name="categoria" required>
        <option value="amor" <?php echo ($libreriaEditable->getCategoria() == 'amor') ? 'selected' : ''; ?>>Amor</option>
        <option value="terror" <?php echo ($libreriaEditable->getCategoria() == 'terror') ? 'selected' : ''; ?>>Terror</option>
        <option value="comedia" <?php echo ($libreriaEditable->getCategoria() == 'comedia') ? 'selected' : ''; ?>>Comedia</option>
        <option value="accion" <?php echo ($libreriaEditable->getCategoria() == 'accion') ? 'selected' : ''; ?>>Acción</option>
        <option value="fantasia" <?php echo ($libreriaEditable->getCategoria() == 'fantasia') ? 'selected' : ''; ?>>Fantasía</option>
    </select>

    <button type="submit">Editar libro</button>
</form>
