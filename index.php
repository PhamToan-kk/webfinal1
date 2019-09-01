<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Adminstrator</title>
</head>

<body>
    <div class="content">
        <h1> Product information !!! </h1>
        <table>
            <tr>
                <th class="tit">Id</th>
                <th class="tit">NameProduct</th>
                <th class="tit">Price ($)</th>
                <th class="tit">Description</th>
                <th class="tit">Image</th>
                <th class="tit">Delete</th>

            </tr>

            <?php
            require_once './database.php';
            $sql = "SELECT * FROM product";
            $stmt = $pdo->prepare($sql);
            foreach ($pdo->query($sql) as $row) {
            ?>
                <tr >
                    <td class="info"><?php echo $row['productid']?></td> 
                    <td class="info"><?php echo $row['proname']?></td> 
                    <td class="info"><?php echo $row['price']?></td> 
                    <td class="info"><?php echo $row['descrip']?></td> 
                    <td class="info"><img src="uploads/<?php echo $row['hinhanh'] ?>" width="100" height="100"></td> 
                     <td class="info">
                        <form action='/delete.php' method="POST" >
                            <input  type='hidden' name='productid' value='<?php echo $row['productid']?>'><br>
                            <input class="edit-btn" type='submit' value='Delete' width="100">
                        </form> <br>
                    </td>
                </tr>
            <?php
            }
            ?> 
        </table>
        <button class="nut"><a href="add.php">Add  Product</a></button>
    </div>
</body>

</html>