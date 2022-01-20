<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
?>

<?php
$name_err = $surname_err = $gender_err  = $course_err = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST["age"];

    if (array_key_exists("gender_male", $_POST)) {
        $gender = "m";
    } elseif (array_key_exists("gender_female", $_POST)) {
        $gender = "f";
    } else {
        $gender_err = "Geschlecht wird benötigt";
    }

    if (array_key_exists("track_10", $_POST)) {
        $course = 10;
    } elseif (array_key_exists("track_20", $_POST)) {
        $course = 20;
    } else {
        $course_err = "Die Strecke wird benötigt";
    }

    if (empty($_POST["name"])) {
        $name_err = "Name wird benötigt";
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["surname"])) {
        $surname_err = "Nachname wird benötigt";
    } else {
        $surname = $_POST['surname'];
    }

    if (!($name_err != "" || $surname_err != "" || $gender_err != "" || $course_err != "")) {
        save_new_contestant($name, $surname, $age, $gender, $course);
        $success = "Anmeldung von $name $surname erfolgreich";
    }
}

?>
<div class="content site-content">
    <form method="post">
        <div>
            <label for="tb_name">Name</label>
            <input type="text" name="name" id="tb_name">
            <span><?php echo $name_err; ?></span>
        </div>
        <div class="input-err">
            <label for="tb_name">Nachname</label>
            <input type="text" name="surname" id="tb_surname">
            <span><?php echo $surname_err; ?></span>
        </div>
        <div>
            <label for="agegroup"> Altersgruppe: </label>
            <select id="agegroup" name="age">
                <option value="<35">bis 35</option>
                <option value="35-50">35-50</option>
                <option value=">50">ab 50</option>
            </select>
        </div>
        <div>
            Geschlecht
            <label for="male">m</label>
            <input type="radio" name="gender_male" id="male">
            <label for="female">w</label>
            <input type="radio" name="gender_female" id="female">
            <span><?php echo $gender_err; ?></span>
        </div>
        <div>
            Strecke
            <label for="track_10">10km</label>
            <input type="radio" name="track_10" id="track_10">
            <label for="track_20">20km</label>
            <input type="radio" name="track_20" id="track_20">
            <span><?php echo $course_err; ?></span>
        </div>
        <input type="submit" value="Anmelden" name="btn">
    </form>
    <div class="paragraph">
        <span><?php echo $success; ?></span>
    </div>
</div>

<?php include("templates/footer.php"); ?>