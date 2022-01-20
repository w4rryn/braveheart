<?php

function add_blog_entry($str)
{
    $conn = create_conn();
    $date_time = date('Y-m-d H:i:s');
    $sql = "INSERT INTO blog_entries(content, created_at) VALUES('$str', '$date_time');";
    $ok = mysqli_query($conn, $sql);
    if (!$ok) {
        show_error(mysqli_error($conn));
    }
}

function get_blog_entries()
{
    $conn = create_conn();
    $sql = "SELECT * FROM blog_entries ORDER BY created_at DESC;";
    $res = mysqli_query($conn, $sql);
    if ($res == null) {
        show_error(mysqli_error($conn));
        return [];
    }
    return $res;
}

function create_conn()
{
    $conn = mysqli_connect("localhost", "root", "root", "braveheart");
    if (mysqli_errno($conn) != 0) {
        show_error(mysqli_error($conn));
    }
    return $conn;
}

function save_new_contestant($name, $surname, $age_range, $gender, $course)
{
    $sql = "INSERT INTO contestants(name, surname, age_range, gender, course) VALUES('$name', '$surname', '$age_range', '$gender', '$course');";
    $conn = create_conn();
    mysqli_query($conn, $sql);
    if (mysqli_errno($conn) != 0) {
        show_error(mysqli_errno($conn));
    }
}

function get_contestants($filter)
{
    echo $filter;
    $sql = "SELECT * FROM contestants";
    if ($filter != null) {
        $sql = "$sql WHERE $filter";
    }
    $sql = "$sql;";
    $conn = create_conn();
    $res = mysqli_query($conn, $sql);
    return $res;
}
