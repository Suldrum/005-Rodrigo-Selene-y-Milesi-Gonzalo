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
        {include 'templates/formNameImage.tpl'}
        <button id="botonIngresar">Actualizar Region</button>
    </form>
</div>
{include 'templates/footer.tpl'}