<?php
    $api_url = 'https://db.ygoprodeck.com/api/v7/cardinfo.php?num=50&offset=0';//api url
    $json_data = file_get_contents($api_url);// obter dados da API
    $response_data = json_decode($json_data);// decodificar dados da API
    $user_data = $response_data->data;// obter dados da API
?>
<pre>
    <?php
        var_dump($user_data)// imprimir dados da API
    ?>
</pre>