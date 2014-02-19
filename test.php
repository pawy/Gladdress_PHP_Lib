<?php

include 'gladdress.php';

if(isset($_GET['gladid']))
{
    $gladdress = new GladdressProfile(urlencode($_GET['gladid']));
}

?>
<form>
    <label for="gladid">GladId: </label>
    <input type="text" name="gladid" style="width:400px">
    <input type="submit">
</form>

<? if ($gladdress =! null) : ?>

    <ul>
    <?php foreach($gladdress->getFields() as $field) : ?>
        <li>
            <?= $field ?>
        </li>
    <?php endforeach ?>
    </ul>

    <p>
        <strong>FirstName LastName: </strong><?= $gladdress->get('FirstName') ?> <?= $gladdress->get('LastName') ?>
    </p>

<? endif ?>
