<?

function dump($var, $all = false) {
    global $USER;
    if (($USER->isAdmin()) || ($all == true)):?>
        <pre><? print_r($var); ?></pre> <? endif;
}

?>