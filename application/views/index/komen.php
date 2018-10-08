<html><head>
    <style>     
</style>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div class="dropdown">
        <button class="btn dropdown-toggle col-md-3" type="button" data-toggle="dropdown" aria-expanded="false">
            Select Category
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu col-md-7" onclick="event.stopPropagation();">
            <div id="MaterialGridList" style="height:440px;"></div>
            <button type="button" id="btnFilter" class="btn btn-sm btn-success">Filter</button>
            <button type="button" id="btnFilter2" class="btn btn-sm btn-success">Filter2</button>
        </ul>
    </div>
    <script type="text/javascript">
        $('#btnFilter').click(function() {
          $(this).parents('.dropdown').find('button.dropdown-toggle').dropdown('toggle')
      });
        $('#btnFilter2').click(function() {
          $(this).parents('.dropdown').find('button.dropdown-toggle').dropdown('toggle')
      });
  </script>

  <div class="as-console-wrapper"><div class="as-console"></div></div></body></html>