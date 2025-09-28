<?= $estilos?>
<page backtop="7mm" backbottom="10mm">
  <page_header>
      [[page_cu]]/[[page_nb]]
  </page_header>
  <page_footer>
    Lista de Super Heroes
  </page_footer>
    <h3 class="text-center"><?=$titulo?></h3>

  <table class="table">
    <colgroup>
      <col style="width:5%">
      <col style="width:15%">
      <col style="width:25%">
      <col style="width:15%">
      <col style="width:20%">
      <col style="width:20%">
    </colgroup>
    <thead>
      <tr>
        <th>ID</th>
        <th>Super Hero</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>alineacion</th>
        <th>editora</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($superheros as $row): ?>
        <tr>
          <td><?=$row['id']?></td>
          <td><?=$row['superhero_name']?></td>
          <td><?=$row['full_name']?></td>
          <td><?=$row['gender']?></td>
          <td><?=$row['alignment']?></td>
          <td><?=$row['publisher_name']?></td>
        </tr>
      <?php endforeach;?>    
    </tbody>
  </table>
</page>