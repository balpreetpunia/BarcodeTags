'<?php

    $brands_list = array("amana","ashley","bosch","bluesound","crown","Crown Mirrors","electrolux","elica","fabrics point","frigidaire",
    "jennair","kitchenaid","klipsch","lg","maytag","maxair","napoleon","onkyo","samsung","sealy","sofa by fancy","sonos",
    "sony","tempurpedic","whirlpool","traeger");

    asort($brands_list);

 function getImage($brand)
 {
     $brand = strtolower($brand);
     $path = "img/$brand.png";
     if(file_exists($path)){
             echo "<img class='img-fluid' src='img/$brand.png'>";
         }
     else{
         echo '<p style = "font-size: larger"> CROWN MIRRORS</p>';
     }
 }

 function getBrand(){

     global $brands_list;

     foreach ($brands_list as $value ){
         echo "<option value='".strtoupper($value)."'>".strtoupper($value);
     }
 }

