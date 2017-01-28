<!--  
 <div class="" ng-repeat="imageData in imageSrc.slice($index, imageData.length)">
    <div owl-carousel-item="" ng-repeat="imageData in ::imageSrc" class="item text-center image-grid" style="position: relative; float: left;">
    <a class="carousel-item" href="getImagePropertyDetails(imageData)">
    <img ng-click="getImagePropertyDetails(imageData)" ng-src="{{imageData.image}}" alt=""><br>{{imageData.property_name}}</a></img>
   </div>
  </div> -->
<?php 
$con=mysql_connect("localhost","root","") or die("server not found");
mysql_select_db("agileso1_propertybook",$con) or die("database not found");
echo$query="select image_path from property";
$res=mysql_query($query);
while($result=mysql_fetch_row($res))
{
  echo'<div class="carousel">
    <a class="carousel-item" href="#one!"><img src="Admin/"'.$result[0].'"mainImage.jpg" alt="imge not found"></a>
  </div>';
}
  
  ?>




