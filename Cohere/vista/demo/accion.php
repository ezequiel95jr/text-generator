<?php
include_once("../estructura/sidebar.php");
$datos = data_submitted();
$consulta = $datos['pregunta'];

$cohereChat = new CohereChat();
$response = $cohereChat->obtenerRespuesta($consulta);
?>

<main class="my-2">
    <div class="container">
        <div class="row" id="descripcion">
            <div class="container-fluid">
                <div class="container d-flex justify-content-center align-items-center bg-light">
                    <div class="col-md-6 col-lg-8">
                        <div class="alert alert-primary" role="alert">
                            <div class="mb-3">
                                <ul class="list-group list-group-flush">  
                                    <?php echo "<div><i class='fa fa-user' aria-hidden='true'></i><b> Usuario</b></div>".$consulta;?>          
                                </ul>
                            </div>
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <div class="mb-3">
                                <ul class="list-group list-group-flush">
                                    <?php echo "<div><i class='fa fa-user-secret' aria-hidden='true'></i><b> Bot</b></div>".$response;?>
                                </ul>
                            </div>
                        </div>
                        <a href="formulario.php"><button class="btn btn-outline-secondary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver a Preguntar</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include_once("../estructura/footer.php");
?>