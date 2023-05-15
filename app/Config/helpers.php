<?php 

function url($path=''){
    echo BUrl.$path ;
}

// redirect
function redirect($url)
{
    return  BUrl.$url;
}

?>