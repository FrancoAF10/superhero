<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center mt-3">Promedio de SH Publisher</h3>

<div class="container">
  <button class="btn btn-outline-primary" id="obtener" type="button">Obtener datos</button>
  <canvas id="lienzo"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
  const lienzo = document.getElementById("lienzo")
  const btnDatosPromedio = document.getElementById("obtener")
  let grafico=null

  
  const options={
    animation:{
        easing:'linear'
    },
    scales:{
        y:{beginAtZero:true}
    },
    plugins:{
          datalabels: {
            anchor: 'end',
            align: 'center',
            color: 'black',
            font: {
            weight: 'bold'
            },
            formatter:(value)=>value,
            rotation:-90
        }
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
      options,
      plugins: [ChartDataLabels]
    })// new chart
  }//renderGraphic

  btnDatosPromedio.addEventListener("click",async () =>{
    try{
      const response = await fetch('<?= base_url() ?>public/api/getgrafico2',{method:'GET'})

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>