<?php

namespace MyApp\Resources\View;

require '../../../vendor/autoload.php';

use MyApp\Services\Player;
use SplFixedArray;

    $array  = new SplFixedArray(2);
    $player = new Player();

    $array[0] = 'Rise';
    $array[1] = 'Good to me';

    $array->setSize(4);

    $array[2] = 'Devotion';
    $array[3] = 'Way Maker';

    include('./template/header.php')
?>

<article>
    <main>
        <h1>Ex-1</h1>
        <p>
            <?php
                $player->includeMusics($array);
                $player->addMusic('Wash by the water');
                $player->addMusicInFirstPosition('First position music');
                $player->listMusics();
                $player->removeMusicOfFirstPosition();
                $player->removeMusicOfLastPosition();

                echo "-------------------------------" . "<br>";
                echo "Music removed of last position." . "<br>";

                $player->listMusics();
            ?>
        </p>
    </main>
</article>
<?php include('./template/footer.php') ?>
