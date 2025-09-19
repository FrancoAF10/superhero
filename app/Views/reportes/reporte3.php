
  <?=$estilos?>
<page backtop="7mm" backbottom="10mm">
  <page_header>
      [[page_cu]]/[[page_nb]]
  </page_header>
  <page_footer>
    Lista de Super Heroes
  </page_footer>
  <table class="table">
    <colgroup>
      <col style="width:10%">
      <col style="width:20%">
      <col style="width:40%">
      <col style="width:20%">
      <col style="width:10%">
    </colgroup>
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>ALIAS</th>
        <th>CASA</th>
        <th>BANDO</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($rows as $row): ?>
        <tr>
          <td><?=$row['id']?></td>
          <td><?=$row['superhero_name']?></td>
          <td><?=$row['full_name']?></td>
          <td><?=$row['publisher_name']?></td>
          <td><?=$row['alignment']?></td>
        </tr>
      <?php endforeach;?>    
    </tbody>
  </table>



</page>
 