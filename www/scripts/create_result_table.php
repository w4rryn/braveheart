<?php
require_once "scripts/db_access.php";
?>

<?php
function create_result_table($filter, $class, $conn)
{
    $body = "";
    $res = get_contestants($filter, $conn);
    $class_contestants = null;
    if ($class != "") {
        $class_contestants = get_contestants("age_range = '$class'", $conn);
    } else {
        $class_contestants = get_contestants(null, $conn);
    }
    foreach ($res as $k => $v) {
        $id = $v["id"];
        $name =  $v["name"];
        $surname = $v["surname"];
        $age = $v["age_range"];
        $gender = $v["gender"];
        $course = $v["course"];
        $time = $v["laptime"];
        $i = array_search($v, $class_contestants) + 1;
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