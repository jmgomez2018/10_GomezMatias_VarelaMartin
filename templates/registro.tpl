{include file="header.tpl"}

  <div class="container-fluid mt-5">
    <div id="login">
      <div class="">
        <p class="errorForm">{$Message}</p>
      </div>
      <form name='form-login' method="post" action="Registrar">
        <div class="form-group">
          <span class="fontawesome-user"></span>
          <input type="text" id="user" name="user" placeholder="Username" required>
        </div>
        <div class="form-group">
          <span class="fa fa-at"></span>
          <input type="text" name="email" id="email" placeholder="E-Mail: tu@ejemplo.com" required autofocus>
        </div>
        <div class="form-group">
          <span class="fontawesome-lock"></span>
          <input type="password" id="pass" name="pass" placeholder="Password" required>
        </div>
        <div class="form-group">
          <span class="fa fa-repeat"></span>
          <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Confirmar Contraseña" required>
        </div>
        <input type="submit" value="Registrarse">
      </form>
    </div>
  </div>

{include file="footer.tpl"}
