<!DOCTYPE html>
<html>
  <head>
    <title>Pitoti Menus</title>
    <link type="text/css" rel="stylesheet" href="css/css_reset.css">
    <link type="text/css" rel="stylesheet" href="css/pitoti.css">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:regular&amp;subset=latin"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- <script src="http://d3js.org/d3.v3.min.js"></script>-->
    <meta charset="UTF-8">
  </head>
  <body>
    <div id="menu">
    </div>
    <?php
      $pitoti_info = json_decode($_GET['pitoti_info']); // array(1, 2, 3)
    ?>
    <script>
      var $window = $(window);
      var width = $window.width();
      var height = $window.height();
      var padding = 15;

      var menu = document.getElementById("menu");



      var pitoti_info = <?php echo json_encode($pitoti_info) ?>;

      var button_count = pitoti_info.length;
      var button_height = (height-((button_count+2)*padding))/button_count;

      var menu = document.getElementById("menu");
      var buttons = new Array();

      menu.style.width = (width) +"px";
      menu.style.height = height+"px";
      
      for (i = 0;i < button_count; i++){
        var temp_div = document.createElement("div");
        temp_div.id = pitoti_info[i][0];
        temp_div.className = "button";
        temp_div.style.width = width+"px";
        temp_div.style.height = button_height+"px";
        var p = document.createElement("p");
        p.textContent = pitoti_info[i][1];
        p.className = "entry"
        menu.appendChild(temp_div);
        temp_div.appendChild(p);
        buttons.push(temp_div);
      }

      function checkWidth() {
        width = $window.width();
        height = $window.height();

        button_height = (height-((button_count+2)*padding))/button_count;

        menu.style.width = width+"px";
        menu.style.height = height+"px";

        for (i = 0;i < buttons.length; i++){
          buttons[i].style.width = width+"px";
          buttons[i].style.height = button_height+"px";
        }
      }
      checkWidth();
      // Bind event listener
      $(window).resize(checkWidth);
    </script>


   <!--<?php include ("menu.php"); ?> -->
  </body>
</html>





