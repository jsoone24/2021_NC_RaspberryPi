<?php
if($handle = opendir('log/')){
    while(false != ($entry = readdir($handle))){
        if($entry != '.' && $entry != '..'){
            if(strchr($entry, ".jpg")==true){
                echo "<br /><dif>$entry</div><br />";
                echo "<div><img src='./log/$entry' width = '300' height='230'></div>";
            }
        }
    }
    closedir($handle);
}
?>