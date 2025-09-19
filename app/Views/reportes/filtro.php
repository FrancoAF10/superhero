<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="/reportes/filtro/r4" method="get">
    <div>
      <label for="publisher_name">Publisher</label>
          <select name="publisher_name" id="publisher_name" >
            <option value="">Seleccione</option>
            <?php foreach($rows as $row): ?>
              <option value="<?=htmlspecialchars($row['publisher_name'])?>"><?=htmlspecialchars($row['publisher_name'])?></option>
            <?php endforeach;?>
          </select>
          <button type="submit">pdf</button>
    </div>
  </form>
</body>
</html>