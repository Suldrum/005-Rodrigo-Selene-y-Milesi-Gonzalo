{include 'templates/header.tpl'}
<div class="container">
    <div id= "datosTipoActual">
        {$tipoActual->nombre}
        <img alt= "IMAGEN_TIPO_ACTUAL"src="{$tipoActual->imagen_tipo}">
    </div>
    <br>
    <br>
    <div id= "datosTipoNuevo">
    <form action="editTipoElemental/{$tipoActual->id_tipo_elemental}" method="POST">
        <label for="nombre">Nombre: </label>
        <input type="text" name="F_nombre" value="{$tipoActual->nombre}" />
        <label for="imagen"> Link de la imagen </label>
        <input type="text" name="F_imagen" value="{$tipoActual->imagen_tipo}" />
        <button id="botonIngresar">Actualizar tipo</button>
    </form>
</div>
{include 'templates/footer.tpl'}