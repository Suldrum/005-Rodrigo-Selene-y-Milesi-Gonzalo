<label for="email">email </label>
<input type="email" name="F_email" placeholder="ejemplo@ejemplo.com" required />
<label for="contraseña">contraseña </label>
<input type="password" name="F_contraseña" placeholder="" required  />
{if $error}
    <div class="alert alert-danger" role="alert">
        {$error}
    </div>
{/if}