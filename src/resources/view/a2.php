<?php

namespace MyApp\Resources\View;

require '../../../vendor/autoload.php';

use MyApp\Services\Music;
use MyApp\Services\Player;
use SplFixedArray;

    $array  = new SplFixedArray(4);
    $player = new Player();

    $array[0] = new Music('Rise');
    $array[1] = new Music('Good to me');
    $array[2] = new Music('Devotion');
    $array[3] = new Music('Way Maker');
    $array[3] = new Music('Psalm');

    include('./template/header.php')
?>

<article>
    <main>
        <h1>Ex-2</h1>
        <p>
            <?php
                $player->includeMusics($array);
                $player->playMusic();
                $player->skipMusic();
                $player->playMusic();
                $player->skipMusic();
                $player->skipMusic();
                $player->playLastMusic();
            ?>
        </p>
    </main>
</article>
<?php include('./template/footer.php') ?>
