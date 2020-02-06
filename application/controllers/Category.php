<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Category extends REST_Controller {
    
     
    public function __construct() {
       parent::__construct();
       $this->load->model('CategoryModel');
    }


/* For Insert */

    public function AddCategory_post()
    {
        $status=array();
        $post=$this->post();   
        $Add=$this->CategoryModel->Category_Insert($post);        
       if($Add) {
         $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
    }

/* For Upadte */
     
    public function UpdateCategory_post()
    {
         $status=array();
         $data = $this->post();
         $id= $this->post('id');
         unset($data['id']);
         $Update = $this->CategoryModel->Category_Update($id,$data);
        if ($Update) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
            }
            $this->response($status, REST_Controller::HTTP_OK);
    }
    
/* For Delete */
 
    public function DeleteCategory_delete($id)
    {
        $Delete = $this->CategoryModel->Category_Delete($id);
       if ($Delete) {
            $status["status"]=true;
        }
        else{
            $status["status"]=false;
        }
        $this->response($status, REST_Controller::HTTP_OK);
      }


/* For Display */

    public function SelectCategory_get($id=null)
    {
     if($id!=null)
        $Select = $this->CategoryModel->Category_Select($id);
    else
        $Select = $this->CategoryModel->Category_Select();
        $this->response($Select,REST_Controller::HTTP_OK);
    }
        
}
?>