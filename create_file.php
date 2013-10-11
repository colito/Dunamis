<?php
session_start();
if(empty($_SESSION['admin_active']))
{
    header('Location: index.php');
}
?>

<html>
<head>
    <title>Create File</title>

    <link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>

<body>
<div class="container">

    <div class="grid_4">
        <h3>Create File</h3>
        <br>
        <a href="sign_out.php">Sign out</a>
    </div>

    <div class="grid_8">
        <p>Specify the path of the file you want from root.</p>
        <form method="post" action="validator.php">
            <input type="hidden" name="file_job" value="create">
            <input type="text" name="new_file" width="80" placeholder="File path">
            <br><br>
            <input type="submit" value="Create file">
        </form>
    </div>

</div>
</body>
</html>