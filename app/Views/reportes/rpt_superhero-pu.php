<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Reporte Personalizado</h2>

  <table>
    <colgroup>
      <col style="width: 10%;">
      <col style="width: 25%;">
      <col style="width: 25%;">
      <col style="width: 20%;">
      <col style="width: 20%;">
    </colgroup>
    <thead>
      <tr>
        <td>ID</td>
        <td>Super Hero</td>
        <td>Full Name</td>
        <td>Race</td>
        <td>Alignment</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($superheros as $sh) :?>
        <tr>
          <td><?=$sh['id']?></td>
          <td><?=$sh['superhero_name']?></td>
          <td><?=$sh['full_name']?></td>
          <td><?=$sh['race']?></td>
          <td><?=$sh['alignment']?></td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</body>
</html>