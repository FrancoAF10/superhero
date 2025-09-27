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

    <form action="">
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row ms-5">
                        <?php foreach($publisher_name as $publisher) : ?>
                            <div class="col-md-4">
                                <input type="checkbox" name="publisher[]" value="<?=$publisher['publisher_name']?>" id="publisher_<?=$publisher['id']?>">
                                <label for="publisher_<?=$publisher['id']?>"><?= $publisher['publisher_name'] ?></label>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-danger w-50">Generar</button>
                </div>
            </div>
        </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>