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

        <title>Nuevo Paciente</title>
    </head>
    <body>

        <div class="container">
            <h1 class="mt-5">Nuevo Paciente</h1>
            <form action="<?php echo base_url('newUser/save'); ?>" class="mt-4" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Completo</label>
                            <input type="text" name="fullName" class="form-control <?php echo form_error('fullName') ? 'is-invalid' : ''; ?>" placeholder="Nombre completo" value="<?php echo set_value('fullName'); ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('fullName'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : ''; ?>" placeholder="Correo eléctronico" value="<?php echo set_value('email'); ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Numero Documento</label>
                            <input type="text" name="numeroDocumento" class="form-control <?php echo form_error('numeroDocumento') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Numero Documento" value="<?php echo set_value('numeroDocumento'); ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('numeroDocumento'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Eps Asignada</label>
                           <select type="text" name="eps_assigned" class="form-control <?php echo form_error('eps_assigned') ? 'is-invalid' : ''; ?>" aria-describedby="emailHelp" placeholder="Eps Asignada" value="<?= $data['eps_assigned']; ?>">
                                <option> Seleccione la Eps asignada</option>
                                <?php foreach ($listEps as $eps) { ?> 
                                    <option value="<?php echo ($eps['id']); ?>">
                                        <?php echo $eps['name_eps']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo form_error('eps_assigned'); ?>
                            </div>
                        </div>

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
                        <!-- Botones Guardar y Regresar -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="float:right;">Guardar</button>
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger" style="margin-left: 360px ">regresar</a>

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