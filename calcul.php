<?php

$connection = mysqli_connect("localhost", "root", "", "calculator");
if (!$connection){
    die ("Связь не установлена: " . mysqli_connect_error());

}

$query = mysqli_query($connection, "SELECT * FROM results ORDER BY id DESC LIMIT 7;");

$results = [];


while ($row = mysqli_fetch_assoc($query)){
    $results[] = $row; /*Добавит в конец массива $users сгенерированную строку.*/
}

$num1 = $_REQUEST['num1'];
$num2 = $_REQUEST['num2'];
$operator = $_REQUEST['operator'];
$res;

if (!isset($_REQUEST['num1']) && isset($_REQUEST['num2'])) {
    $error = "Одно из чисел или оба, пустые. Необходимо заполнить";
    echo $error;
}

else if ($operator == '/') {
    if ($num2 == 0) {
        $res = "На 0 делить нельзя";
        echo $res;
    }
    else if ($num2 >0) {
       $res = $num1 / $num2;
        echo $res;
         
    }
}

else if ($operator == '*') {
     $res = $num1 * $num2;
    echo $res;
}
else if ($operator == '-') {
     $res = $num1 - $num2;
    echo $res;
}
else if ($operator == '+') {
    $res = $num1 + $num2;
    echo $res;
}
mysqli_query($connection, "INSERT INTO results (`num1`, `operator`, `num2`, `result`) VALUES ('" . $_REQUEST['num1'] . "', '" . $_REQUEST['operator'] . "', '" . $_REQUEST['num2'] . "',  '" . $res . "')");

?>
<?php foreach ($results as $result){ ?>
    <div>
    <span>-> [<?php echo $result["num1"]; ?></span>
      <span> <?php echo $result["operator"]; ?></span>
       <span> <?php echo $result["num2"]; ?></span> 
       <span>= <?php echo $result["result"]; ?>]</span> 
    
    </div>
<?php }?>
