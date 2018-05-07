<?php
    echo '<script>';
    echo "\n";
    echo $messages->ToJSArray('Messages');
    echo "\n";
    echo $alerts->ToJSArray('Alerts');
    echo "\n";
    echo $tasks->ToJSArray('Tasks');
    echo "\n";
    echo '</script>';

?>