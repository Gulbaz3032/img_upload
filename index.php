<?php 
$conn = new mysqli ('localhost', 'root', '', 'img');
if ($_POST) {
    $name = $_POST['name'];
    $img_name = $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['tmp_name'];

    $img_type = $_FILES['img']['type'];
    $type_split = explode('/', $img_type);
    $img_ext = end($type_split);

    $req_ext = ['jpg', 'png', 'jpeg'];
    
    if (in_array($img_ext, $req_ext)) {
        if ($img_size > 2000000) {
            echo "Img is too large";
        } else {
            $img_name = rand().$img_name;
            $sql = "INSERT INTO uploads (name, img) VALUES ('{$name}', '{$img_name}')";
            $res = $conn->query($sql);
            if ($res > 0) {
                move_uploaded_file($img_tmp_name, "uploads/".$img_name);
                echo "success";
            } else {
                echo "failure";
            }
        }
    } else {
        echo "Inappropriate format";
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img Upload</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name..."><br>
        <input type="file" name="img">
        <input type="submit">
    </form>
</body>
</html>