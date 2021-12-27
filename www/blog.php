<?php include("templates/head.php"); ?>

<?php
require_once "scripts/db_access.php";
if (array_key_exists("btn", $_POST)) {
    add_blog_entry($_POST["txt"]);
}
?>

<div>
    <div>
        <table>
            <tr>
                <th>Eintrag</th>
                <th>Datum</th>
            </tr>
            <?php
            // $entries = get_blog_entries();
            // foreach ($entries as $key => $value) {
            //     echo "
            //     <tr>
            //     <td>" . $value["content"] . "</td>
            //     <td>" . $value["created_at"] . "</td>
            //     </tr>";
            // }
            ?>
        </table>
    </div>
    <div>
        <form method="post">
            <label for="txt">Blogeintrag:</label>
            <input type="text" name="txt" id="txt">
            <input type="submit" value="Absenden" name="btn">
        </form>
    </div>
</div>


<?php include("templates/footer.php"); ?>