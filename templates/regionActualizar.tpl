{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosRegionActual">
        {$regionActual->nombre}
        <img class="img-fluid" height="100px" width="100px" alt= "IMAGEN_REGION_ACTUAL"src="{$regionActual->imagen_region}">
    </div>
    <br>
    <br>
    <div id= "datosRegionNuevos">
    <form action="editRegion/{$regionActual->id_region}" method="POST" enctype="multipart/form-data">
        {include 'templates/formNameImage.tpl'}
        <button class="btn btn-outline-success">Actualizar Region</button>
    </form>
</div>
{include 'templates/footer.tpl'}