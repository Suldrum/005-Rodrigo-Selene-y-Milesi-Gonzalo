{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosRegionActual">
        {$regionActual->nombre}
        <img alt= "IMAGEN_REGION_ACTUAL"src="{$regionActual->imagen_region}">
    </div>
    <br>
    <br>
    <div id= "datosRegionNuevos">
    <form action="editRegion/{$regionActual->id_region}" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="F_nombre" value="{$regionActual->nombre}" />
        <label for="imagen"> Link de la imagen </label>
        <input type="text" name="F_imagen" value="{$regionActual->imagen_region}" />
        <button id="botonIngresar">Actualizar Region</button>
    </form>
</div>
{include 'templates/footer.tpl'}