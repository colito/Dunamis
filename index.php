<?php
    $page_name = 'Index Page';
    require_once('includes/header.php');
?>

    <div class="grid_4">
        <h3>Sign in</h3>
    </div>

    <div class="grid_8">
        <?php
            if(!empty($_POST['user_name']))
            {
                $user_name = $_POST['user_name'];
                if($user_name == 'admin_bogosi')
                {
                    if(!empty($_POST['user_password']))
                    {
                        $pword = $_POST['user_password'];
                        if($pword == 'KEmohae')
                        {
                            session_start();
                            $_SESSION['admin_active'] = 'admin_bogosi';
                            header('Location: open_file.php');
                        }
                        else
                        {
                            echo 'Incorrect login details!';
                        }
                    }
                    else
                    {
                        echo 'Please enter password';
                    }
                }
                else
                {
                    echo 'Incorrect login details!';
                }
            }
            else
            {
                echo 'Please enter your details';
            }
        ?>
    </div>


    <div class="grid_8">
        <p></p>
        <form method="post" action="index.php">
            <p>
                User name:
                <br>
                <input type="text" name="user_name" width="80" placeholder="user name" value="<?php echo $user_name; ?>">
            </p>
            <p>
                Password:
                <br>
                <input type="password" name="user_password" width="80" placeholder="password">
            </p>

            <input type="submit" value="Sign in">
        </form>
    </div>

<?php require_once('includes/footer.php')?>