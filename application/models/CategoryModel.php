<?php 

/**
* 
*/
class CategoryModel extends CI_Model
{

/* For Insert */

  public function Category_Insert($data)
  {
  return $this->db->insert('category',$data);  
  }

/* For Update */

  public function Category_Update($id,$data)
  {
     return $this->db->where('categoryId',$id)
                     ->update('category',$data);
  }

 /* For Delete */ 

  public function Category_Delete($id)
  {
    return $this->db->delete('category',['categoryId'=>$id]);
  }

/* For Display */

  public function Category_Select($id=null)
  {
    if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('category')
                    ->where('categoryId',$id)
                    ->order_by('`categoryId`','DESC')
                    ->get();
         return $sel->result();
      }
      else{
         $sel = $this->db->select('*')    
                    ->from('category')
                    ->order_by('`categoryId`','DESC')
                    ->get();
         return $sel->result();
      }
  }
}
?>
