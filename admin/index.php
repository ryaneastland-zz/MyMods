<?php
    include_once "../functions.php";
    include("../inc/connect.php");

    $notheme = mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'] == null;
    $json = getThemeData($notheme ? "Modern" : mysqli_fetch_array(mysqli_query($con, "SELECT `theme` FROM `settings` WHERE 1"))['theme'], 'json', true);
    $imgDir = '../images/' . $json['id'] . '/';
?>

<html>
	<title>MyMods Control Panel</title>
    <style><?php echo getThemeData('Modern', 'css', true) ?></style>
    <style>
        #main {
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            background-color: #eceef1;
            width: 75%;
            border-radius: 15px 15px 15px 15px;
        }
    </style>
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="scripts/save-settings.js"></script>
	<body>
        <div align="center">
            <img src=<?php echo $imgDir . "logo.png"?> />
        </div>
        <div id="main">
            <br>
            <h2>MyMods Control Panel</h2>
            <button class="button" name="ContentSettings" id="ContentSettings">Content Settings</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="button" name="ConfigSettings" id="ConfigSettings">Configuration Settings</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="button" name="LayoutSettings" id="LayoutSettings">Layout Configuration</button>
            <div class="save-settings" id="content" name="content">
                <?php
                    include("ContentSettings.php");
                ?>
            </div>
        </div>
    <br>
	</body>
</html>