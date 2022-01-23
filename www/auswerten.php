<?php
include("templates/head.php");
require_once "scripts/db_access.php";
require_once "scripts/create_result_table.php"
?>

<div class="site-content">
    <?php include("templates/time_entry.php"); ?>
    <?php include("templates/contestant_search.php"); ?>
    <h1>Gesamtzeit</h1>
    <?php echo create_result_table(null, "", $conn) ?>
    <h1>Bis 35</h1>
    <?php echo create_result_table("age_range = '<35'", "<35", $conn) ?>
    <h1>35-50</h1>
    <?php echo create_result_table("age_range = '35-50'", "35-50", $conn) ?>
    <h1>Ab 50</h1>
    <?php echo create_result_table("age_range = '>50'", ">50", $conn) ?>
</div>

<?php include("templates/footer.php"); ?>