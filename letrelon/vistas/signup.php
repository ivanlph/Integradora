
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1836101749980506',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script>
  
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});


{
    status: 'connected',
    authResponse: {
        accessToken: '...',
        expiresIn:'...',
        signedRequest:'...',
        userID:'...'
    }
}


function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>


<div class="container">
  <center>
    <div class="jumbotron" style="background-color: #333;">
      <h1>Se nuestro cliente</h1>

      <p>Registrate con facebbok.</p> 

      <fb:login-button 
        scope="public_profile,email"
        onlogin="checkLoginState();">
      </fb:login-button>
      <p>o</p> 
      <p>Registrate con tu correo</p> 
      <a href=""></a>
      <div class="row">
        <div class="col-sm-3 col-lg-4 col-md-3"></div>
        <div class="col-sm-6 col-lg-4 col-md-6">
          <form>
            <div class="form-group">
              <input type="text" class="form-control input-md"  placeholder = "Nombre" id="nombre">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Usuario" id="usuario">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Contraseña" id="password">
            </div>          
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Correo" id="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Confirmar correo" id="Confirmacion-email">
            </div>
            <button class=" btn btn-success">Registrarme</button><br><br>
          </form>              
        </div>
        <div class="col-sm-3 col-lg-4 col-md-3"></div>
      </div>
      <div>
        <h6 style="color: white;">Al hacer click en Registrarme, aceptas los <a href="" style="color: #8bc34a;">términos y condiciones</a> y la </h6>
        <h6 style="color: white;"><a href="" style="color: #8bc34a;">política de privacidad de Letrelon</a>.</h6>
      </div>
      <br><br>  
      <div>
        <h4 style="color: white;">¿Ya te registraste? <a href="" style="color: #8bc34a;">Iniciar sesión</a>.</h4>
      </div>
    </div>
  </center>
</div>