<?php
    include_once 'includes/survey.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Encuesta</title>
</head>
<body>
    <form action="#" method="POST">
        <?php
            $survey = new Survey();
            $showResults = false; // muestra vista para votar 

            if(isset($_POST['lenguaje'])){
                $showResults = true; // mustra vista resultados 
                $survey->setOptionSelected($_POST['lenguaje']);
                $survey->vote();
            }

        ?>
        <h2>�Cu�l es tu lenguaje de programaci�n favorito?</h2>
        <?php

            if($showResults){
                $lenguajes = $survey->showResults();

                echo '<h2>' . $survey->getTotalVotes() . ' votos totales</h2>';

                foreach($lenguajes as $lenguaje){
                    $porcentaje = $survey->getPercentageVotes($lenguaje['votos']);

                    include 'vistas/vista-resultados.php';
                }

            }else{
                include 'vistas/vista-votacion.php';
            }
        ?>

    </form>

</body>
</html>