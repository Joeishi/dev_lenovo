<?php
/*
get cookie login
*/
$user_info=user_info();
$haystack_menu=array();
$CI =& get_instance();
$segment_data=str_replace($CI->uri->slash_segment(1), "", $CI->uri->uri_string());
if(isset($user_info['menu_data'])){
    $data_menu_login=json_decode($user_info['menu_data'],true);
    $data_menu=$data_menu_login;
   /* foreach($data_menu_login as $key=>$item){
        $data_menu[$key]=$item;
        $haystack_menu[]=$item['url'];
    }
    ksort($data_menu);
*/
    $segs = $this->uri->segment_array();
    $imp_uri=implode("/", $segs);
    $first_segment=$this->uri->segment(1);

}


?>
<div id="sidebar">
    <div id="sidebar-shortcuts">
        <div id="sidebar-shortcuts-large">
            <button class="btn btn-small btn-success">
            <i class="icon-signal"></i>
            </button>
            <button class="btn btn-small btn-info">
            <i class="icon-pencil"></i>
            </button>
            <button class="btn btn-small btn-warning">
            <i class="icon-group"></i>
            </button>
            <button class="btn btn-small btn-danger">
            <i class="icon-cogs"></i>
            </button>
        </div>
        <div id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>
            <span class="btn btn-info"></span>
            <span class="btn btn-warning"></span>
            <span class="btn btn-danger"></span>
        </div>
        </div><!--#sidebar-shortcuts-->
        <ul class="nav nav-list">

            <li <?php if (preg_match("/home/i", $segment_data)) echo 'class="active"';?>>
                <a href="<?php echo base_admin_url('home');?>">
                <i class="icon-dashboard"></i>
                <span><strong>หน้าหลัก</strong></span>
                </a>
            </li>
            <?php if(isset($data_menu)): foreach($data_menu as $item):if($item['url']!="setting" && $item['url']!="home"  )://?>

                <li <?php if (strpos($segment_data, $item['url'])!== false) echo 'class="active"';?>>
                    <a href="<?php echo base_admin_url($item['url']);?>">
                    <i class="<?php if(isset($item['image']) && $item['image']!="" ):echo $item['image'];else:echo "icon-circle-blank";endif; ?>"></i>
                    <span><?php echo ucfirst($item['name']); ?></span>
                    </a>
                </li>

            <?php endif;endforeach;endif;?>

            <?php if(in_array("setting", $haystack_menu)):?>
            <li <?php if(strpos($segment_data, 'setting')!== false)echo 'class="active open"';?> >
                <a href="#" class="dropdown-toggle">
                <i class="icon-lock"></i>
                <span>ตั้งค่า</span>
                <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <?php if(strpos($segment_data, 'setting/permission')!== false)echo 'class="active"';?> >
                        <a href="<?php echo base_admin_url('setting/permission');?>">
                        <i class="icon-double-angle-right"></i>
                        สิทธิการเข้าถึง
                        </a>
                    </li>
                    <li <?php if(strpos($segment_data, 'setting/user')!== false)echo 'class="active"';?>>
                        <a href="<?php echo base_admin_url('setting/user');?>">
                        <i class="icon-double-angle-right"></i>
                        ยูเซอร์
                        </a>
                    </li>
                </ul>
            </li>
            <?php endif;?>
             <li >
                <a href="<?php echo base_admin_url('login?logout=1');?>">
                <i class="icon-exchange"></i>
                <span><strong>Logout</strong></span>
                </a>
            </li>
            </ul><!--/.nav-list-->
            <div id="sidebar-collapse">
                <i class="icon-double-angle-left"></i>
            </div>
        </div>
