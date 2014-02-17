<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

define('LIB_PATH', dirname(__FILE__));

class Boot
{
    public $CI;

    public function Boot()
    {

        $this->CI =&get_instance();
        define('appId','210842832428548');
        define('secret','08a8c39ad1ee449fec58cc728e43e315');
        define('randkey','s]jvl6dq');
        $config['appId'] = appId;
        $config['secret'] = secret;
        //Do you want cookies enabled?
        $config['cookie'] = true;
        //Do you want cookies enabled?
        $config['cookie'] = true;
         //load Facebook php-sdk library with $config[] options
         //$this->CI->load->library('Facebook', $config);
         //$CI =& get_instance();

        if ($this->CI->input->ip_address()!="127.0.0.1") {
            //$_SERVER['DOCUMENT_ROOT']="";
            define('BASE_URL', 'http://www.thaidhome.com/');
        } else {
            define('BASE_URL', base_url());
        }

        define("TITLE_PAGE", " : เพื่อนคู่ใจในการเลือกซื้อบ้านดี ทำเลทอง พร้อมรีวิวและข่าวสารอัพเดต");

    }

}
