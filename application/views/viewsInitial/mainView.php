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

        <title>Welcome</title>
    </head>
    <body>

        <div class="container-sm">

            <h1 class="mt-5 ">Bienvenidos</h1>
            <div class="text-right">
            </div>
            <table class="table mt-6">
                <tr>
                <th scope="col">Modulo Pacientes</th>
                <th scope="col">Modulo Eps</th>
                <th scope="col"></th>
                </tr>
                <tbody>
                    <tr>
                        <td>
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-warning margin-left">Pacientes <ion-icon name="person"></ion-icon></a>
                            <a href="<?php echo base_url('epss'); ?>" class="btn btn-primary"style="float: right">Eps <ion-icon name="medkit"></ion-icon></a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </body>
</html>