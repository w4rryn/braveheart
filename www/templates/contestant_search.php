<?php
$results = "";
if (!empty($_POST["search-contestant"])) {
    require_once "scripts/db_access.php";
    require_once "scripts/create_result_table.php";
    $num = $_POST["num"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $filters = [];
    if ($num != "") {
        array_push($filters, "id = '$num'");
    }
    if ($surname != "") {
        array_push($filters, "surname like '$surname'");
    }
    if ($name != "") {
        array_push($filters, "name like '$name'");
    }
    $filter = join(" AND ", $filters);
    $results = create_result_table($filter, "", $conn);
}
?>

<form method="post">
    <h1>Teilnehmer suchen</h1>
    <label for="num">Startnummer:</label>
    <input type="text" name="num" id="num">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <label for="surname">Nachname:</label>
    <input type="text" name="surname" id="surname">
    <input type="submit" value="Suchen" name="search-contestant">
    <?php
    echo $results;
    ?>
</form>