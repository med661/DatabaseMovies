
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <?php
$name=$_POST['name'];
$comment=$_POST['comment'];
echo $comment;
echo $name;
$conn = new mysqli("127.0.0.1","root","","ec");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO comments (name,comment)
VALUES ('$name','$comment')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("location:boutique.php");

  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>





</body>
</html>
