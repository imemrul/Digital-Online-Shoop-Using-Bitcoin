<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id,  name, username, password');
   $this -> db -> from('user');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>