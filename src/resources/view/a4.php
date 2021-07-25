<?php

namespace MyApp\Resources\View;

require '../../../vendor/autoload.php';

use MyApp\Services\Music;
use MyApp\Services\Player;
use SplFixedArray;

    $player = new Player();
    $array  = new SplFixedArray(4);

    $array[0] = new Music('Rise');
    $array[1] = new Music('Good to me');
    $array[2] = new Music('Devotion');
    $array[3] = new Music('Way Maker');
    $array[3] = new Music('Psalm');

    $player->includeMusics($array);

    include('./template/header.php')
?>

<article>
    <main>
        <h1>Ex-4</h1>
        <p>
            <?php
                $player->playMusic();
                $player->skipMusic();

                $player->playMusic();
                $player->playMusic();
                $player->playMusic();

                $player->skipMusic();

                $player->playMusic();
                $player->playMusic();
                $player->playMusic();
                $player->playMusic();
                $player->playMusic();

                $player->skipMusic();

                $player->playMusic();
                $player->playMusic();

                echo "------------------------------" . "<br>";

                $player->ranking();
            ?>
        </p>
    </main>
</article>
<?php include('./template/footer.php') ?>
