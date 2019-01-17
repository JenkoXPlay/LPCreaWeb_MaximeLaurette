<?php
    function chargerClass($classname) {
        require_once 'class/'.$classname.'.class.php';
    }

    spl_autoload_register('chargerClass');
?>