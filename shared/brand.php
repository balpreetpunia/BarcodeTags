<?php
 function getImage($brand){
     if(strtolower($brand) == 'samsung'){
         echo '<img class="img-fluid" src="img/samsung.png">';
     }
     elseif (strtolower($brand) == 'amana'){
         echo '<img class="img-fluid" src="img/amana.gif">';
     }
     elseif (strtolower($brand) == 'whirlpool'){
         echo '<img class="img-fluid" src="img/whirlpool.jpg">';
     }
     elseif (strtolower($brand) == 'kitchenaid'){
         echo '<img class="img-fluid" src="img/kitchenaid.png">';
     }
     elseif (strtolower($brand) == 'maytag'){
         echo '<img class="img-fluid" src="img/maytag.png">';
     }
     elseif (strtolower($brand) == 'lg'){
         echo '<img class="img-fluid" src="img/lg.png">';
     }
     elseif (strtolower($brand) == 'electrolux'){
         echo '<img class="img-fluid" src="img/electrolux.png">';
     }
     elseif (strtolower($brand) == 'frigidaire'){
         echo '<img class="img-fluid" src="img/frigidaire.png">';
     }
     elseif (strtolower($brand) == 'bosch'){
         echo '<img class="img-fluid" src="img/bosch.png">';
     }
     elseif (strtolower($brand) == 'sony'){
         echo '<img class="img-fluid" src="img/sony.png">';
     }
     elseif (strtolower($brand) == 'ashley'){
         echo '<img class="img-fluid" src="img/ashley.png">';
     }
     elseif (strtolower($brand) == 'jennair'){
         echo '<img class="img-fluid" src="img/jennair.jpg">';
     }
     elseif (strtolower($brand) == 'klipsch'){
         echo '<img class="img-fluid" src="img/klipsch.png">';
     }
     else{
         echo '<p> Company Logo</p>';
     }
 }