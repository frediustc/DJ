<?php

function _isNbr($nbr = 0){
    return preg_match('/^[0-9]+((\.)?[0-9]+)?$/', $nbr) ? true : false;
    // return preg_match('/^(\-|\+)?[0-9]+((\.)?[0-9]+)?$/', $nbr) ? true : false;
}

function _bClear($in = ''){
    return htmlspecialchars(trim($ins));
}
