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
<div class="container mt-2">
  <button class="btn btn-outline-primary" id="obtener-datos" type="button">Obtener datos</button>
  <span id="aviso" class="d-none">Por favor espere ....</span>
  
  <div class="row">
    <div class="col-md-7">
      <canvas id="lienzo"></canvas>
    </div>
    <div class="col-md-5" id="tabla-resumen">
      <table class="table table-bordered">
          <thead>
            <tr></tr>
          </thead>
          <tbody>
            <tr></tr>
          </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded",()=>{
    const lienzo= document.getElementById("lienzo")
    const btnDatos= document.getElementById("obtener-datos")
    const aviso= document.getElementById("aviso")
    let grafico= null

    function renderGraphic(){
      const backgroundColor=[
        'rgba(46, 204, 113, 0.5)',
        'rgba(52, 152, 219, 0.5)',
        'rgba(241, 196, 15, 0.5)',
        'rgba(231, 76, 60, 0.5)',
        'rgba(52, 73, 94, 0.5)'
      ];

      const borderColor=[
        'rgba(46, 204, 113, 1.0)',
        'rgba(52, 152, 219, 1.0)',
        'rgba(241, 196, 15, 1.0)',
        'rgba(231, 76, 60, 1.0)',
        'rgba(52, 73, 94, 1.0)'
      ];

      const borderWidth=2;

      const options={
        reponsive:true,
        scales:{
          y:{beginAtZero:true}
        }
      }

      grafico= new Chart(lienzo,{
        type:'bar',
        data:{
          labels:[],
          datasets:[
            {
            label:'',
            data:[],
            backgroundColor:backgroundColor,
            borderColor:borderColor,
            borderWidth:borderWidth
            }
          ]
        },//data
        options
      })//chart
    }//RenderGraphic

    btnDatos.addEventListener("click",async()=>{

      try{
        aviso.classList.remove("d-none")
        const response = await fetch("<?= base_url() ?>public/api/getdatainforme2",{method:'GET'})

        if(!response.ok){
          throw new Error('No se pudo lograr comunicación')
        }

        const data = await response.json()
        if(data.success){
          console.log(data.resumen.map(row=>row.superhero))
          console.log(data.resumen.map(row=>row.popularidad))

          //Actualizar los datos del gráfico
          grafico.data.labels=data.resumen.map(row=>row.superhero)
          grafico.data.datasets[0].data=data.resumen.map(row=>row.popularidad)

          grafico.update()

          data.resumen.forEach(element=>{
            document.querySelector("#tabla-resumen thead tr").innerHTML+=`<th>${element.superhero}</th>` 
            document.querySelector("#tabla-resumen tbody tr").innerHTML+=`<td>${element.popularidad}</td>` 
          })
        }

      }catch(error){
        console.error(error)
      }

    })
  
    renderGraphic()
    
    //Solo practica
    //practicando map
    const amigos=[
      {nombre:'Kiara',edad:21,ciudad:'chincha'},
      {nombre:'Valeria',edad:23,ciudad:'calama'},
      {nombre:'Jose',edad:21,ciudad:'chincha alta'},
      {nombre:'Cristhoper',edad:23,ciudad:'chincha alta'},
      {nombre:'Landa',edad:60,ciudad:'chincha alta'},
    ]
    //crear un arreglo con los nombres de mis amigos
    const nombres=[]

    amigos.forEach(element=>{
      nombres.push(element.nombre)
    });

    //crear un arreglo con las edades
    const edades=amigos.map(row=>row.edad)
    const ciudades=amigos.map(row=>row.ciudad)
    console.log(amigos)
    console.log(nombres)
    console.log(edades)
    console.log(ciudades)
  })
</script>
</body>
</html>