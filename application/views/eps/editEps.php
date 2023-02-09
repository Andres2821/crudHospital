<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <style>body{font-family:"Roboto" !important;}</style>
        
        
        <title>Editar Eps</title>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5">Editar los datos de la Eps: <?= $data['name_eps']; ?></h1>
            <form action="<?php echo base_url('eps/update/'.$data['id']); ?>" class="mt-4" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Completo</label>
                            <input type="text" name="name_eps" class="form-control <?php echo form_error('name_eps') ? 'is-invalid' : ''; ?>" placeholder="Nombre De la Eps" value="<?= $data['name_eps']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('name_eps'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Correo eléctronico" value="<?= $data['email']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Direccion</label>
                            <input type="text" name="direction" class="form-control <?php echo form_error('direction') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Direccion" value="<?= $data['direction']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('direction'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="float:right;">Guardar</button>
                            <a href="<?php echo base_url('epss')?>" class="btn btn-danger"style="margin-left: 360px">regresar</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script></script>
</html>