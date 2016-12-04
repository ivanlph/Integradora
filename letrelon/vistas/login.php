`<br><br>
<div class="container">
  <center>
    <div class="jumbotron" style="background-color: #333;">
      <div class="page-header">
        <img src="./recursos/images/logo1.png" class = "img-responsive img-rounded" alt="">
      </div>
      
      <p>Iniciar con fabebook.</p> 

      <fb:login-button 
        scope="public_profile,email"
        onlogin="checkLoginState();">
      </fb:login-button>

      <p>o</p> 

      <div class="row">
        <div class=" col-xs-2 col-sm-2 col-lg-3 col-md-2"></div>
        <div class="col-xs-8 col-sm-8 col-lg-6 col-md-8">
          <form>
            <div class="form-group">
              <input type="text" class="form-control input-md"  placeholder = "Nombre de usuario o dirección de correo electrónico" id="nombre">
            </div>

            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Contraseña" id="password">
            </div> 
            <div class="row">
              <div class="col-sm-12 col-lg-12 col-md-12">
                <label class="checkbox-inline"><input type="checkbox" value="">Recordarme</label>
                <button class=" btn btn-success">Iniciar sesión</button><br>              
              </div>         
            </div>
          </form>              
        </div>
        <div class="col-xs-2 col-sm-2 col-lg-3 col-md-2"></div>
      </div>
      <br><br>  
      <div>
        <a href="" style="color: #8bc34a;">¿Olvidaste tu nombre de usuario o contraseña?</a>
        <h4 style="color: white;">¿No tienes cuenta? <a href="" style="color: #8bc34a;">Regístrate</a>.</h4>
      </div>
      <div>
        <h6 style="color: white;">Si haces clic en "Acceder con Facebook" y no eres usuario de Letrelon, quedarás registrado y aceptarás los <a href="" style="color: #8bc34a;">términos y condiciones</a> y la </h6>
        <h6 style="color: white;"><a href="" style="color: #8bc34a;">política de privacidad de Letrelon</a>.</h6>
      </div>
    </div>
  </center>
</div>