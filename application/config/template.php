<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Active template
|--------------------------------------------------------------------------
|
| The $template['active_template'] setting lets you choose which template 
| group to make active.  By default there is only one group (the 
| "default" group).
|
*/
$template['active_template'] = 'default';

/*
|--------------------------------------------------------------------------
| Explaination of template group variables
|--------------------------------------------------------------------------
|
| ['template'] The filename of your master template file in the Views folder.
|   Typically this file will contain a full XHTML skeleton that outputs your
|   full template or region per region. Include the file extension if other
|   than ".php"
| ['regions'] Places within the template where your content may land. 
|   You may also include default markup, wrappers and attributes here 
|   (though not recommended). Region keys must be translatable into variables 
|   (no spaces or dashes, etc)
| ['parser'] The parser class/library to use for the parse_view() method
|   NOTE: See http://codeigniter.com/forums/viewthread/60050/P0/ for a good
|   Smarty Parser that works perfectly with Template
| ['parse_template'] FALSE (default) to treat master template as a View. TRUE
|   to user parser (see above) on the master template
|
| Region information can be extended by setting the following variables:
| ['content'] Must be an array! Use to set default region content
| ['name'] A string to identify the region beyond what it is defined by its key.
| ['wrapper'] An HTML element to wrap the region contents in. (We 
|   recommend doing this in your template file.)
| ['attributes'] Multidimensional array defining HTML attributes of the 
|   wrapper. (We recommend doing this in your template file.)
|
| Example:
| $template['default']['regions'] = array(
|    'header' => array(
|       'content' => array('<h1>Welcome</h1>','<p>Hello World</p>'),
|       'name' => 'Page Header',
|       'wrapper' => '<div>',
|       'attributes' => array('id' => 'header', 'class' => 'clearfix')
|    )
| );
|
*/

/*
|--------------------------------------------------------------------------
| Default Template Configuration (adjust this or create your own)
|--------------------------------------------------------------------------
*/

$template['default']['template'] = 'template';
$template['default']['regions'] = array(
	'title' => array(
		'content' => array('ThaiDHome.COM : เพื่อนคู่ใจในการเลือกซื้อบ้านดี ทำเลทอง พร้อมรีวิวและข่าวสารอัพเดต')
	),
	'keywords' => array(
		'content' => array('ขายบ้าน , ขายคอนโด , เช่าคอนโด , บ้านเช่า , เช่าบ้าน , คอนโดมิเนียม , ประกาศขายบ้าน , ประกาศขายคอนโด , ประกาศให้เช่าคอนโด , ประกาศขายคอนโด , ประกาศขายอสังหาริมทรัพย์ กรุงเทพฯ ทั่วไทย , บ้านมือสอง ที่ดิน ประกาศ ขายบ้าน ซื้อบ้าน , ฝากขายบ้าน ฟรี , ค้นหาบ้าน , ให้เช่าบ้านเดี่ยว , ให้เช่าทาวน์เฮ้าส์ , ให้เช่าคอนโด , ให้เช่าตึกแถว , ให้เช่าอาคารพาณิชย์ , ให้เช่าที่ดินเปล่า , อสังหาริมทรัพย์ , บ้านพร้อมอยู่ , หาบ้านมาฝากขาย , ศูนย์กลางอสังหาริมทรัพย์ , ค้นหาบ้านมือสอง , ศูนย์รวมขายบ้าน , ที่อยู่อาศัย , ขายคอนโดมิเนียม , ขายฝาก , ฝากขาย , ที่ดินขาย , ที่ดินเปล่า , ขายทาวน์เฮ้าส์ , ขายอาคารพาณิชย์ , ขาย ที่อยู่อาศัย , บ้านให้เช่า , ซื้อขายที่ดิน , ซื้อที่ดิน , ซื้อที่ , ขายที่ , หาบ้าน , ค้นหาบ้าน , ให้เช่าบ้าน , ซื้อบ้าน , บ้านฝากขาย , ฝากขายบ้าน , เช่า ซื้อ ขาย อสังหาริมทรัพย์ กรุงเทพ , รับ-ฝากขายบ้าน ,รับ-ฝากขายบ้าน กรุงเทพ , บ้านราคาถูก , ศูนย์รวมอสังหาริมทรัพย์ , ประกาศฟรี , ประกาศขายฟรี , ประกาศให้เช่าฟรี , เว็บบอร์ด , รีวิว , ข่าว , โปรโมชั่น ,')
	),
	'description' => array(
		'content' => array('ThaiDHome.com | ข้อมูลซื้่อบ้าน ทาวน์เฮ้าส์ ข่าว รีวิว เว็บบอร์ด ประกาศขาย ข้อมูลละเอียด เข้าใจง่าย ครบถ้วนที่สุด ')
	),
	'meta_tag'=>array(
	'content'=>array('<META name="robots" content="index,follow">')
	),
	'meta_og_title'=>array(
	'content'=>array('')
	),	
	'meta_og_images'=>array(
	'content'=>array('')
	),	
	'meta_og_description'=>array(
	'content'=>array('')
	),
	'header',
	'content',
	'sub_content',
	'footer',
);
$template['default']['parser'] = 'parser';
$template['default']['parser_method'] = 'parse';
$template['default']['parse_template'] = FALSE;
$template['default']['folder'] = 'default';


/* backoffice  */
$template['backoffice']['template'] = 'template';
$template['backoffice']['regions'] = array(
	'title' => array(
		'content' => array('Backoffice Manager')
	),
   'tools',
   'side_menu',
   'header',
   'content',
   'breadcrumbs',
   'footer',
);


$template['backoffice']['parser'] = 'parser';
$template['backoffice']['parser_method'] = 'parse';
$template['backoffice']['parse_template'] = FALSE;
//$template['backoffice']['folder'] = 'metisadmin';
$template['backoffice']['folder'] = 'aceadmin';



/* blank  */
$template['blank']['template'] = 'template';
$template['blank']['regions'] = array(
	'title' => array(
		'content' => array('Blank')
	),
   'header',
   'content',
   'footer',
);
$template['blank']['parser'] = 'parser';
$template['blank']['parser_method'] = 'parse';
$template['blank']['parse_template'] = FALSE;
$template['blank']['folder'] = 'blank';



/* popup  */

$template['popup']['template'] = 'template';

$template['popup']['regions'] = array(
   'header',
   'content',
   'footer',
);

$template['popup']['parser'] = 'parser';
$template['popup']['parser_method'] = 'parse';
$template['popup']['parse_template'] = FALSE;
$template['popup']['folder'] = 'popup';

/* End of file template.php */
/* Location: ./system/application/config/template.php */