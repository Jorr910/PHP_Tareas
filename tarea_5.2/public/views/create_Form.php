
<!-- CREAMOS EL FORMULARIO PARA REGISTRAR LOS DATOS  -->


<form method="POST" action="">
    <input type="hidden" name="createForm" value="Im the Creator">

    <label>Título del libro a registrar: </label>
    <input type="text" name="titulo" class="input" required>

    <label>Autor del título: </label>
    <input type="text" name="autor" class="input" required>
    
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
