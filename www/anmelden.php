<?php include("templates/head.php"); ?>

<div class="content site-content">
    <form method="post">
        <div>
            <label for="tb_name">Name</label>
            <input type="text" name="name" id="tb_name">
        </div>
        <div>
            <label for="tb_name">Nachname</label>
            <input type="text" name="surname" id="tb_surname">
        </div>
        <div>
            <label for="below35">bis 35</label>
            <input type="radio" name="age_below_35" id="below35">
            <label for="from35">35 -50</label>
            <input type="radio" name="age_from_35" id="from35">
            <label for="over50">über 50</label>
            <input type="radio" name="age_over_50" id="over50">
        </div>
        <div>
            Geschlecht
            <label for="male">m</label>
            <input type="radio" name="gender_male" id="male">
            <label for="female">w</label>
            <input type="radio" name="gender_female" id="female">

        </div>
        <div>
            Strecke
            <label for="track_10">10km</label>
            <input type="radio" name="track_10" id="track_10">
            <label for="track_20">20km</label>
            <input type="radio" name="track_20" id="track_20">
        </div>
        <input type="submit" value="Anmelden">
    </form>
</div>

<?php include("templates/footer.php"); ?>