<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Gallery extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       $this->load->model('GalleryModel');
    }


/* For Insert */

    public function AddGallery_post()
    {
     $status=array();
          $count=$this->post('count');
          for($i=0;$i<(int) $count;$i++)
          {
            $image_path=$this->ImageUpload("galleryImage".$i,"gallery","/assets/images/gallery/");
           $images=[
                "galleryCaption"=> $this->post('galleryCaption'),
                "galleryImage"=>$image_path
            ]; 
            $Add=$this->GalleryModel->Gallery_Insert($images);
            if ($Add) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
          }           
         
           $this->response($status, REST_Controller::HTTP_OK);            
       }


/* For Delete Image */
 
    public function DeleteGallery_delete($id)
    {
        $Delete = $this->GalleryModel->Gallery_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectGallery_get()
    {
        $Select = $this->GalleryModel->Gallery_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }

   public  function ImageUpload($file,$name,$path){
      $config=[
'upload_path' => ".".$path,
'allowed_types' => 'gif|jpg|png|jpeg|JPG|JPEG|PNG',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config); 
if($this->upload->do_upload($file)){
$data=$this->upload->data();
$image_path=base_url($path.$data['raw_name'].$data['file_ext']);
}
else{
  $image_path=$file;
  //$this->upload->display_errors();
}
return $image_path;
    }
}
?>