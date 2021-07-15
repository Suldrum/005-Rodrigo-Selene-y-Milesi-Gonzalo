{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosTipoActual">
        {$tipoActual->nombre}
        <img class="img-fluid" height="200px" width="200px" alt= "IMAGEN_TIPO_ACTUAL"src="{$tipoActual->imagen_tipo}">
    </div>
    <br>
    <br>
    <div id= "datosTipoNuevo">
    <form action="editTipoElemental/{$tipoActual->id_tipo_elemental}" method="POST" enctype="multipart/form-data">
        {include 'templates/formNameImage.tpl'}
        <button id="botonIngresar">Actualizar tipo</button>
    </form>
</div>
{include 'templates/footer.tpl'}