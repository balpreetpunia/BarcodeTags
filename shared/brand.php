<?php
 function getImage($brand){
     if(strtolower($brand) == 'samsung'){
         echo '<img class="img-fluid" src="img/samsung.png">';
     }
     elseif (strtolower($brand) == 'amana'){
         echo '<img class="img-fluid" src="img/amana.png">';
     }
     elseif (strtolower($brand) == 'whirlpool'){
         echo '<img class="img-fluid" src="img/whirlpool.png">';
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
         echo '<img class="img-fluid" src="img/jennair.png">';
     }
     elseif (strtolower($brand) == 'klipsch'){
         echo '<img class="img-fluid" src="img/klipsch.png">';
     }
     elseif (strtolower($brand) == 'tempurpedic'){
         echo '<img class="img-fluid" src="img/tempurpedic.png">';
     }
     elseif (strtolower($brand) == 'sealy'){
         echo '<img class="img-fluid" src="img/sealy.png">';
     }
     elseif (strtolower($brand) == 'sofa by fancy'){
         echo '<img class="img-fluid" src="img/fancy.png">';
     }
     elseif (strtolower($brand) == 'sonos'){
         echo '<img class="img-fluid" src="img/sonos.png">';
     }
     elseif (strtolower($brand) == 'elica'){
         echo '<img class="img-fluid" src="img/elica.png">';
     }
     elseif (strtolower($brand) == 'onkyo'){
         echo '<img class="img-fluid" src="img/onkyo.png">';
     }
     elseif (strtolower($brand) == 'bluesound'){
         echo '<img class="img-fluid" src="img/bluesound.png">';
     }
     elseif (strtolower($brand) == 'maxair'){
         echo '<img class="img-fluid" src="img/maxair.png">';
     }
     elseif (strtolower($brand) == 'fabrics point'){
         echo '<img class="img-fluid" src="img/fabricspoint.png">';
     }
     elseif (strtolower($brand) == 'napoleon'){
         echo '<img class="img-fluid" src="img/napoleon.png">';
     }
     else{
         echo '<p> Company Logo</p>';
     }
 }

 function getBrand(){
     echo '<option value=AMANA">AMANA</option>
           <option value="ASHLEY">ASHLEY</option>
           <option value="BOSCH">BOSCH</option>
           <option value="BLUESOUND">BLUESOUND</option>
           <option value="CROWN">CROWN</option>
           <option value="ELECTROLUX">ELECTROLUX</option>
           <option value="ELICA">ELICA</option>
           <option value="FABRICS POINT">FABRICS POINT</option>
           <option value="FRIGIDAIRE">FRIGIDAIRE</option>
           <option value="JENNAIR">JENNAIR</option>
           <option value="KITCHENAID">KITCHENAID</option>
           <option value="KLIPSCH">KLIPSCH</option>
           <option value="LG">LG</option>
           <option value="MAYTAG">MAYTAG</option>
           <option value="MAXAIR">MAXAIR</option>
           <option value="NAPOLEON">NAPOLEON</option>
           <option value="ONKYO">ONKYO</option>
           <option value="SAMSUNG">SAMSUNG</option>
           <option value="SEALY">SEALY</option>
           <option value="SOFA BY FANCY">SOFA BY FANCY</option>
           <option value="SONOS">SONOS</option>
           <option value="SONY">SONY</option>
           <option value="TEMPURPEDIC">TEMPURPEDIC</option>
           <option value="WHIRLPOOL">WHIRLPOOL</option>';
 }