{include 'templates/header.tpl'}

<div class="container">
    <form id="IDLogin"action="verify" method="POST">
        <label for="email">email </label>
        <input type="email" id="IDemail" name="F_email" placeholder="ejemplo@ejemplo.com" />
        <label for="contraseña">contraseña </label>
        <input type="password" id="IDcontraseña" name="F_contraseña" placeholder="" />
        {if $error}
            <div class="alert alert-danger" role="alert">
                {$error}
            </div>
        {/if}
        <button id="botonIngresar" type="button">Ingresar</button>
    </form>
    <p>¿No tiene cuenta?</p>
    <button id="botonCrearCuenta" type="button">Crear cuenta</button>
</div>

{include 'templates/footer.tpl'}