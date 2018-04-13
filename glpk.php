<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$output=  array();
//$return_var;
exec("gusek\\glpsol -m gusek\\test2.mod", $output, $return_var);

var_dump($output);

echo 'return '.$return_var;