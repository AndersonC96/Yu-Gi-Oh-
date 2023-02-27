<?php
    error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Yu-Gi-Oh! | Busca cartas</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel='shortcut icon' type='image/x-icon' href='./favicon.ico' />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!--<script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>-->
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary-subtle">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Yu-Gi-Oh-/index.php">Home</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                    <input type="text" name="busca" placeholder="Buscar" style="text-align: center">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    include_once './funcoes/pegaDados.php';// Função que pega os dados do banco de dados
                    foreach(pegaDados($_GET['busca']) as $card):
                ?>
                <div class="col">
                    <div class="card-deck">
                        <div class="card d-flex">
                            <img src="<?php echo $card->card_images[0]->image_url ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $card->name ?></h5>
                                <p class="card-text"><?php echo "<b>Descrição</b>: ", $card->desc ?></p>
                                <p class="card-text">
                                    <?php
                                        if($card->atk == NULL){// Verifica se o ataque existe
                                            echo "<b>ATK</b>: Não tem ataque";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra o ataque
                                            echo "<b>ATK</b>: ", $card->atk;
                                        }
                                    ?> / 
                                    <?php
                                        if($card->def == NULL){// Verifica se a defesa existe
                                            echo "<b>DEF</b>: Não tem defesa";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra a defesa
                                            echo "<b>DEF</b>: ", $card->def;
                                        }
                                    ?>
                                <p class="card-text"><?php echo "<b>Tipo</b>: ", $card->type ?></p>
                                <p class="card-text"><b>Nível</b>:
                                    <?php
                                        if($card->level == 0){// Verifica se o nível existe
                                            echo "Não tem nível";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra o nível
                                            echo $card->level;
                                            echo ' <img src="./level.png">';
                                        }
                                    ?>
                                </p>
                                <p class="card-text"><?php echo "<b>Raça</b>: ", $card->race ?></p>
                                <!--<p class="card-text"><?php echo "<b>Arquétipo</b>: ", $card->archetype ?></p>-->
                                <p class="card-text"><b>Arquétipo</b>:
                                    <?php
                                        if($card->archetype == 0){// Verifica se o arquétipo existe
                                            echo "Não tem arquétipo";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra o arquétipo
                                            echo $card->archetype;
                                        }
                                    ?>
                                </p>
                                <!--<p class="card-text"><?php echo "<b>Atributos</b>: ", $card->attribute ?></p>-->
                                <p class="card-text"><b>Atributos</b>:
                                    <?php
                                        if($card->attribute == 0){// Verifica se o atributo existe
                                            echo "Não tem atributo";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra o atributo
                                            echo $card->attribute;
                                        }
                                    ?>
                                </p>
                                <!--<p class="card-text"><?php echo "<b>Conjuntos de cartas</b>: ", $card->card_sets[0]->set_name ?> (<?php echo $card->card_sets[0]->set_rarity ?>)</p>-->
                                <p class="card-text"><b>Conjuntos de cartas</b>:
                                    <?php
                                        if($card->attribute == 0){// Verifica se o conjunto existe
                                            echo "Não tem packs";// Caso não exista, mostra a mensagem
                                        }else{// Caso exista, mostra o conjunto
                                            $conjuntos = '';
                                            foreach ($card->card_sets as $set) {
                                                $conjuntos .= $set->set_name . " (" . $set->set_rarity . "), ";
                                            }
                                            $conjuntos = rtrim($conjuntos, ", "); // Remove a última vírgula e espaço em branco
                                            echo $conjuntos;
                                        }
                                    ?>
                                </p>
                                <p class="card-text"><?php echo "<b>Preços</b>: U$ ", $card->card_prices[0]->cardmarket_price, " (Cardmarket)" ?> / <?php echo "U$ ", $card->card_prices[0]->tcgplayer_price, " (TCGplayer)" ?> / 
                                    <?php echo "U$ ", $card->card_prices[0]->ebay_price, " (Ebay)" ?> / <?php echo "U$ ", $card->card_prices[0]->coolstuffinc_price, " (CoolStuffInc)" ?> / <?php echo "U$ ", $card->card_prices[0]->amazon_price, " (Amazon)" ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;// Fim do foreach
                ?>
            </div>
        </div>
        <!--<form action="proximaPagina.php" method="POST">
            <input type="hidden" name="paginaAtual" value="0">
            <button type="submit" name="proximo">Próximo</button>
        </form>
        <form action="paginaAnterior.php" method="POST">
            <input type="hidden" name="paginaAtual" value="0">
            <button type="submit" name="proximo">Anterior</button>
        </form>-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>