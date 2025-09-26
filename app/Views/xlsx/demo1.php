<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <button type="button" id="exportar">Descarga</button>
  <table id="tabla-datos">
    <thead>
      <tr>
        <th>#</th>
        <th>APELLIDOS</th>
        <th>NOMBRES</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>1</th>
        <th>cardenas</th>
        <th>luis</th>
      </tr>
        <tr>
        <th>2</th>
        <th>pachas</th>
        <th>jose</th>
      </tr>
        <tr>
        <th>3</th>
        <th>martinez</th>
        <th>carlos</th>
      </tr>
    </tbody>
  </table>
<script type="text/javascript" src="https://cdn.sheetjs.com/xlsx-0.20.3/package/dist/xlsx.full.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded",()=>{
  const btn=document.getElementById('exportar')

  btn.addEventListener("click",()=>{

    const tabla= document.getElementById('tabla-datos')
    //Crear un workbok(Libro de trabajo)>hoja>tabla
    const workBook=XLSX.utils.table_to_book(tabla,{sheet:'contactos'})
  
    //contruir + habilitar la descarga del archivo
    XLSX.writeFile(workBook,"Reporte.xlsx")
  })
})
</script>
</body>
</html>