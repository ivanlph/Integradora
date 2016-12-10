<div class="container">
  <center>
    <div class="jumbotron" style="background-color: #333;">
      <h1>Se nuestro cliente</h1>

      <a href=""></a>
      <div class="row">
        <div class="col-sm-3 col-lg-4 col-md-3"></div>
        <div class="col-sm-6 col-lg-4 col-md-6">
          <form class = "form" role = "form" method = "post" action = "./controladores/altausuario.php">
            <div class="form-group">
              <input type="text" class="form-control input-md"  placeholder = "Nombre" name="nombre" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Usuario" name="usuario" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Contraseña" name="password" required>
            </div>          
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Correo" name="email" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control input-md" placeholder = "Confirmar correo" name="correocomp" required>
            </div>
            <button class=" btn btn-success" type="submit">Registrarme</button><br><br>
          </form>              
        </div>
        <div class="col-sm-3 col-lg-4 col-md-3"></div>
      </div>
      <div>
        <h6 style="color: white;">Al hacer click en Registrarme, aceptas los <a href="" style="color: #8bc34a;">términos y condiciones</a> y la <a href="" style="color: #8bc34a;">política de privacidad de Letrelon</a>.</h6>
      </div>
      <br><br>  
      <div>
        <h4 style="color: white;">¿Ya te registraste? <a href="" style="color: #8bc34a;">Iniciar sesión</a>.</h4>
      </div>
    </div>
  </center>
</div>