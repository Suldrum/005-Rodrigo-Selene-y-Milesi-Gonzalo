{include 'templates/header.tpl'}
<h1> INGRESO ADMINISTRACION </h1>
<div class="container">
    <form id="IDLogin"action="verifyAdmin" method="POST">
        <label for="email">email </label>
        <input type="email" id="IDemail" name="F_email" placeholder="ejemplo@ejemplo.com" />
        <label for="contraseña">contraseña </label>
        <input type="password" id="IDcontraseña" name="F_contraseña" placeholder="" />
        {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/if}
        <button id="botonIngresar">Ingresar</button>
    </form>
</div>

{include 'templates/footer.tpl'}