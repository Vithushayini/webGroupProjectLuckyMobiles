<?php
    $h = new Helper();
    $name='';
    $description='';
    $price='';
    $msg='';
    $filePath='';
    
    if(isset($_POST['submit']))
    {   
        // $name=$_POST['name'];
        $name=strtolower($_POST['name']);
        $description=$_POST['description'];
        $price=$_POST['price'];
        
        //image uploading
        $img_name=$_FILES['img_upload']['name'];
        $tmp_img_name=$_FILES['img_upload']['tmp_name'];
        $folder='upload/';
        $filePath =$folder.$img_name;
        move_uploaded_file($tmp_img_name,$filePath);
        
        if ($h->isEmpty(array($name,$description, $price)))
        {
            $msg = 'All fields are required';
        }
        else
        {
            if(isset($_SESSION['is_Sadmin']))
            {
                $Sadmin=new SuperAdmin($_SESSION['email']);
                $Sadmin->insertIntoImageDB($name,$filePath);
                $Sadmin->insertIntoProductDB($name,$description,$price);
                $msg='Product added successfully';
            }
            else if(isset($_SESSION['is_Admin']))
            {
                $admin=new Admin($_SESSION['email']);
                $admin->insertIntoImageDB($name,$filePath);
                $admin->insertIntoProductDB($name,$description,$price);
                $msg='Product added successfully';
            }
        }
    }
    
   
