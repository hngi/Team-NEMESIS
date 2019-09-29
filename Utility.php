<?php

function console_log()
{
    $items = func_get_args();
    foreach ($items as $item) {
        $item = json_encode($item);
        echo "<script>console.log(${item});</script>";
    }
}
