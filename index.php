<html>
<head>
  <title>Обо мне</title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic|Playfair+Display:400,700&subset=latin,cyrillic">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main.css">
  <script>
    function fetchData(event) {
      event.preventDefault();
      var form = document.querySelector('form');
      let element_window = document.querySelector(".mask")
      document.querySelector(".mask")
            element_window.classList.remove("hidden");
      fetch('calcul.php', {
        method: "POST",
        body: new FormData(form),
      })
        .then(response => {
          return response.text();
        })
        
        .then(text => {
          document.querySelector(".showResult").innerHTML=text;
       })
      return false;
    }
     function hide(){
            let element_window = document.querySelector(".mask")
            element_window.classList.add("hidden")
      }

 </script>
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
?>


</head>
<body>
<header>
      <nav>
            <div class="conteiner">
                  <div class ="headers">
                          <div class="right_name">Мария Катасонова<a name="up"></a></div>
                          <ul class="left_name">
                                  <li><a href="#about_me-id">Обо мне</a></li>
                                  <li><a href="#work">Моя деятельность</a></li>
                                  <li><a href="#calcul">Калькулятор</a></li>
                                  <li><a href="#difficulties">Сложности</a></li>
                                  <li><a href="#mood">Настроение</a></li>
                                  <li><a href="#contacts">Контакты </a></li>
                          </ul>
                  </div>
            </div>
      </nav>
</header>

<div class="conteiner">
      <div class="aboutme">
            <div class="child about1"><a name="about_me-id"></a>
                  <h4>Меня зовут <a href="#up"></a>Мария!</h4>
                  <h6>И я хочу обучиться программированию, потому что мне это жутко интересно!!!</h6>
                  <h6>А еще я люблю музыку и погонять на велосипеде.</h6></div>
            <div class="child"><img class="about2" src="image/я.jpg"></div>
      </div>
</div>

<div class="section">
      <div class="conteiner">
            <div class="mework">
                  <div class="child1">
                        <div class="section_title"><a name="work" href="#up">Моя деятельность</a></div>
                        <div class="section_content">      
                              <div class="box">
                                    <div class="box-title">1</div>
                                    <div class="box-content">Работаю в сфере тестирования программного обеспечения</div></div>
                              <div class="box b2">
                                    <div class="box-title">2</div>
                                    <div class="box-content">Люблю собирать кубики рубики, дошла до кубика 7*7</div></div>
                              <div class="box b3" >
                                    <div class="box-title">3</div>
                                    <div class="box-content">Прохожу курсы по скорочтению</div></div>
                              <div class="box b4">
                                    <div class="box-title">4</div>
                                    <div class="box-content">Провожу 3-й раз курс по разработке программного обеспечения</div></div>
                              <div class="box b5">
                                    <div class="box-title">5</div>
                                    <div class="box-content">Читаю книги и катаюсь на велосипеде</div></div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<div class="section">
            <div class="conteiner">
                              <div class="calcul_global">
                                                <div class="child">
                                                      <div class="section_title"><a name="calcul" href="#up">Калькулятор</a></div>
                                                <div class="calcul">
                                                                  <form name="valu">
                                                                        <p>Введите первое число:</p>
                                                                        <input class="size1" type="number" name="num1"/><br><br>
                                                                        <br><p>Выберите операцию:</p>
                                                                        <select class="size" name="operator";>
                                                                        <option disabled> </option>
                                                                        <option>/</option>
                                                                        <option>*</option>
                                                                        <option>-</option>
                                                                        <option>+</option>
                                                                        </select><br>
                                                                        <br><br><p>Введите второе число:</p>
                                                                        <input class="size2" type="number" name="num2"/><br><br>
                                                                        <button class="size" onClick="return fetchData(event)">Вычислить</button><br>
                                                                  </form>
                                                            </div> </div> 
                                                                  <div class="child max">
                                                     
                                                                  <div class="resul">
                                                                             <div ></div>
                                                                  </div>
                                                                  <div class="mary"> 

                                                                        
                                                                  </div>
                                                            </div>
                   </div>
            </div>
</div>


<div>
<?php foreach ($results as $result) { ?>
      <div>
      <span>-> [<?php echo $result["num1"]; ?></span>
      <span> <?php echo $result["operator"]; ?></span>
       <span> <?php echo $result["num2"]; ?></span> 
       <span>= <?php echo $result["result"]; ?>]</span> 
                  
            </div>
      <?php }?>

</div>

<div class="section">
      <div class="conteiner">
            <div class="mework">
                <div class="child1">
                      <div class="section_title"><a name="difficulties" href="#up">Сложности</a></div>
                      <div class="section_content"> 
                            <div class="box" >
                                  <div class="box-title">1</div>
                                  <div class="box-content"><h6>Как работает клиент-серверное взаимодействие?</h6></div></div>
                            <div class="box b2" >
                                  <div class="box-title">2</div>
                                  <div class="box-content">Не понимаю, почему не работает калькулятор?</div></div>
                            <div class="box b3" >
                                  <div class="box-title">3</div>
                                  <div class="box-content">Не понимаю, как работает точка останова в devTools</div></div>
                            <div class="box b4" >
                                  <div class="box-title">4</div>
                                  <div class="box-content">Как наследуются классы и работают функции-я всё позабывала?</div></div>
                            <div class="box b5" >
                                  <div class="box-title">5</div>
                                  <div class="box-content">Я слишком стара, для всего этого дерьма</div></div>
                      </div>
                </div>
            </div>
      </div>
</div>

<div class="conteiner" >
      <div class="mood" >
            <div class="section_title"><a name="mood" href="#up">Настроение</a></div>
            <div class="child am">
            <div><img class="mood2" src="image/image_1.jpg" ;></div>  
            </div>
      </div>
</div>
  
<footer>
      <div class="conteiner">
            <div class = "footers">
                      <div class="right_name end" >Мария Катасонова<a name="contacts" href="#up"></a></div>
                      <div class="left_name end two"><a href="tel:+79026707357">+7 902 670 7357</a></div>
                      <div class="im_end"><a href="https://vk.com/katasonova_masa"><img  src="image/Vector.svg"></a></div>
            </div>
      </div>
 
</footer>


  <div class="mask hidden">
    <div class="window">
      <h2>Отображение результата</h2>
    <hr />
      <div>
            <div class="showResult"> </div><br>
      </div>
      <hr />
      <div class="finish">
        <button onClick="hide()">Закрыть!</button>
      </div>
    </div>
  </div>
</body>
</html>