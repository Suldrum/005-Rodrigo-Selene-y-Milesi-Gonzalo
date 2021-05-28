{include 'templates/header.tpl'}
<h1> INGRESO ADMINISTRACION </h1>
<div class="container">
    <form action="verifyAdmin" method="POST">
    {include 'templates/formEmailPass.tpl'}
        <button id="botonIngresar">Ingresar</button>
    </form>
</div>

{include 'templates/footer.tpl'}