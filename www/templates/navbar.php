<?php
$sites["Home"] = "index.php";
$sites["Blog"] = "blog.php";
$sites["Teilnehmer Anmelden"] = "anmelden.php";
$sites["Auswerten"] = "auswerten.php";
?>

<div class="flex-container">
    <ul class="nav">
        <?php
        foreach ($sites as $key => $path) {
            $str = "<li class=\"fade\"><a href=\"$path\">$key</a></li>";
            echo $str;
        }
        ?>
    </ul>
</div>