<?php
$conn = create_conn();

function add_blog_entry($str, $conn)
{
    $date_time = date('Y-m-d H:i:s');
    $sql = "INSERT INTO blog_entries(content, created_at) VALUES('$str', '$date_time');";
    mysqli_query($conn, $sql);
}

function get_blog_entries($conn)
{
    $sql = "SELECT * FROM blog_entries ORDER BY created_at DESC;";
    $res = mysqli_query($conn, $sql);
    if ($res == null) {
        return [];
    }
    return $res;
}

function create_conn()
{
    $conn = mysqli_connect("localhost", "root", "root", "braveheart");
    return $conn;
}

function save_new_contestant($conn, $name, $surname, $age_range, $gender, $course)
{
    $sql = "INSERT INTO contestants(name, surname, age_range, gender, course) VALUES('$name', '$surname', '$age_range', '$gender', '$course');";
    mysqli_query($conn, $sql);
}

function get_contestants($filter, $conn)
{
    $sql = "SELECT * FROM contestants";
    if ($filter != null) {
        $sql = "$sql WHERE $filter";
    }
    $sql = "$sql ORDER BY laptime;";
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function set_time($id, $hour, $min, $sec, $conn)
{
    if ($id <= 0 || $min < 0 || $sec < 0 || $hour < 0 || $hour > 899 || $sec > 50 || $min > 59) {
        return "Die Daten sind ungültig";
    }
    $conn = create_conn();
    $sql = "UPDATE contestants SET laptime = '$hour:$min:$sec' WHERE id = '$id';";
    $ok = mysqli_query($conn, $sql);
    if (!$ok) {
        return mysqli_error($conn);
    }
}
