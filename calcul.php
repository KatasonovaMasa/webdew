<?php

$connection = mysqli_connect("localhost", "root", "", "calculator");
if (!$connection){
    die ("Связь не установлена: " . mysqli_connect_error());

}

$query = mysqli_query($connection, "SELECT * FROM results");

$results = [];


while ($row = mysqli_fetch_assoc($query)){
    $results[] = $row; /*Добавит в конец массива $users сгенерированную строку.*/
}



$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];
$operator = $_REQUEST['operator'];

mysqli_query($connection, "INSERT INTO results (`num1`, `operator`, `num2`) VALUES ('" . $_REQUEST['num1'] . "', '" . $_REQUEST['operator'] . "', '" . $_REQUEST['num2'] . "' )");

if ($operator == '/') {
    if ($num2 == 0) {
        echo "На 0 делить нельзя";
    }
    else if ($num2 >0) {
        echo $num1 / $num2;
        
    }
}

else if ($operator == '*') {
    echo $num1 * $num2;
}
else if ($operator == '-') {
    echo $num1 - $num2;
}
else if ($operator == '+') {
    echo $num1 + $num2;
}

?>
<?php foreach ($results as $result){ ?>
    <div>
    <span>-> [<?php echo $result["num1"]; ?></span>
      <span> <?php echo $result["operator"]; ?></span>
       <span> <?php echo $result["num2"]; ?></span> 
       <span>= <?php echo $result["result"]; ?>]</span> 
    
    </div>
<?php }?>

