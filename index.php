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
      var width = window.innerWidth -60;
      var height = window.innerHeight -60;
      var padding = 15;

      var menu = document.getElementById("menu");

      var pitoti_info = <?php echo json_encode($pitoti_info) ?>;

      var button_count = pitoti_info.length;
      var button_width = width-2*padding;
      var button_height = (height-((button_count)*padding))/button_count;

      var menu = document.getElementById("menu");
      var buttons = new Array();
      var active_buttons = {};

      menu.style.width = width+"px";
      menu.style.height = height+"px";
      
      for (i = 0;i < button_count; i++){
        //create button
        var temp_div = document.createElement("div");
        temp_div.id = pitoti_info[i][0];
        temp_div.className = "button";
        temp_div.style.width = button_width+"px";
        temp_div.style.height = button_height+"px";

        //create button text
        var p = document.createElement("p");
        p.textContent = pitoti_info[i][1] + "WIDTH:" + button_width + " window width:"+width ;
        p.className = "entry"

        menu.appendChild(temp_div);
        temp_div.appendChild(p);
        buttons.push(temp_div);
        active_buttons[temp_div.id] = false;


        temp_div.addEventListener("click",function(){

          if (active_buttons[this.id] == false){
            $(this).css("background","#FF9664");
            active_buttons[this.id] = true;
          }else if(active_buttons[this.id] == true){
            $(this).css("background","-webkit-radial-gradient(rgba(255,245,139,1), rgba(165,201,67,1),rgba(160,192,67,1))");
            $(this).css("background","-o-radial-gradient(rgba(255,245,139,1), rgba(165,201,67,1),rgba(160,192,67,1))");
            $(this).css("background","-moz-radial-gradient(rgba(255,245,139,1), rgba(165,201,67,1),rgba(1160,192,67,1))");
            $(this).css("background","radial-gradient(rgba(255,245,139,1), rgba(165,201,67,1),rgba(160,192,67,1))");
            //$(this).css("background","blue");
            active_buttons[this.id] = false;
          }
          //"use strict";
          var name = this.id;
          var func = new Function("gua." + name + "()")();
        });
      }

      function checkWidth() {
        width = window.innerWidth -60;
        height = window.innerHeight -60;

        button_width = width-4*padding;
        button_height = (height-((button_count)*padding))/button_count;

        menu.style.width = width+"px";
        menu.style.height = height+"px";

        for (i = 0;i < buttons.length; i++){
          buttons[i].style.width = button_width+"px";
          buttons[i].style.height = button_height+"px";
        }
      }
      checkWidth();
      // Bind event listener
      $(window).resize(checkWidth);
    </script>
  </body>
</html>





