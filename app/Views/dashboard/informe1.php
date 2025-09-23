<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"><body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script></html>
<body>
<div class="container">
  <canvas id="lienzo"></canvas>
  <hr>
  <canvas id="otro-lienzo"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded',()=>{
    const lienzo= document.getElementById('lienzo')
    const otrolienzo= document.getElementById('otro-lienzo')
    const grafico= new Chart(lienzo,{
      type:'bar',
      data:{
        labels:['Rock','Baladas','Metal'],
        datasets:[
          {data:[15,20,4],label:'2023'},
          {data:[50,10,8],label:'2024'}
        ]
      }
    })
    const grafico2=new Chart(otrolienzo,{
      type:'line',
      data:{
        labels:['2010','2011','2012','2013'],
        datasets:[
          {
            data:[420,492,470,510],
            label:'Egresados Ing. Software'
          }
        ]
      }
    })
  })
</script>
</body>
</html>