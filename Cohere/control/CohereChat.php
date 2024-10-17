<?php

class CohereChat
{

    private $apiKey;
    private $url;

    public function __construct()
    {   
        $this->apiKey = 'n3GPwiSmERTXzoW17hQaE5X2Gpks22NNnjclKGeM';
        $this->url = 'https://api.cohere.ai/v2/chat';
    }

    public function obtenerRespuesta($consulta)
    {
        $data = [
            'model' => 'command-r-plus',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $consulta
                ]
            ]
        ];
        // inicio cURL
        $ch = curl_init($this->url);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->apiKey, 
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // encode JSON

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        // decode JSON
        $responseData = json_decode($response, true);
        $mensaje = "";
        if (isset($responseData['message']['content'][0]['text'])) {
            $mensaje = $responseData['message']['content'][0]['text'];
        } else {
            $mensaje = 'No se encontró la respuesta en el formato esperado.';
        }
        return $mensaje;
    }
}
?>



