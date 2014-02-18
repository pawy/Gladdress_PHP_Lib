<?php

include 'gladdress.php';

if(isset($_GET['gladid']))
{
    $gladdress = new Gladdress(urlencode($_GET['gladid']));
}

?>
<form>
    <label for="gladid">GladId: </label>
    <input type="text" name="gladid" style="width:400px">
    <input type="submit">
</form>

<? if ($gladdress != null) : ?>
    <p>
        <strong>FirstName LastName: </strong><?= $gladdress->get('FirstName') ?> <?= $gladdress->get('LastName') ?>
    </p>
<? endif ?>
