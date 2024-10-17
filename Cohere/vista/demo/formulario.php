<?php
include_once("../estructura/sidebar.php");
?>
<div style="height: 85vh;">
<head>
    <style>
        .cuadro {
            background-color: #a2cadf;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <main class="my-2">
        <div class="container">
            <div class="row" id="descripcion">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-15 my-3">
                            <h2 style="text-align: center;">Chat con Cohere</h2>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <div style="text-align: center;">
                                <i class="fa fa-question-circle fa-2x" aria-hidden="true"></i>
                                <h4>Ejemplos</h4>
                            </div>
                            <div class="cuadro">
                                <p>"¿Cuál es el planeta más grande?"</p>
                                <p>"¿Cómo se hace una torta?"</p>
                                <p>"¿Podrías recomendarme una película de este año?"</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="text-align: center;">
                                <i class="fa fa-lightbulb fa-2x" aria-hidden="true"></i>
                                <h4>Capacidades</h4>
                            </div>
                            <div class="cuadro">
                                <p>Capaz de generar respuestas coherentes y relevantes.</p>
                                <p>Capaz de realizar tareas específicas.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div style="text-align: center;">
                                <i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i>
                                <h4>Limitaciones</h4>
                            </div>
                            <div class="cuadro">
                                <p>Falta de comprensión contextual profunda.</p>
                                <p>Dificultad de ser creativo.</p>
                                <p>Servicio limitado.</p>
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>

                    <div class="row">
                        <form id="chat-form" action="accion.php" method="post" class="needs-validation" novalidate>
                            <div class="input-group mb-3">
                                <input id="pregunta" name="pregunta" class="form-control" type="text" placeholder="Realice una pregunta..." required pattern="^[a-zA-Z][a-zA-Z\s][\?\¡\¿\!\Á\É\Í\Ó\Ú\á\é\í\ó\ú]+*$">
                                <div class="valid-feedback">
                                    Correcto.
                                </div>
                                <div class="invalid-feedback">
                                    Ingrese una pregunta.
                                </div>
                                <input type="submit" class="btn btn-success">
                            </div>
                        </form>
                        <script src= "../js/FuncionesJava.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>



<?php
include_once("../estructura/footer.php");
?>