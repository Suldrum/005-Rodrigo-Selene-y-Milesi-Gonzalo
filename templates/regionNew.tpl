{include 'templates/header.tpl'}
<div class="container">
    <form action="createRegion" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="F_nombre" placeholder="" />
        <label for="imagen"> Link de la imagen </label>
        <input type="text" name="F_imagen" placeholder="" />
        <button id="botonCrear">Crear Region</button>
    </form>
</div>
{include 'templates/footer.tpl'}