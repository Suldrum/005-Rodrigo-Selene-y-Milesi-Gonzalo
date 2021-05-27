{include 'templates/header.tpl'}

<div class="container">
    <form id="IDRegistro" action="registrarAdmin" method="POST">
        <label for="nombre">nombre </label>
        <input class="form-control" type="text" id="IDnombre" name="F_nombre" placeholder=""/>

        <label for="apellido">apellido </label>
        <input class="form-control" type="text" id="IDapellido" name="F_apellido" placeholder=""/>

        <label for="email">email </label>
        <input class="form-control" type="email" id="IDemail" name="F_email" placeholder="ejemplo@ejemplo.com"/>

        <label for="contraseña">contraseña </label>
        <input class="form-control" type="password" id="IDcontraseña" name="F_contraseña" placeholder=""/>
        <button id="botonRegistrar">Dar de alta administrador</button>
    </form>
</div>

{include 'templates/footer.tpl'}