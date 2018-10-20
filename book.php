<html>
<head>
  <title>Book</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    

</head>
<body>
  <div class="vd_menu-search">
  <form id="search-box" method="post" action="/action_page.php" >
    <input id="hudaisearch" type="text" name="search" class="vd_menu-search-text width-60" placeholder="Search People,Education, job....">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span> <input type="submit" value="Search" name="ysearch"></span>
  </form>
  <script>
       $(function() {
          var sname = <?php include('suggest_name.php') ?> ;
          $( "#hudaisearch" ).autocomplete({
             source: sname
          });
       });
    </script>
</body>
</html>
