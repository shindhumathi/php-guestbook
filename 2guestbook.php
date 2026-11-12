<?php
$file = "guestbook.txt";
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name = htmlspecialchars(trim($_POST["name"]));
        $message = htmlspecialchars(trim($_POST["message"]));
        $date = date("y-m-d H:i:s");
        if(!empty($name) && !empty($message))
            {
                $entry="[$date] : $name : $message\n";
                file_put_contents($file,$entry,FILE_APPEND);
            }
    }
if(file_exists($file))
    {
        $entries = file($file,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        //$entries =array_reverse($entries);
        foreach($entries as $x)
            {
                echo "<p>".$x."</p>";
            }
    }
else
    {
        echo "<p>No record found.";
    }
?>