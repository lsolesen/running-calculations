<?php
class Body_Stofskifte
{
    function man($weight, $height, $age)
    {
        return 9.99*$weight+6.25*$height-4.92*$age+5;
    }

    function woman($weight, $height, $age)
    {
        return 9.99*$weight+6.25*$height-4.92*$age-161;
    }
}