<!-- <script>

    var pathname  = location.pathname;
    document.cookie = "pathname="+pathname;

</script>
 -->


<?php


    $path = $_SERVER["HTTP_REFERER"];

      $arr = pathinfo($path);
      echo var_dump($arr);
      $path = $_SERVER["HTTP_REFERER"];

      echo $_REQUEST["ticket"];
      echo   $path;



?>