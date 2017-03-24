<?php
//$columns = $database->query("Show columns from bla");
$columns = array("name", "adres", "huisnummer", "postcode");

$currentItem["id"] = 1;
?>
<form method="post" action="procces.php" class="form">
    <?php
    foreach ($columns as $column) {
        echo
        '<div class="form-item">
            <label for="' . $column . '">' . $column . '</label>
            <input type="text" name="' . $column . '"/>
        </div>';
    }
    ?>
    <div class="form-item">
        <input type="submit" value="Bijwerken"/>
    </div>
</form>
<div class="holder">
    <div class="previous"> < </div>
    <div class="current"><?php echo $currentItem["id"]; ?></div>
    <div class="next"> > </div>
</div>
