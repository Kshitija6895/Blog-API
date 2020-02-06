<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImageUpload extends \CI_Controller{

    // --------------------------------------------------------------------

    /**
     * sess_update()
     *
     * Do not update an existing session on ajax or xajax calls
     *
     * @access    public
     * @return    void
     */
    public function uploadImage($file,$name,$path)
    {
    	if($file=="" && $name=="" && $path==""){
    		return "Invalid Parameters";
    	}
    	else{
    	$config=[
'upload_path' => $path,
'allowed_types' => 'gif|jpg|png|jpeg|JPG|JPEG|PNG',
'remove_spaces' => 'TRUE',
];
$this->load->library('upload',$config);	
if($this->upload->do_upload($file)){
$data=$this->upload->data();
$image_path=base_url("assets/images/".$data['raw_name'].$data['file_ext']);
}
else
{
	$image_path=$this->upload->display_errors();
}
return $image_path;
       }
   }
}

// ------------------------------------------------------------------------
/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */