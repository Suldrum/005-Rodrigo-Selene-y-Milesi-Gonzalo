<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2989af;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" href="home">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="dexter">Pokedex</a></li>
            <li class="nav-item"> <a class="nav-link active" href="regiones">Regiones<span class="sr-only"></span></a>
            </li>
            <li class="nav-item"> <a class="nav-link active" href="tablatipos">Tabla de Tipos<span
                        class="sr-only"></span></a> </li>
        </ul>
        <ul>
            <!--SI HAY UN USUARIO ACTIVO-->
            {if isset($userLogged) && $userLogged}
                <div class="navbar-nav ml-auto">
                    <span class="navbar-text nav-link active">{$userLogged['name']}</span>
                    {if (!($userLogged['admin']))}
                        <a class="nav-item nav-link " href="perfilUsuario">Tu Perfil<span class="sr-only"></span></a>
                    {/if}
                    <a class="nav-item nav-link " href="logout">Logout<span class="sr-only"></span></a>
                </div>
            {else}
                <!--SI NO HAY UN USUARIO ACTIVO-->
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="login">Login<span class="sr-only"></span></a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="registro">Registrar<span class="sr-only"></span></a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link " href="usuarios">Lista de usuarios<span class="sr-only"></span></a>
                </div>
            {/if}

        </ul>
    </div>
</nav>