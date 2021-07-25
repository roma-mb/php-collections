<?php

namespace MyApp\Resources\View;

require '../../../vendor/autoload.php';

use MyApp\Services\Album;
use MyApp\Services\Music;
use SplFixedArray;
use SplObjectStorage;

    $albuns = new SplObjectStorage();
    $godIsAble  = new Album('God Is Able');
    $zion       = new Album('Zion');

    $albuns->attach($godIsAble);
    $albuns->attach($zion);

    $musicsGodIsAble    = new SplFixedArray(2);
    $musicsGodIsAble[0] = new Music('Rise');
    $musicsGodIsAble[1] = new Music('With Us');

    $musicsZion    = new SplFixedArray(2);
    $musicsZion[0] = new Music('Oceans');
    $musicsZion[1] = new Music('Love Is War');

    $albuns[$godIsAble] = $musicsGodIsAble;
    $albuns[$zion]      = $musicsZion;

    include('./template/header.php')
?>

<article>
    <main>
        <h1>Ex-5</h1>
        <p>
            <?php
            foreach ($albuns as $album) {
                echo "Album: " . $album->getName() . "</br>";

                foreach ($albuns[$album] as $music) {
                    echo "Mucic: " . $music->getName() . "</br>";
                }

                echo "</br>";
            }
            ?>
        </p>
    </main>
</article>
<?php include('./template/footer.php') ?>
