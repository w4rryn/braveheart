<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
?>

<?php
$conn = create_conn();
function create_table($filter, $conn)
{
    $body = "";
    $res = get_contestants($filter, $conn);
    $i = 1;
    foreach ($res as $k => $v) {
        $id = $v["id"];
        $name =  $v["name"];
        $surname = $v["surname"];
        $age = $v["age_range"];
        $gender = $v["gender"];
        $course = $v["course"];
        $time = $v["laptime"];
        $body = "$body
        <tr>
            <td>$i</td>
            <td>$id</td>
            <td>$name</td>
            <td>$surname</td>
            <td>$age</td>
            <td>$gender</td>
            <td>$course km</td>
            <td>$time</td>
        </tr>
        ";
        $i++;
    }
    $t = "
        <table>
        <tr>
            <th>Platz</th>
            <th>Startnummer</th>
            <th>Name</th>
            <th>Nachname</th>
            <th>Altersgruppe</th>
            <th>Geschlecht</th>
            <th>Strecke</th>
            <th>Zeit</th>
            </tr>
            <thead></thead>
            <tbody>
                $body
            </tbody>
        </table>
    ";
    return $t;
}
?>

<div class="site-content">
    <?php include("templates/time_entry.php"); ?>
    <h1>Gesamtzeit</h1>
    <?php echo create_table(null, $conn) ?>
    <h1>Bis 35</h1>
    <?php echo create_table("age_range = '<35'", $conn) ?>
    <h1>35-50</h1>
    <?php echo create_table("age_range = '35-50'", $conn) ?>
    <h1>Ab 50</h1>
    <?php echo create_table("age_range = '>50'", $conn) ?>
</div>

<?php include("templates/footer.php"); ?>