
<?php 
include "../connect.php"; 
    $id_item= isset($_POST['Idp'])?$_POST['Idp']:false; 
    $Name = isset($_POST['Name'])?$_POST['Name']:false;
    $Categ = isset($_POST['Categ'])?$_POST['Categ']:false;
    $Price = isset($_POST['Price'])?$_POST['Price']:false;
    $Descr = isset($_POST['Descr'])?$_POST['Descr']:false;

    $product = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from  `Product` 
    INNER JOIN Category on Product.Category_id = Category.Category_id 
     where `Id_product` = '$id_item' "));
    $check_update = false;
    $query_update = " UPDATE `Product` SET ";
    if ($product["Name"] != $Name) {
        $query_update .= " `Name` = '$Name', ";
        $check_update = true;
        echo $Name;
        
    }
    if ($product["Price"] != $Price) {
        $query_update .= " Price = $Price, ";
        $check_update = true;
    }
    if ($product["Category_id"] != $Categ) {
        $query_update .= " Category_id = '$Categ' , ";
        $check_update = true;
    }
    if ($product["Description"] != $Descr) {
      $query_update .= " Description = '$Descr', ";
      $check_update = true;
    }
      if ($check_update) {
        $query_update = substr($query_update, 0, -2);
        $query_update .= " WHERE Id_product = '$id_item'";
        $result = mysqli_query($con, $query_update);
        if ($result) {
            echo "<script>alert('Данные изменены!'); location.href = 'newTovar.php';</script>";   
        }
    } else {
        echo"<script>alert('Товар актуален');
        location.href = 'newTovar.php';
        </script>";
    }



?>
