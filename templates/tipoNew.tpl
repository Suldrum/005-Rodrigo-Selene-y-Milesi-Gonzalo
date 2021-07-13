{include 'templates/header.tpl'}
<div class="container">
    <form action="createTipoElemental" method="POST" enctype="multipart/form-data">
        {include 'templates/formNameImage.tpl'}
        <button id="botonCrear">Crear Tipo</button>
    </form>
</div>
{include 'templates/footer.tpl'}