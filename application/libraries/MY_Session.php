<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * CI Session Class Extension for AJAX calls.
 * ------------------------------------------------------------------------
 *
 * ====- Save as application/libraries/MY_Session.php -====
 */
header('Access-Control-Allow-Origin: *');
require BASEPATH . 'libraries/Session/Session.php';

class MY_Session extends CI_Session {

    // --------------------------------------------------------------------

    /**
     * sess_update()
     *
     * Do not update an existing session on ajax or xajax calls
     *
     * @access    public
     * @return    void
     */
    public function sess_update()
    {
        $CI = get_instance();

        if ( $CI->input->is_ajax_request())
        {
            parent::sess_update();
        }
    }

}

// ------------------------------------------------------------------------
/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */