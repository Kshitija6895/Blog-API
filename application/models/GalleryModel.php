<?php 

/**
* 
*/
class GalleryModel extends CI_Model
{

/* For Insert */

  public function Gallery_Insert($images)
   {
   return  $this->db->insert('gallery',$images); 
   } 


  /* For Delete Gallery Images */ 

  public function Gallery_Delete($id)
  {
     return  $this->db->delete('`gallery`',['galleryId'=>$id]);
  }

/* For Display */

  public function Gallery_Select()
  {
  $sel = $this->db->select('*')    
                  ->from('`Gallery`')
                  ->order_by('`galleryId`','DESC')
                  ->get();
         return $sel->result();
        

  }
}
?>
