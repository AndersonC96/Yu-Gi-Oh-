<?php
    error_reporting(E_ERROR | E_PARSE);
    $paginaAtual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    $cartasPorPagina = 10;
    $inicio = ($paginaAtual - 1) * $cartasPorPagina;
    $totalDeCartas = 100;
    $totalDePaginas = ceil($totalDeCartas / $cartasPorPagina);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Yu-Gi-Oh! | Busca de Cartas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel='shortcut icon' type='image/x-icon' href='./img/favicon.ico' />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <style>
            body{
                background-color: #1a1a1a;
                color: #fff;
            }
            .navbar, .card{
                background-color: #333;
            }
            .card-img-top{
                width: 100%;
                height: auto;
                border-bottom: 5px solid gold;
            }
            .card-title{
                color: gold;
            }
            .attribute-icon{
                width: 24px;
                height: 24px;
            }
            .navbar{
                border-radius: 20px;
            }
            .nav-item img{
                height: 40px;
                width: auto;
            }
            input[type="text"]{
                border: 2px solid gold;
                border-radius: 20px;
                background-color: #333;
                color: white;
                padding: 5px 10px;
            }
            .btn-outline-success{
                border-color: gold;
                color: gold;
                border-radius: 20px;
                transition: background-color 0.3s, color 0.3s;
            }
            .btn-outline-success:hover{
                background-color: gold;
                color: #333;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">
                                <img src="./img/logo.png" alt="Home" class="img-fluid">
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input type="text" name="busca" placeholder="Buscar" style="text-align: center">
                        <button class="btn btn-outline-success" type="submit">Procurar</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    include_once './funcoes/pegaDados.php';
                    foreach(pegaDados($_GET['busca']) as $card):
                ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo $card->card_images[0]->image_url ?>" class="card-img-top" alt="<?php echo $card->name ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $card->name ?>
                                <?php
                                    if($card->attribute == 0){
                                        if($card->type == "Spell Card"){
                                            echo ' <img src="./img/spell.png" class="attribute-icon">';
                                        }elseif($card->type == "Trap Card"){
                                            echo ' <img src="./img/trap.png" class="attribute-icon">';
                                        }
                                    }else{
                                        if($card->attribute == "DARK"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/dark.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "EARTH"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/earth.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "FIRE"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/fire.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "LIGHT"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/light.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "WATER"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/water.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "WIND"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/wind.jpg" class="attribute-icon">';
                                        }elseif($card->attribute == "DIVINE"){
                                            //echo $card->attribute;
                                            echo ' <img src="./img/divine.jpg" class="attribute-icon">';
                                        }
                                    }
                                ?>
                            </h5>
                            <p class="card-text"><b>Nível</b>:
                                <?php
                                    if($card->level == 0){
                                        echo "Não tem nível";
                                    }else{
                                        echo $card->level . ' ';
                                        for($i = 0; $i < $card->level; $i++){
                                            echo '<img src="./img/level.png"> ';
                                        }
                                    }
                                ?>
                            </p>
                            <p class="card-text"><?php echo "<b>Raça</b>: ", $card->race ?> | <?php echo "<b>Tipo</b>: ", $card->type ?></p>
                            <p class="card-text"><?php echo "<b>Descrição</b>: ", $card->desc ?></p>
                            <p class="card-text">
                                <?php
                                    if($card->atk == NULL){
                                        echo "<b>ATK</b>: Não tem ataque";
                                    }else{
                                        echo "<b>ATK</b>: ", $card->atk;
                                    }
                                ?> / 
                                <?php
                                    if($card->def == NULL){
                                        echo "<b>DEF</b>: Não tem defesa";
                                    }else{
                                        echo "<b>DEF</b>: ", $card->def;
                                    }
                                ?>
                            </p>
                            <p class="card-text"><b>Arquétipo</b>:
                                <?php
                                    if($card->archetype == 0){
                                        echo "Não tem arquétipo";
                                    }else{
                                        echo $card->archetype;
                                    }
                                ?>
                            </p>
                            <p class="card-text">
                                <?php
                                    $ocg_date = $card->misc_info[0]->ocg_date;
                                    $tcg_date = $card->misc_info[0]->tcg_date;
                                    $formatted_ocg_date = date("d/m/Y", strtotime($ocg_date));
                                    $formatted_tcg_date = date("d/m/Y", strtotime($tcg_date));
                                    echo "<b>Data de Lançamento</b>: <u><i>OCG</i></u>: $formatted_ocg_date | <u><i>TCG</i></u>: $formatted_tcg_date";
                                ?>
                            </p>
                            <p class="card-text"><b>Conjuntos de cartas</b>:
                                <?php
                                    if($card->attribute == 0){
                                        echo "Não tem packs";
                                    }else{
                                        $conjuntos = '';
                                        foreach($card->card_sets as $set){
                                            $conjuntos .= $set->set_name . " (<i>" . $set->set_rarity . "</i>), ";
                                        }
                                        $conjuntos = rtrim($conjuntos, ", ");
                                        echo $conjuntos;
                                    }
                                ?>
                            </p>
                            <p class="card-text">
                                <?php echo "<b>Preços</b>: <u><i>Amazon</i></u>: U$ ", $card->card_prices[0]->amazon_price ?> <?php echo "<u><i>Cardmarket</i></u>: € ", $card->card_prices[0]->cardmarket_price ?> | <?php echo "<u><i>CoolStuffInc</i></u>: U$ ", $card->card_prices[0]->coolstuffinc_price ?> | <?php echo "<u><i>Ebay</i></u>: U$ ", $card->card_prices[0]->ebay_price ?> | <?php echo "<u><i>TCGplayer</i></u>: U$ ", $card->card_prices[0]->tcgplayer_price ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if($paginaAtual > 1): ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $paginaAtual - 1; ?>&busca=<?php echo $_GET['busca']; ?>">Anterior</a></li>
                <?php endif; ?>
                <?php for($i = 1; $i <= $totalDePaginas; $i++): ?>
                <li class="page-item <?php echo ($i == $paginaAtual) ? 'active' : ''; ?>"><a class="page-link" href="?pagina=<?php echo $i; ?>&busca=<?php echo $_GET['busca']; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <?php if($paginaAtual < $totalDePaginas): ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $paginaAtual + 1; ?>&busca=<?php echo $_GET['busca']; ?>">Próximo</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>