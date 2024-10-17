<?php include_once("../estructura/sidebar.php");?>
<div class="d-flex flex-column w-100 h-100">
    <div class="flex-fill d-flex flex-column justify-content-center align-items-center text-black">
        <h3 class="text-center">Guía de instalación | Text-Generator from <a href="https://coral.cohere.com/">Cohere</a></h3>
        <p class="text-center mt-2">Finalmente elegímos la API de Cohere, que también es un servicio que nos da funcionalidad limitada. Asi que para su implementación vamos a utilizar los documentos, los code que vamos a traducir a PHP ya que se encuentra solo en Java, Phayton y JavaScript.</p>
        <p class="text-center mt-2">Code Original en JavaScript</p>
        <div class="bg-secondary ">
            <pre><code class="language-bash text-white p-3">
            const { CohereClientV2 } = require('cohere-ai');

            const cohere = new CohereClientV2({
            token: '<<apiKey>>',
            });

            (async () => {
            const response = await cohere.chat({
                model: 'command-r-plus',
                messages: [
                {
                    role: 'user',
                    content: 'hello world!',
                },
                ],
            });

            console.log(response);
            })();
            </code></pre>
        </div>
        <p clss="text-center mt-2">Si bien, se podria crear un archivo.js con este code que retorne la respuesta, en este caso vamos a realizar la traducción a PHP.</p>
        <p class="text-center mt-2">Su traduccion literal a PHP es la siguiente</p>
        <pre><code class="language-bash text-black p-3">
            $cohereClient = new CohereClientV2([
                'token' => '<<apiKey>>',
            ]);

            (async function() use ($cohereClient) {
                $response = await $cohereClient->chat([
                    'model' => 'command-r-plus',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => 'hello world!',
                        ],
                    ],
                ]);

                echo $response;
            })();
            </code></pre>
            <p class="text-center mt-2">Una vez en nuestro lenguaje, vamos a tener algunas cosas en cuenta. Primero, como estaba en JavaScript (usando Node.js) vamos a usar la API de Cohere mediante solicitudes HTTP, ya que PHP no tiene un cliente oficial para Cohere como en el código de JavaScript.</p>
            <p class="text-center mt-2">Sin embargo, como habiamos mencionado, necesitamos de una conexión con los servidores de Cohere, para ello usamos cURL. Estableciendo una variable $url = 'https://api.cohere.ai/v2/chat'.</p>
            <p class="text-center mt-2">La Key de la API es muy importante, esta es única e irrepetible, la obtenemos en nuestro perfil de cuenta en la página.</p>
            <h3 class="text-center">Adaptación al proyecto</h3>
            <br>
            <p class="text-center mt-2">Nosotros decidimos utilizar clases para seguir el modalidad de la materia, el codigo de por si se puede usar pero nos pareció mejor adaptarlo. Para ello, creamos una clase CohereChat que dentro tiene toda la estructura, una function obtenerRespuesta($consulta) donde $consulta es la consulta que le llega desde el formulario. Esta función realiza la conexión con los servidores codificando a JSON nuestra consulta y mandandola, espera la respuesta y vuelve a decodificar el resultado, obteniendo una respuesta que retornamos para ser enviada mendiante el llamado a la funcion habiendo creado el objeto previamente para mostrarlo como un string.</p>
            <br>
            <p>Les dejamos nuestra implementación final de la API, con todas las modificaciónes.</p>
            <pre><code class="language-bash text-black p-3">
                        class CohereChat
            {
                // clave API
                private $apiKey;
                // URL de la API
                private $url;

                public function __construct()
                {   
                    $this->apiKey = 'n3GPwiSmERTXzoW17hQaE5X2Gpks22NNnjclKGeM';
                    $this->url = 'https://api.cohere.ai/v2/chat';
                }

                public function obtenerRespuesta($consulta)
                {
                    // El cuerpo de la solicitud
                    $data = [
                        'model' => 'command-r-plus',
                        'messages' => [
                            [
                                'role' => 'user',
                                'content' => $consulta
                            ]
                        ]
                    ];

                    //cURL
                    $ch = curl_init($this->url);

                    // Configuracion cURL
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        'Authorization: Bearer ' . $this->apiKey,  //Clave API
                        'Content-Type: application/json'
                    ]);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // encode JSON

                    $response = curl_exec($ch);

                    if (curl_errno($ch)) {
                        return 'Error: ' . curl_error($ch);
                    }

                    // cerramos la conexión de cURL para no consumir demás
                    curl_close($ch);

                    // decode JSON
                    $responseData = json_decode($response, true);
                    $mensaje = "";
                    // acá entramos dentro de $responseData porque mostrarlo así solo muestra mucha información que no necesitamos
                    if (isset($responseData['message']['content'][0]['text'])) {
                        $mensaje = $responseData['message']['content'][0]['text'];
                    } else {
                        $mensaje = 'No se encontró la respuesta en el formato esperado.';
                    }
                    return $mensaje;
                }
            }
            </code></pre>
            <h4 class="text-center">Gracias por su atención.</h4>
    </div>
</div>
<?php
include_once("../estructura/footer.php");
?>