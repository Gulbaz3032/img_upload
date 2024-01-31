
<?php 

$conn = new mysqli ('localhost', 'root', '', 'img');
$sql = "SELECT *  FROM uploads"; 
$res = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<table class="table w-75 mx-auto">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Img</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $res->fetch_assoc()) { ?>
        <tr>
            <td scope="col"><?php echo $row['id']; ?></td>
            <td scope="col">
                <img width="50px" height="50px" style="border-radius: 50%;border: solid 1px;" src="uploads/<?php echo $row['img']; ?>" alt="">
            </td>
            <td scope="col"><?php echo $row['name']; ?></td>
        </tr>
        <?php } ?>
  </tbody>
</table>
</body>
</html>