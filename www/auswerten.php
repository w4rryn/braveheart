<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
?>

<?php
$filter = null;
if (!empty($_POST["btn"])) {
    $course = "";
    $age = "";
    $gender = "";
    if (!empty($_POST["course"])) {
        $course = $_POST["course"];
    }
    if (!empty($_POST["age"])) {
        $age = $_POST["age"];
    }
    if (!empty($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
    if ($course != "empty") {
        if ($filter == null) {
            $filter = "course='$course'";
        } else {
            $filter = "$filter AND course='$course'";
        }
    }
    if ($age != "empty") {
        if ($filter == null) {
            $filter = "age_range='$age'";
        } else {
            $filter = "$filter AND age_range='$age'";
        }
    }
    if ($gender != "empty") {
        if ($filter == null) {
            $filter = "gender='$gender'";
        } else {
            $filter = "$filter AND gender='$gender'";
        }
    }
    if ($course == "empty" && $age == "empty" && $gender == "empty") {
        $filter = null;
    }
}
?>

<?php
function create_table($filter)
{
    $content = "";
    $res = get_contestants($filter);
    foreach ($res as $k => $v) {
        $id = $v["id"];
        $name =  $v["name"];
        $surname = $v["surname"];
        $age = $v["age_range"];
        $gender = $v["gender"];
        $course = $v["course"];
        $content = "$content
        <tr>
            <td>$id</td>
            <td>$name</td>
            <td>$surname</td>
            <td>$age</td>
            <td>$gender</td>
            <td>$course km</td>
            <td></td>
        </tr>
        ";
    }
    return $content;
}
?>

<div class="site-content">
    <form action="" method="post">
        <label for="course"> Strecken: </label>
        <select id="course" name="course">
            <option value="empty">--</option>
            <option value="10">10 km</option>
            <option value="20">20 km</option>
        </select>
        <label for="age"> Altersgrupen: </label>
        <select id="age" name="age">
            <option value="empty">--</option>
            <option value="<35">bis 35</option>
            <option value="35-50">35-50</option>
            <option value=">50">ab 50</option>
        </select>
        <label for="gender"> Geschlecht: </label>
        <select id="gender" name="gender">
            <option value="empty">--</option>
            <option value="m">m</option>
            <option value="f">f</option>
        </select>
        <input type="submit" value="Anwenden" name="btn">
    </form>
    <table>
        <tr>
            <th>Startnummer</th>
            <th>Name</th>
            <th>Nachname</th>
            <th>Altersgruppe</th>
            <th>Geschlecht</th>
            <th>Strecke</th>
            <th>Zeit</th>
        </tr>
        <?php
        echo create_table($filter);
        ?>
    </table>
</div>

<?php include("templates/footer.php"); ?>