<?php

include "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $image_name = $_FILES["image"]["name"];
    $image_tmp = $_FILES["image"]["tmp_name"];
    $name=$_POST["name"];
        $location=$_POST["location"];
        $price=$_POST["type"];

    $image_path = "uploads/" . $image_name;

    move_uploaded_file($image_tmp, $image_path);

    $sql = $conn->prepare("INSERT INTO addprop(name,location,price,type,imagepath) VALUES(?,?,?,?,?)");

    $sql->bind_param("ssdss", $name,$location,$price,$type,$image_path);

    if($sql->execute())
    {
        echo "Data Inserted";
    }
    $sql->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><body>
<form method="POST" enctype="multipart/form-data">
Property Name :
    <input type="text" name="name"><br>
    Location:
    <input type="text" name="location" id=""><br>

    

    Price:
    <input type+="number" name="price"><br>

    Property Type:
    <input type="text" name="type" id=""><br>

    Select Image:
    <input type="file" name="image">

    <br><br>

    <input type="submit" value="Upload">

</form>
</body>
</html>





