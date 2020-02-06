<?php 

/**
* 
*/
class BlogsModel extends CI_Model
{

/* For Insert */

  public function Blogs_Insert($data)
  {
  return $this->db->insert('blog',$data);  
  }

/* For Update */

  public function Blogs_Update($id,$data)
  {
     return $this->db->where('blogId',$id)
                     ->update('blog',$data);
  }

/* For Delete */

  public function Blogs_Delete($id)
  {
    return $this->db->delete('blog',['blogId'=>$id]);
  }

/* For Select */

  public function Blogs_Select($id=null)
  {
  if($id!=null)
    {
    $sel = $this->db->select('*')    
                    ->from('blog')
                    ->where('blogId',$id)
                    ->order_by('`blogId`','DESC')
                    ->get();
         return $sel->result();
       }
       else{
         $sel = $this->db->select('*')    
                    ->from('blog')
                    ->order_by('`blogId`','DESC')
                    ->get();
         return $sel->result();
       }
  }
}
?>