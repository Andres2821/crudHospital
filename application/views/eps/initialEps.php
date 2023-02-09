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

    <title>Eps</title>
  </head>
  <body>

    <div class="container">
        <h1 class="mt-5">Lista de las Eps</h1>
        <div class="text-right">
            <a href="<?php echo base_url('newEps');?>" class="btn btn-info"><ion-icon name="add"></ion-icon></a>
        </div>
        <table class="table mt-4">
            <thead class="thead-light">
                <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre de la Eps</th>
                <th scope="col">Email</th>
                <th scope="col">Direccion</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key=> $value):?>
                <tr>
                    <th scope="row"><?php echo $value['id']; ?></th>
                    <td><?php echo $value['name_eps']; ?></td>
                    <td><?php echo $value['email']; ?></td>
                    <td><?php echo $value['direction']; ?></td>
                    <td>
                        <a href="<?php echo base_url('eps/'.$value['id']); ?>" class="btn btn-primary" style="margin-left: 360px"><ion-icon name="pencil"></ion-icon></a> 
                        <a href="<?php echo base_url('eps/delete/'.$value['id']); ?>" class="btn btn-danger"style="float:right"><ion-icon name="trash-sharp"></ion-icon></a>
                    </td>
                </tr>
                <tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <a href="<?php echo base_url('module'); ?>" class="btn btn-danger" style="margin-left: 1017px">regresar</a>
    </div>

    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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