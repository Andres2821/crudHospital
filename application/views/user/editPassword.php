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
        
        
        <title>Editar Contraseña Paciente</title>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5">Editar la contraseña del paciente: <?= $data['full_name']; ?></h1>
            <form action="<?php echo base_url('userP/updatePassword/'.$data['id']); ?>" class="mt-4" method="POST">
                <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contraseña</label>
                                <input type="password" name="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Contraseña" value="<?php echo set_value('password'); ?>">
                                <div class="invalid-feedback">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Repite la contraseña</label>
                                <input type="password" name="repeatpassword" class="form-control <?php echo form_error('repeatpassword') ? 'is-invalid' : ''; ?>" placeholder="Contraseña" value="">
                                <div class="invalid-feedback">
                                    <?php echo form_error('repeatpassword'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>

                        <div class="col-lg-6">
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger" style="margin-left: 369px;">regresar</a>
                            <button type="submit" class="btn btn-primary" style="float:right;">Guardar</button>
                        </div>

                </div>
            </form>
        </div>
    </body>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script></script>
</html>



