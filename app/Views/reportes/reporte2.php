<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

</head>
<body>
  <?= $estilos?>
  <div class="text-center mb-2">
    <h1>Reporte de Ventas</h1>
    <h2>Área de <?=$area?></h2>
  </div>
  <table class="table">
    <colgroup>
      <col style="width:10%">
      <col style="width:60%">
      <col style="width:30%">
    </colgroup>
    <thead>
      <tr class="bg-primary text-light">
        <th>#</th>
        <th>Producto</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($productos as $producto): ?>
      <tr>
        <td>1</td>
        <td><?=$producto['descripcion']?></td>
        <td><?=$producto['precio']?></td>
      </tr>
      <?php endforeach?>
    </tbody>
  </table>
  <strong><?=$autor?></strong>
</body>
</html>