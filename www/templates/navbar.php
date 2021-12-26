<?php
$sites["Home"] = "index.php";
$sites["Blog"] = "blog.php";
$sites["Teilnehmer Anmelden"] = "anmelden.php";
$sites["Auswerten"] = "auswerten.php";
?>

<div class="nav-container">
    <ul class="nav">
        <?php
        global $current_page;
        foreach ($sites as $key => $path) {
            $str = "<li><a class=\"fade\" href=\"$path\">$key</a></li>";
            echo $str;
        }
        ?>
    </ul>
</div>