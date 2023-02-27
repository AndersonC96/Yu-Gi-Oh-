<?php
    $paginaAtual = $_POST['paginaAtual'];
    $numResultadosPorPagina = 20;
    $busca = $_POST['busca'];
    $offset = ($paginaAtual - 1) * $numResultadosPorPagina;
    $urlAPI = "https://db.ygoprodeck.com/api/v7/cardinfo.php?language=pt&fname=$busca&num={$numResultadosPorPagina}&offset=$offset";
    header("Location: {$urlAPI}");
    exit();
?>