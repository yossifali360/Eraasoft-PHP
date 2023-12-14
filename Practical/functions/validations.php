<?php
function validateEmpty($depName){
    if(empty($depName)){
        return true;
    }else{
        return false;
    }
}
function validateMinimum($depName){
    if(strlen($depName) < 3){
        return true;
    }else{
        return false;
    }
}
function validateMaximum($depName){
    if(strlen($depName) > 30){
        return true;
    }else{
        return false;
    }
}
?>