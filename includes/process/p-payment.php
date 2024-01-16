<?php
if(isset($_POST['submit']))
{
    $customer=$_POST['customer'];
    $location=$_POST['address'];
    $amount=$_POST['amount'];
    $email=$_POST['Email'];
    // echo $_POST['amount'];
    $product_names=array_column($_SESSION['add-toCard'],"product-name");
    $member = new BlogMember('','','');
    $products='';
    foreach($product_names as $product)
    {
        $products=$products.",".$product;
    }
    $member->InsertOrderDB($email,$products,$customer,$location,$amount);
    unset($_SESSION['add-toCard']);
    header("Location:index.php");
    
}
?>