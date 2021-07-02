{include 'templates/header.tpl'}

<div class="container">
    <form action="verify" method="POST">
    {include 'templates/formEmailPass.tpl'}
        <button>Ingresar</button>
    </form>
    <p>¿No tiene cuenta?</p>
    <button id="botonCrearCuenta" onclick="location.href='registro'" >Crear cuenta</button>
</div>

{include 'templates/footer.tpl'}