<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Roboto CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <style>body{font-family:"Roboto" !important;}</style>

    <title>Lista de Pacientes</title>
  </head>
  <body>
    <div class="container">
        <h1 class="mt-5">Lista de Pacientes</h1>
        <div class="text-right">
        <a href="<?php echo base_url('newUser');?>" class="btn btn-info" title="Agregar nuevo paciente"><ion-icon name="person-add"></ion-icon></a>
        <a href="<?php echo base_url('consultar');?>" class="btn btn-info" title="Consultar"><ion-icon name="search"></ion-icon></a>
        </div>
        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Email</th>
                <th scope="col">Numero Documento</th>
                <th scope="col">Eps asignada</th>
                <th scope="col">Opciones</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $number=1; foreach($data as $key=> $value):?>
                <tr>
                    <th scope="row"><?php echo $number++; ?></th>
                    <td><?php echo $value['full_name']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['numeroDocumento']; ?></td>
                    <td><?php echo $value['name_eps']; ?></td>
                    <td>
                        <a href="<?php echo base_url('user/delete/'.$value['id']); ?>" class="btn btn-danger"title="Eliminar"style="float:right"><ion-icon name="trash-sharp" title="Eliminar"></ion-icon></a>
                        <a href="<?php echo base_url('user/'.$value['id']); ?>" class="btn btn-primary"style="float:right"><ion-icon name="pencil" title="Editar"></ion-icon></a> 
                        <a href="<?php echo base_url('userP/updatePassword/'.$value['id']); ?>" class="btn btn-warning"style="float:right"><ion-icon name="key-outline" title="Actulizar Contraseña"></ion-icon></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>        
        </table>
        <a href="<?php echo base_url('module'); ?>" class="btn btn-danger" style="margin-left: 986px">regresar</a>
        </div>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <script src="angular.min.js"></script>
    <script>
         <?php if ($this->session->flashdata('success')):?>
           Swal.fire({
              icon: 'success',
              title: 'Good...',
              text: '<?php echo $this->session->flashdata('success');?>',
            });  
         <?php endif; ?>   
    </script>
  </body>
</html>