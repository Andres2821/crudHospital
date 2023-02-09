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


        <title>Editar Paciente</title>
    </head>
    <body>
        <div class="container">
            <h1 class="mt-5">Editar los datos del paciente: <?= $data['full_name']; ?></h1>
            <form action="<?php echo base_url('user/update/' . $data['id']); ?>" class="mt-4" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Completo</label>
                            <input type="text" name="fullName" class="form-control <?php echo form_error('fullName') ? 'is-invalid' : ''; ?>" placeholder="Nombre completo" value="<?= $data['full_name']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('fullName'); ?>
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
                            <label for="exampleInputEmail1">Documento</label>
                            <input type="text" name="numeroDocumento" class="form-control <?php echo form_error('numeroDocumento') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Numero Documento" value="<?= $data['numeroDocumento']; ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('numeroDocumento'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Eps Asignada</label>
                            <select type="text" name="eps_assigned" class="form-control <?php echo form_error('eps_assigned') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Eps Asignada" value="<?= $data['eps_assigned']; ?>">
                                <option value="0">Seleccione la Eps Asignada</option>
                                <?php foreach ($listEps as $eps) { ?> 
                                    <option value="<?php echo ($eps['id']); ?>" <?= $eps['id'] == $data['eps_assigned'] ? 'selected' : ''; ?>>
                                        <?php echo $eps['name_eps']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('eps_assigned'); ?>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" style="float:right;">Guardar</button>
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger" style="margin-left: 360px">regresar</a>
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



