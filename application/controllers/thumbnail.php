<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thumbnail extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function farms($src='',$w=100,$h=100,$z=1){
			
			$uri = $this->uri->segment_array();
			$uri_asc = $this->uri->uri_to_assoc();
			
		
			
	
			$z=$uri_asc['zc'];
			$target_src=implode("/", array_slice($uri, 9));
			$target_w=$uri_asc['w'];
			$target_h=$uri_asc['h'];
			
			$img_size=@getimagesize($target_src);
			
			if(!$img_size){
				$target_src="assets/images/nopic.jpg";			
			}
			//alert($asc);
			//echo $target_src;
			redirect(base_url("thumb.php?src={$target_src}&w={$target_w}&h={$target_h}&zc={$z}"));
			
		}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */