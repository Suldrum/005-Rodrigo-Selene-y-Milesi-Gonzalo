<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{$base_url}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <title>{$title}</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a class='navegacion' href="{$baseURL}home">Home</a></li>
                <li><a class='navegacion' href="{$baseURL}pokedex">Pokedex</a></li>
            </ul>
            <ul>
                <li><a class='navegacion' href="{$baseURL}login">Login</a></li>
                <!--SI HAY UN USUARIO ACTIVO-->
                 {if isset($username) && $username}
                    <div class="navbar-nav ml-auto">
                        <span class="navbar-text nav-link active">{$username}</span>
                        <a class="nav-item nav-link " href="logout">Logout<span class="sr-only"></span></a>
                    </div>
                {else}
                <!--SI NO HAY UN USUARIO ACTIVO-->
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link " href="login">Login<span class="sr-only"></span></a>
                    </div>
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link " href="formRegistro">Registrar<span class="sr-only"></span></a>
                    </div>        
                {/if}

            </ul>
        </nav>
    </header>