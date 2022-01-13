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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                    include_once './funcoes/pegaDados.php';// Função que pega os dados do banco de dados
                    foreach(pegaDados($_GET['busca']) as $card):
                ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php echo $card->card_images[0]->image_url ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $card->name ?></h5>
                            <p class="card-text"><?php echo "<b>Descrição</b>: ", $card->desc ?></p>
                            <p class="card-text"><?php echo "<b>ATK</b>: ", $card->atk ?? '' ?> / <?php echo "<b>DEF</b>: ", $card->def ?? '' ?></p>
                            <p class="card-text"><?php echo "<b>Tipo</b>: ", $card->type ?></p>
                            <p class="card-text"><b>Nível</b>:
                                <?php
                                    if($card->level == 0){// Verifica se o nível existe
                                        echo "Não tem nível";// Caso não exista, mostra a mensagem
                                    }else{// Caso exista, mostra o nível
                                        echo $card->level;
                                    }
                                ?>
                                <span id="nivel">
                                    <img src="./level.png">
                                </span>
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
                                        echo $card->card_sets[0]->set_name . " (" . $card->card_sets[0]->set_rarity . ")";
                                    }
                                ?>
                            </p>
                            <p class="card-text"><?php echo "<b>Preços</b>: U$ ", $card->card_prices[0]->cardmarket_price, " (Cardmarket)" ?> / <?php echo "U$ ", $card->card_prices[0]->tcgplayer_price, " (TCGplayer)" ?> / 
                                <?php echo "U$ ", $card->card_prices[0]->ebay_price, " (Ebay)" ?> / <?php echo "U$ ", $card->card_prices[0]->coolstuffinc_price, " (CoolStuffInc)" ?> / <?php echo "U$ ", $card->card_prices[0]->amazon_price, " (Amazon)" ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;// Fim do foreach
                ?>
            </div>
        </div>
    </body>
</html>