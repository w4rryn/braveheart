<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
if (array_key_exists("btn", $_POST)) {
    add_blog_entry($_POST["txt"]);
}
$entries = get_blog_entries();
foreach ($entries as $key => $value) {
    echo $value["content"] . $value["created_at"] . "<br>";
}
?>

<form method="post">
    <label for="txt">Blogeintrag:</label>
    <input type="text" name="txt" id="txt">
    <input type="submit" value="Absenden" name="btn">
</form>

<?php include("templates/footer.php"); ?>