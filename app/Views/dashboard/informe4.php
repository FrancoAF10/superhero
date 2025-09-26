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
  <button class="btn btn-outline-primary" id="obtener-datos" type="button">Obtener datos</button>
  <canvas id="lienzo"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

<script>
  const lienzo = document.getElementById("lienzo")
  const btnDatos = document.getElementById("obtener-datos")
  let grafico=null

  const options={
    animation:{
      easing:'linear'
    },  
    scales:{
      y:{beginAtZero:true}
    }
  }
  
  function renderGraphic(){
    grafico= new Chart(lienzo,{
      type:'bar',
      data:{
        labels:[],
        datasets:[
          {
            label:'',
            data:[]
          }
        ]
      },//data
      options
    })// new chart
  }//renderGraphic

  btnDatos.addEventListener("click",async () =>{
    try{
      const response = await fetch('<?= base_url() ?>public/api/getdatainforme4cache',{method:'GET'})

      if(!response.ok){
        throw new Error('No se pudo conectar al servidor')
      }

      const data=await response.json()

      if(data.success){
        grafico.data.labels=data.resumen.map(row=>row.publisher_name)
        grafico.data.datasets[0].data=data.resumen.map(row=>row.Total)
        grafico.data.datasets[0].label=data.message
        grafico.update()
      }
    }catch(error){
      console.log(error)
    }
  })

  renderGraphic()
</script>
</body>
</html>