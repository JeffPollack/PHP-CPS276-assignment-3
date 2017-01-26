<?php
/*
 * Homework 3 
 * Jeff Pollack
 * Time logged on assignemt: 15 min
 */
if(isset($_POST['food'])){
    $food=$_POST['food'];
}else{
    $food='';
}

?>
<form method='post' action='index.php'>
    Enter a food product:
    <input type='text' name='food' value='<?=$food?>'/>
    <input type='submit' name='get food info'/>
</form>

<?php

if($food==''){
    exit();
}
// api key
$apikey = "me";
// api call
$api_url = 'http://96.126.107.46/food/?apikey='.$apikey.'me&term='.$food;
// get data
$results = file_get_contents($api_url);
//decode the data
$decoded = json_decode($results,true);
// call data
//echo "<pre>";
//print_r($decoded);
//echo "</pre>";

//$code = $decoded['cod'];
//if ($code != 200) {
//    echo "sorry, data is not available";
//    exit();
//    
//}
?>

<table  border ='1'>
    <tr>
        <th>Product Name</th>
        <th>Category</th>
        <th>Serving Size</th>
        <th>Calories</th>
        <th>Fat</th>
        <th>Saturated Fat</th>
        <th>Sodium</th>
    </tr>


<?php

foreach ($decoded['results'] as $food_item){
    $name=$food_item['product_name'];
    $category= $food_item['category'];
    $serving=$food_item['serving_size'];   
    $cal=$food_item['calories'];
    $fat=$food_item['fat'];
    $satFat=$food_item['saturated_fat'];
    $sodium=$food_item['sodium'];
    
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$category</td>";
    echo "<td>$serving</td>";
    echo "<td>$cal</td>";
    echo "<td>$fat</td>";
    echo "<td>$satFat</td>";
    echo "<td>$sodium</td>";
    echo "</tr>";
}

?></table>
