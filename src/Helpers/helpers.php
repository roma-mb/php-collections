<?php

function dd(...$parameter): void
{
    echo '<pre>';
    var_dump($parameter);
    die();
    echo '</pre>';
}
