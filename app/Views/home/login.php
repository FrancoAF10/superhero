<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<body>
  <div class="container mt-3">
    <div class="row">
      <div class="col-md-4 mx-auto">
       <form action="<?=base_url('/login')?>" method="post" autocomplete="off">
          <div class="mb-2">
            <h4>Acceso al Sistema</h4>
            <span>Sistema de super heroes</span>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="nomusuario" id="nomusuario" class="form-control" autofocus required>
            <label for="nomusuario">Nombre de Usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="claveacceso" id="claveacceso" class="form-control" required>
            <label for="claveacceso">Contraseña</label>
          </div>
          <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input" role="switch" id="recordar" name="recordar">
            <label for="recordar" class="form-check-label">Recordar Contraseña</label>
          </div>
          <div>
            <strong>
              <?php if(session()->getFlashdata('error_nomuser')): ?>
                <?=session()->getFlashdata('error_nomuser')?>
              <?php endif;?>
              <?php if(session()->getFlashdata('error_password')): ?>
                <?=session()->getFlashdata('error_password')?>
              <?php endif;?>
            </strong>
          </div>
          <div class="text-end">
            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
          </div>
       </form>
    </div>
  </div>
</body>
</html>