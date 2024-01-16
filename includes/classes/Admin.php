<?php

class Admin
{
    private $db;
    private $email;

    public function __construct($pEmail)
    {
        $this->db=new Database();
        $this->email=$pEmail;
    }

    // public function isValidLogin($pPassword)
    // {
    //     $sql="SELECT password FROM user WHERE email=:email AND is_Admin=true";

    //     $values=array(array(':email',$this->email));

    //     $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);

    //     if(isset($result['password']) && password_verify($pPassword,$result['password']))
    //         {
    //             return true;
    //         }
    //         else
    //         {
    //             return false;
    //         }
    // }

    public function isValidLogin()
    {
        $sql="SELECT password,verify_status FROM user WHERE email=:email AND is_Admin=true";

        $values=array(array(':email',$this->email));

        $result=$this->db->queryDB($sql,Database::SELECTSINGLE,$values);
        if(count($result)==0)
        {
            return false;
        }
        else
        {
            return $result;
        }

        // if(isset($result['password']) && password_verify($pPassword,$result['password']))
        //     {
        //         return true;
        //     }
        //     else
        //     {
        //         return false;
        //     }
    }

    

    public function insertIntoProductDB($name,$description,$price){
        $sql="INSERT INTO product (name,description,price) VALUES (:name,:description,:price)";

        $values=array(array(':name',$name),array(':description',$description),array(':price',$price));

        $this->db->queryDB($sql,Database::EXECUTE, $values);
    }
    
    public function insertIntoImageDB($name,$location){

        $sql="INSERT INTO image (name,location) VALUES (:name,:location)";

        $values=array(array(':name',$name),array(':location',$location));

        $this->db->queryDB($sql,Database::EXECUTE, $values);
    }
    
    public function deleteProductDB($name)
    {
        $sql="DELETE FROM product WHERE name=:name";
        $values=array(array(':name',$name));
        $this->db->queryDB($sql,Database::EXECUTE, $values);
    }
    public function deleteImageDB($name)
    {
        $sql="DELETE FROM image WHERE name=:name";
        $values=array(array(':name',$name));
        $this->db->queryDB($sql,Database::EXECUTE, $values);
    }
}
