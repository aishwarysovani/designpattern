<?php
/**
 *@function for validate name input
 * */
function validatename()
{
    fscanf(STDIN,'%s',$str);
    if (!preg_match("/^[a-zA-Z ]*$/",$str)) 
    {
       
        echo 'Only letters allowed';
        return validatename();

    }
    else
    {
        return $str;
    }
}

/**
*function for number validation
*/
function validatenum()
{
    $num=readline();
    if (preg_match("/^[0-9]*$/",$num)) 
    {
        return $num;

    }
    else
    {
        echo 'Only numbers allowed';
        return validatenum();
    }
}


?>