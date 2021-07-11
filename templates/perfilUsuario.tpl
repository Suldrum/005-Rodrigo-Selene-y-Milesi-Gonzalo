{include 'templates/header.tpl'}

<div class="container">
<h1> Tus datos </h1>
    <label for="nombre">Nombre: </label> <label for="nombreDB"> {$userData['name']} </label>
    <label for="apellido">Apellido: </label> <label for="apellidoDB"> {$userData['lastname']} </label>
    <label for="email">Email: </label> <label for="emailDB"> {$userData['email']} </label>
</div>

{include 'templates/footer.tpl'}