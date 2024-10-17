<?php
include_once("../estructura/sidebar.php");
?>
<div class="d-flex flex-column w-100 h-100">
    <div class="flex-fill d-flex flex-column justify-content-center align-items-center text-black">
        <h3 class="text-center">Información sobre AI | Text-Generator</h3>
        <p class="text-center mt-2">En primer lugar, la idea era usar un text-generator para la creación de un chat interactivo, se averiguó primero por <a href="https://projects.haykranen.nl/markov/demo/" target="blank">Markov chain generator.</a> Esta librería consta de un aprendizaje que el usuario le tiene que dar, alimentar de alguna manera, ya sea libros, guiones de peliculas, etc. Y su respuesta era algo variada, a veces muy acertada, otras sin tanto sentido.</p>
        <p class="text-center mt-2">La segunda opción fue la API Reference de OpenAI, adjunto ejemplo <a href="https://platform.openai.com/docs/guides/text-generation"target="blank">Guía completa</a>. </p>
        <p class="text-center mt-2">Esta era y nos parece la mejor opción, es la más completa, sus servicios son de excelente calidad, sin embargo tanto OpenAI y otras APIs no son gratis, constan de una suscripción para su total uso sin límites.</p>
        <p class="text-center mt-2">Su implementación es sencilla, su página web nos ofrece una guía de cómo implementarlo en nuestro proyecto. Si bien nos da el código, este no se encuentra en lenguaje PHP, nos dan un cURL, <a href="https://platform.openai.com/docs/api-reference/chat/create" target="blank">Chat de OpenAI.</a></p>
            <div class="bg-secondary ">
            <pre><code class="language-bash text-white p-3">
            curl https://api.openai.com/v1/chat/completions \
            -H "Content-Type: application/json" \
            -H "Authorization: Bearer $OPENAI_API_KEY" \
            -d '{
                "model": "gpt-4o",
                "messages": [
                {
                    "role": "system",
                    "content": "You are a helpful assistant."
                },
                {
                    "role": "user",
                    "content": "Hello!"
                }
                ]
            }'
        </code></pre>
            </div>
        <p class="text-center mt-2">Ahora, ¿Qué es cURL?</p>
        <p class="text-center mt-2">El nombre viene de "Client URL". Es una línea de comandos que nos permite la conexión cliente-servidor, generalmente usada para realizar solicitudes GET o POST a una URL, enviar datos en formato JSON o formularios, nos es realmente util para conectarnos con el servidor de OpenAI por ejemplo. Existen varias páginas web que su única función es traducir un código cURL a otros lenguajes, como PHP en nuestro caso, nosotros usamos <a href="https://curlconverter.com/php/" target="blank">https://curlconverter.com/php/</a>.</p>
        <p class="text-center mt-2">Ahora que tenemos nuestro código en PHP, se implementa directamente en nuestro proyecto. Solo nos falta cambiar la variable $OPENAI_API_KEY" por una key que nos provee la misma página de la API. Para más información visita la <a href="../guia/index.php">Guia de instalación</a>.</p>
    </div>

        <div class="flex-fill d-flex justify-content-center align-items-center text-black">
        <div class="col-md-4">
                <div class="list-group text-center">
                <div class="alert alert-dark" role="alert">
                    <small><a href="../demo/formulario.php">Text-Generator (Demo)</a></small>
                    </div>
                    </div>
                </div>
                <div class="col-md-4">
                <div class="list-group text-center">
                <div class="alert alert-dark" role="alert">
                    <small><a href="../guia/index.php">Guía de instalación</a></small>
                    </div>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="list-group text-center">
                <div class="alert alert-dark" role="alert">
                    <small><a href="../info/index.php">Saber más</a></small>
                    </div>
                    </div>
            </div>
        </div>
    </div>
<?php
include_once("../estructura/footer.php");
?>