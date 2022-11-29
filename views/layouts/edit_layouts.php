<html>
<head>
<title>Task</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
  $( '.datepicker' ).datepicker( { dateFormat: 'yy-mm-dd', minDate: '-2d' } );
} );
</script>
<style>
input[type=text], select, textarea {
  width: 100%;
  max-width: 300px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 40%;
  max-width: 300;
  padding: 14px 20px;
  margin: 8px 0;
}
input[type=submit].submit {
  background-color: #4CAF50;
  color: white;
  margin-left: 30px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

div.inputform {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  max-width: 300px;
}
</style>

</head>
<body>
<?php
  include ($contentPage);
?>
</body>
</html>
