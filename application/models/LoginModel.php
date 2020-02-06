<?php 

/**
* 
*/
class LoginModel extends CI_Model
{

  public function Login($userName,$password)  {  
  	
            $Login = $this->db->where(['userName'=> $userName,'password'=> $password])
                               ->from('user')
                               ->get();
           return  $Login->row_array();

      
  } 


}
?>