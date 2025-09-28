<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <h2 class="text-center mt-5">EJERCICIO 2 - GRAFICO 1</h2>

    <form action="" method="POST">
        <div class="container mt-3">
            <div class="row">
                <div class="col md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($publisher_name as $publisher) : ?>
                                    <div class="col-md-4">
                                        <input type="checkbox" name="publisher_id[]" value="<?=$publisher['id']?>" id="publisher_<?=$publisher['id']?>">
                                        <label for="publisher_<?=$publisher['id']?>"><?= $publisher['publisher_name'] ?></label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-danger w-50" id="generar">Generar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas id="lienzo"></canvas>
                </div>
            </div>
        </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


<script>
  const lienzo = document.getElementById("lienzo")
  const btnGenerar = document.getElementById("generar")
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
            align: 'top',
            color: 'black',
            font: {
            weight: 'bold'
            },
            formatter:(value)=>value
        }
    }
  }

  function renderGraphic(){
    grafico=new Chart(lienzo,{
        type:'bar',
        data:{
            labels:[],
            datasets:[{
                label:'',
                data:[]
            }]
        },//data
        options,
        plugins: [ChartDataLabels]
    })// new chart
  }//function renderGraphic

btnGenerar.addEventListener("click",async()=>{
    const checkboxes = document.querySelectorAll('input[name="publisher_id[]"]:checked');
    const publisher_id = Array.from(checkboxes).map(checkbox => checkbox.value);

    try{
        const response=await fetch('<?=base_url()?>public/api/getgrafico1',{
            method:'POST',
            headers:{'Content-Type':'application/json'},
            body: JSON.stringify({ publisher_id: publisher_id })
        })

        if(!response.ok){
            throw new Error('No se pudo conectar al servidor')
        }

        const data= await response.json()

        if(data.success){
            if (!grafico) {
                renderGraphic()
            }
            grafico.data.labels=data.resumen.map(row=>row.publisher_name)
            grafico.data.datasets[0].data=data.resumen.map(row=>row.Total)
            grafico.data.datasets[0].label=data.message
            grafico.update()
        }
    }catch(error){
        console.log(error)
    }

})
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>