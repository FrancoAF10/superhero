<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"><body>
  
<div class="container mt-3">
  <form action="<?=base_url(). "reportes/publisher"?>" method="POST">
    <div class="input-group">
      <div class="form-floating">
        <select name="publisher_id" id="publisher_id" class="form-select">
          <option value="">Seleccione</option>
          <?php foreach($publishers as $publisher) : ?>
            <option value="<?=$publisher['id']?>"><?=$publisher['publisher_name']?></option>
          <?php endforeach; ?>
        </select>
        <label for="publisher_id">Editora para generar</label>
      </div>

      <button class="btn btn-outline-success">Generar</button>
    </div>
  </form>

  <form action="<?=base_url()."reportes/raceandalignment"?>" class="my-3" method="POST">
    <h4>Filtrar por razas y alineaciones</h4>
    <div class="row g-2">
      <div class="col-md-6">
        <div class="form-floating">
          <select name="race_id" id="race_id" class="form-select">
            <option value="">Seleccionar</option>
            <?php foreach($race as $raza) : ?>
              <option value="<?=$raza['id']?>"><?=$raza['race']?></option>
            <?php endforeach; ?>
          </select>
          <label for="race_id">Razas</label>
        </div>
      </div>

        <div class="col-md-6">
          <div class="input-group">
            <div class="form-floating">
              <select name="alignment_id" id="alignment_id" class="form-select">
                <option value="">Seleccionar</option>
                <?php foreach($alignment as $alineacion) : ?>
                  <option value="<?=$alineacion['id']?>"><?=$alineacion['alignment']?></option>
                <?php endforeach; ?>  
              </select>
              <label for="alignment_id">Alineaciones</label>
            </div>
            <button type="submit" class="btn btn-outline-primary">Generar</button>
          </div>
        </div>
    </div>
  </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script></html>