<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//print_r($_SERVER['HTTP_HOST']);
//
/*
switch ($_SERVER['HTTP_HOST']) {
    case 'subdomain.domain.com':
        $route['default_controller'] = "company/index/subdomain";
        break;
    default:
        $route['default_controller'] = "welcome"; 
        break;
}*/
$route['default_controller'] = "welcome"; 
//$route['404_override'] = 'error/index';
$route['404_override'] = "";




/*
$route['view/(:num)'] = "reviews/view/$1";
$route['view/(:num).html'] = "reviews/view/$1/";

*/

$route['ajax/(:any)'] = 'ajax_$1/$2/';
$route['ajax/(:any)'] = 'ajax_$1/$2';

switch ($_SERVER['HTTP_HOST']) {
    case 'member.thaidhome.com':

        break;

    case 'reviews.thaidhome.com':

            if (preg_match('/-(?P<digit>\d+).html/', $_SERVER['REQUEST_URI'])){

                $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            }

    		$route['(:any)/(:any).html'] = 'view/$2/';
			$route['(:any)/(:any)'] = 'view/$2';
			$route['(:any)'] = 'category/$1';
        break;
    case 'news.thaidhome.com':
            if (preg_match('/-(?P<digit>\d+).html/', $_SERVER['REQUEST_URI'])){

                $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            }
    		$route['(:any)/(:any).html'] = 'view/$2/';
			$route['(:any)/(:any)'] = 'view/$2';
			$route['(:any)'] = 'category/$1';
        break;
	case 'prakard.thaidhome.com':

    		//$route['topic/(:any).html'] = 'topic/$2/';
			//$route['topic/(:any)'] = 'topic/$2';
			//$route['(:any)/(:any).html'] = 'projects/$2/';
			//$route['(:any)/(:any)'] = 'projects/$2';
			//$route['(:any)'] = 'category/$1';

        break;   
    case 'webboard.thaidhome.com':

    		//$route['topic/(:any).html'] = 'topic/$2/';
			//$route['topic/(:any)'] = 'topic/$2';
			//$route['(:any)/(:any).html'] = 'projects/$2/';
			//$route['(:any)/(:any)'] = 'projects/$2';
			//$route['(:any)'] = 'category/$1';

        break;    
    case 'condo.thaidhome.com':
            $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            $route['(:any)/(:any).html'] = 'view/$2/';

			$route['(:any)/(:any)'] = 'view/$2';
	        		
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
  

	    break;
    case 'project.thaidhome.com':

            //http://townhouse.thaidhome.com/Sansiri/sharrre.php
            $route['(:any)/sharrre.php'] = 'sharrre';    
            $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';
                    
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
  

        break;
    case 'singlehouse.thaidhome.com':

            //http://townhouse.thaidhome.com/Sansiri/sharrre.php
            $route['(:any)/sharrre.php'] = 'sharrre';
    
            $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';
                    
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
  

        break;  
        
    case 'townhouse.thaidhome.com':
            //http://townhouse.thaidhome.com/Sansiri/sharrre.php
            $route['(:any)/sharrre.php'] = 'sharrre';
            $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';
                    
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
  

        break;          
    case 'company.thaidhome.com':
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';

            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';

        break;   
    case 'living.thaidhome.com':
            if (preg_match('/-(?P<digit>\d+).html/', $_SERVER['REQUEST_URI'])){

                $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            }
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';
            
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
        break;   
    case 'hometv.thaidhome.com':
            if (preg_match('/-(?P<digit>\d+).html/', $_SERVER['REQUEST_URI'])){

                $route['(:any)/(:any)-(:num).html'] = 'view/$3/';
            }
            $route['(:any)/(:any).html'] = 'view/$2/';
            $route['(:any)/(:any)'] = 'view/$2';
            
            $route['(:any)-(:num)'] = "category/$2";
            $route['(:any)'] = 'category/$1';
        break; 
    default:
        
        break;
}



// Admin Phase
$route['admin'] = "admin/login";
$route['admin/(:any)/(:any)/(:any)/(:any)/(:any)'] = "admin/$1/$2/$3/$4/$5";
$route['admin/(:any)/(:any)/(:any)/(:any)'] = "admin/$1/$2/$3/$4";
$route['admin/(:any)/(:any)/(:any)'] = "admin/$1/$2/$3";
$route['admin/(:any)/(:any)'] = "admin/$1/$2";
$route['admin/(:any)'] = "admin/$1";

//http://www.seesan.dev/backoffice/document/download/4
/* End of file routes.php */
/* Location: ./application/config/routes.php */