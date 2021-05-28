{include 'templates/header.tpl'}
<h1> REGISTRO ADMINISTRACION </h1>
<div class="container">
    <form action="registrarAdmin" method="POST">
        <label for="nombre">nombre </label>
        <input type="text" name="F_nombre" placeholder=""/>

        <label for="apellido">apellido </label>
        <input type="text" name="F_apellido" placeholder=""/>

        {include 'templates/formEmailPass.tpl'}
        <button id="botonRegistrar">Dar de alta administrador</button>
    </form>
</div>

{include 'templates/footer.tpl'}