<?php
ob_start();
session_start();

require_once('../config.php');
require_once('../fns/user_handler.php');

if($page_name != 'Index Page')
{
    if(empty($_SESSION['admin_active']))
    {
        header('Location: index.php');
    }
    else
    {
        $_SESSION['start_time'] = time();
        $admin_session = $_SESSION['admin_active'];
    }
}
else
{
    if(!empty($_SESSION['admin_active']))
    {
        header('Location: '.navi_open_file);
    }
}

$user_handler = new UserHandler();
$config = new Config();

?>

<html>
<head>
    <title><?php echo $page_name?></title>

    <link rel="stylesheet" href="<?php echo main_css_reset ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo main_css_grid ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo main_css_style ?>" type="text/css" media="screen" />

    <!-- <script language="javascript" type="text/javascript" src="js/codepress/codepress.js"></script>-->
    <script language="javascript" type="text/javascript" src="<?php echo main_edit_area_js ?>"></script>
    <script language="javascript" type="text/javascript">
        editAreaLoader.init({
            id : "file_content"		// textarea id
            ,syntax: "<?php echo $file_extension; ?>"	// syntax to be uses for highgliting
            ,start_highlight: true		// to display with highlight mode on start-up
        });
    </script>

    <script type="text/javascript">
        function view_file_explorer()
        {
            window.location.assign("<?php echo navi_file_explorer ?>")
        }
    </script>

</head>

<body>

<div id="topper">

    <div id="title">
        <a href="<?php echo navi_home?>"><h2>Dunamis</h2></a>
    </div>

    <?php if($page_name != 'Index Page') {

        echo '

            <div id="links" class="animated">
                <a href="'.main_sign_out.'">Sign out</a>
            </div>

            <div id="open_file">
                <form method="post" action="../open_file/validator.php">
                    <input type="hidden" name="file_job" value="open">
                    <input type="text" name="file_path" width="80" placeholder="Specify file path">
                    <input class="open_btn" type="submit" value="Open">
                </form>
            </div>

            <div id="links">
                <a href="'.navi_open_file.'">Home</a>&nbsp;
                <a href="'.navi_file_explorer.'">Browse</a>&nbsp;
                <a href="'.navi_shell.'">Shell</a>&nbsp;
            </div>
           ';
        }
    ?>

</div>

<div class="container_12">

