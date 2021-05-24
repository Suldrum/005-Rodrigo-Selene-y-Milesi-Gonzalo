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