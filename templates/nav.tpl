<header>
    <nav>
        <ul>
            <li><a class='navegacion' href="home">Home</a></li>
            <li><a class='navegacion' href="dexter">Pokedex</a></li>
        </ul>
        <ul>
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
                    <a class="nav-item nav-link " href="registrar">Registrar<span class="sr-only"></span></a>
                </div>
            {/if}

        </ul>
    </nav>
</header>