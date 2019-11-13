<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>PHP Basics</title>
  <meta name="description" content="PHP Basics">

</head>

<body>
    
<?php
        //1 Creating name variable, assigning it, then displaying it
    $yourName = "Dalton Wolford";
    
        //2
    echo "<h1>$yourName</h1>";
?>

 <h2>
    <?php 
        //3
    echo $yourName; 
    ?>
 </h2>

<?php
        //4 Creating 2 number variables and calculating their total, then displaying it
    $number1 = 4;
    $number2 = 8;
    $total = $number1 + $number2;

        //5
    echo "<p>Number 1 = $number1<br />Number 2 = $number2<br />Total = $total</p>";

?>

<script>

        //6 Creating Array and Displaying it
    <?php echo "var values = ['PHP','HTML', 'Javascript'];";?>
    
    for (var i=0; i<values.length; i++) {
  document.write("Value " +(i+1)+ ": " +values[i]+ "<br />");
}
</script>

</body>
</html>