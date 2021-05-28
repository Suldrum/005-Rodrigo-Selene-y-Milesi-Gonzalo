{include 'templates/header.tpl'}

<div class="container">
    <form action="registrar" method="POST">
        <label for="nombre">nombre </label>
        <input type="text" name="F_nombre" placeholder=""/>

        <label for="apellido">apellido </label>
        <input type="text" name="F_apellido" placeholder=""/>

        <label for="apodo">apodo </label>
        <input type="text" name="F_apodo" placeholder=""/>

        {include 'templates/formEmailPass.tpl'}
        <button id="botonRegistrar">¡Unete ahora!</button>
    </form>
</div>

{include 'templates/footer.tpl'}