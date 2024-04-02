<?php
    function pegaDados($busca){//Função para pegar dados do banco de dados
        /*$conexao = mysqli_connect("localhost", "root", "", "yugioh");
        $sql = "SELECT * FROM cartas WHERE nome = '$busca'";
        $resultado = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($resultado);
        return $dados;*/
        $api_url = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=pt&fname=$busca&startdate=1000-01-01&enddate=3000-12-31&num=60&offset=0";//URL da API
        //$api_url = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=pt&fname=$busca&startdate=1000-01-01&enddate=3000-12-31";
        $json_data = file_get_contents($api_url);//Pega os dados da API
        $response_data = json_decode($json_data);//Decodifica os dados da API
        $cards = $response_data->data;//Pega os dados da API
        return $cards;//Retorna os dados da API
    }
?>