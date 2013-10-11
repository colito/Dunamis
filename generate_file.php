<?php

    if(!empty($_GET['new_file']))
    {
        $new_file = '../'.$_GET['new_file'];
        var_dump($new_file);
        $handle = fopen($new_file, 'w') or die('Cannot open file:  '.$new_file); # implicitly creates file
        //var_dump('');
    }
    else
    {
        echo 'No new file to create.';
    }


?>