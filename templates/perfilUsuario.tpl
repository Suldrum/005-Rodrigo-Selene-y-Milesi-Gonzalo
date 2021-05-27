{include 'templates/header.tpl'}

<div class="container">
<h1> hola mundo! </h1>
    <img alt="IMAGEN_AVATAR">

    <label for="nombre">nombre </label>
    <label for="nombre_tabla"> {$usuarioDatos['name']} </label>
    <label for="apellido">apellido </label>
    <label for="apellido_tabla"> {$usuarioDatos['id']} </label>
    <label for="apodo">apodo </label>
    <label for="apodo_tabla"></label>
    <label for="email">email </label>
    <label for="email_tabla"> </label>
</div>

{include 'templates/footer.tpl'}