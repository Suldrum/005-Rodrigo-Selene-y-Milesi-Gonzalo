{include 'templates/header.tpl'}
<h1> LISTA DE USUARIOS </h1>
<div class="container">
<table>
<thead>
    <tr>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>EMAIL</th>
        <th>PERMISOS DE ADMINISTRACION</th>
        <th>ACCIONES</th>
    </tr>
</thead>
<tbody>
    {foreach from=$listaUsuarios item=user}
        <tr>
            <td>{$user->nombre}</td>
            <td>{$user->apellido}</td>
            <td>{$user->email}</td>
            <td>{$user->administrador}</td>
            {if {$user->administrador}==1}
                <td>
                <button onclick="location.href='bajaAdmin/{$user->ID}'">Quitar Permisos</button>
                </td>
            {else}
                <td>
                <button onclick="location.href='altaAdmin/{$user->ID}'">Dar Permisos</button>
                </td>
            {/if}
            <td>
                <button onclick="location.href='eliminarUser/{$user->ID}'">BORRAR</button>
            </td>
        </tr>
    {/foreach}
</tbody>
</table>
</div>

{include 'templates/footer.tpl'}