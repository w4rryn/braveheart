<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
if (array_key_exists("btn", $_POST)) {
    add_blog_entry($_POST["txt"]);
}
?>

<div class="content flex-container site-content">
    <div class="blog">
        <table>
            <tr>
                <th class="blogpost">Eintrag</th>
                <th class="blogdate">Datum</th>
            </tr>
            <?php
            $entries = get_blog_entries();
            foreach ($entries as $key => $value) {
                $d = strtotime($value["created_at"]);
                echo "<tr>";
                echo "<td>" . $value["content"] . "</td>";
                echo "<td>" . date("d.m.Y H:i", $d) . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <div class="blog-form">
        <form method="post">
            <textarea name="txt" id="" cols="30" rows="10">Eintrag...</textarea>
            <input type="submit" value="Absenden" name="btn">
        </form>
    </div>
</div>


<?php include("templates/footer.php"); ?>