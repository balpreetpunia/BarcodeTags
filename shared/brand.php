<?php

    $brands_list = array("amana","ashley","bosch","bluesound","crown","electrolux","elica","fabrics point","frigidaire",
    "jennair","kitchenaid","klipsch","lg","maytag","maxair","napoleon","onkyo","samsung","sealy","sofa by fancy","sonos",
    "sony","tempurpedic","whirlpool");

    asort($brands_list);

 function getImage($brand)
 {
     global $brands_list;
     $found = 0;
     foreach ($brands_list as $value) {
         if (strtolower($brand) == strtolower($value)) {
             echo "<img class='img-fluid' src='img/$value.png'>";
             $found = 1;
             break;
         }
     }
     if ($found ==0) {
         echo '<p> Company Logo</p>';
     }
 }

 function getBrand(){

     global $brands_list;

     foreach ($brands_list as $value ){
         echo "<option value='".strtoupper($value)."'>".strtoupper($value);
     }
 }

