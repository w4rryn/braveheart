<?php
require_once "scripts/db_access.php";
$time_entry_error = "";
if (!empty($_POST["time_entry"])) {
    $hour = $_POST["hour"];
    $min = $_POST["minutes"];
    $sec = $_POST["seconds"];
    $id = $_POST["contestant"];
    if (empty($_POST["hour"])) {
        $hour = 0;
    }
    if (empty($_POST["minutes"])) {
        $min = 0;
    }
    if (empty($_POST["seconds"])) {
        $sec = 0;
    }
    $result = set_time($id, $hour, $min, $sec, $conn);
    if ($result != null) {
        $time_entry_error = $result;
    }
}
?>

<form method="post">
    <h1>Zeit eintragen</h1>
    <label for="contestant-id">Startnummer:</label>
    <input type="number" name="contestant" id="contestant-id">
    <br>
    <input type="number" name="hour" id="h">
    <label for="h">h</label>
    <input type="number" name="minutes" id="min">
    <label for="min">min</label>
    <input type="number" name="seconds" id="sec">
    <label for="sec">sek</label>
    <input type="submit" value="Ok" , name="time_entry">
</form>
<span class=" input-err"><?php echo $time_entry_error; ?></span>