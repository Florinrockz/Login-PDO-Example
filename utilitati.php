<?php
function check_empty_fields($tablou)
{
    $forma_erori=array();
    foreach($tablou as $nume_camp){
        if(!isset($_POST[$nume_camp]) || $_POST[$nume_camp]==null){
            $forma_erori[]=$nume_camp." e cerut";
        }
    }
    return $forma_erori;
}
?>