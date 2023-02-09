<!DOCTYPE html>
<html lang="es"  ng-app="hospitalApp">
    <head>
        <meta charset="ISO-8859-1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <title>Json con Angular</title>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <script type="text/javascript">
            BASE_URL = "<?php echo base_url(); ?>"
        </script>


    </head>
    <body>
        <div class="container" ng-controller="hospitalController">
            <br>    
            Buscar: <input type="text" ng-model="search.name_eps">
            <br><br>
            <table cellpadding="2" cellspacing="2" border="1" ng-if="infoPatients.show" ng-cloak="">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre Completo</th>
                        <th>Numero de Documento</th>
                        <th>Eps Asignada</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="patients in infoPatients.data | filter:search:strict">
                        <td>{{patients.id}}</td>
                        <td>{{patients.full_name}}</td>
                        <td style="text-align:right;">{{patients.numeroDocumento}}</td>
                        <td>{{patients.name_eps}}</td>
                    </tr>
                </tbody> 
            </table> 
            <br>
            <a href="<?php echo base_url('users'); ?>" class="btn btn-danger"style="margin-left: 401px">regresar</a>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="<?php echo base_url('resources/app/js/hospitalController.js'); ?>"></script>
        <script>
                    hospitalController.init();
        </script>
    </body>
</html>


