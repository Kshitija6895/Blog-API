<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Blogs extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       $this->load->model('BlogsModel');
    }


/* For Insert */

    public function AddBlogs_post()
    {
        $status=array();
        $post=$this->post();
        $image_path=$this->ImageUpload("blogImage","Image","/assets/images/blog/");
        $post["blogImage"]=$image_path;       
        $Add=$this->BlogsModel->Blogs_Insert($post);        
         if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
          }
        $this->response($status, REST_Controller::HTTP_OK);
    }
 

/* For Update */
    
    public function UpdateBlogs_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $photo = $this->post('blogImage');
         if(strpos($photo, 'http') !== false)
         {
            $post["blogImage"]=$photo;
         }
         else{
          $image_path=$this->ImageUpload("blogImage","Image","/assets/images/blog/");
          $post["blogImage"]=$image_path;
          }
         $Update = $this->BlogsModel->Blogs_Update($id,$data);
         if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }


/* For Delete */

    public function DeleteBlogs_delete($id)
    {
        $Delete = $this->BlogsModel->Blogs_Delete($id);
        if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectBlogs_get($id=null)
    {
        if($id!=null)
        $Select = $this->BlogsModel->Blogs_Select($id);
        else
            $Select = $this->BlogsModel->Blogs_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }


/* For Image Upload */

  public  function ImageUpload($image,$name,$path){
      $config=[
'upload_path' => ".".$path,
'allowed_types' => 'gif|jpg|png|jpeg|JPG|JPEG|PNG',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config); 
if($this->upload->do_upload($image)){
$data=$this->upload->data();
$image_path=base_url($path.$data['raw_name'].$data['file_ext']);
}
else{
  $image_path=false;
}
return $image_path;
    }
        

/* For Video Upload */

  public  function VideoUpload($video,$name,$path){
      $config1=[
'upload_path' => ".".$path,
'allowed_types' => 'mp4|OGG|WMV|3GP',
'max_size' => '10240',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config1); 
$data=$this->upload->initialize($config1);
if($this->upload->do_upload($video)){
$data=$this->upload->data();
$Video_path=base_url($path.$data['raw_name'].$data['file_ext']);
}
else{
  $Video_path=false;
}
return $Video_path;
    }
        
}
?>