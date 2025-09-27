<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center mt-5">Ejercicio 1 - PDF</h2>

    <form action="">
        <div class="container mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" id="titulo" name="titulo" class="form-control">
                                <label for="titulo">Ingrese Titulo</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 ms-5">
                        <div class="col-md-4">
                            <input type="checkbox" id="masculino" name="masculino">
                            <label for="masculino">Masculino</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="femenino" name="femenino">
                            <label for="femenino">Femenino</label>
                        </div>
                        <div class="col-md-4">
                            <input type="checkbox" id="na" name="na">
                            <label for="na">NA</label>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" name="limite" id="limite" max="200" min="10" class="form-control">
                                <label for="limite">Limite</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-danger">PDF</button>
                </div>
            </div>
        </div>
    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>