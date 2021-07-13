{include 'templates/header.tpl'}
<div class="container">
    <form action="createRegion" method="POST" enctype="multipart/form-data">
        {include 'templates/formNameImage.tpl'}
        <button type="submit" id="botonCrear">Crear Region</button>
    </form>
</div>
{include 'templates/footer.tpl'}