<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title><?php echo $title;?></title>

  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--basic styles-->

  <link href="<?php echo base_url('assets/aceadmin/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/aceadmin/css/bootstrap-responsive.min.css');?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/font-awesome.min.css');?>" />

    <!--[if IE 7]>
      <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/font-awesome-ie7.min.css');?>" />
      <![endif]-->

      <!--page specific plugin styles-->
      <?php echo $_styles;?>
      <!--fonts-->
      <!-- fonts google-->
    <!--
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
  -->
  <!--ace styles-->

  <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/ace.min.css');?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/ace-responsive.min.css');?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/ace-skins.min.css');?>" />

    <!--[if lte IE 8]>
      <link rel="stylesheet" href="<?php echo base_url('assets/aceadmin/css/ace-ie.min.css');?>" />
      <![endif]-->

      <!--inline styles if any-->

      <!--basic scripts-->

      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript">
      window.jQuery || document.write("<script src='<?php echo base_url('assets/aceadmin/js/jquery-1.9.1.min.js');?>'>"+"<"+"/script>");
      </script>
      <script src="<?php echo base_url('assets/aceadmin/js/bootstrap.min.js');?>"></script>

      <!--page specific plugin scripts-->
      <script src="<?php echo base_url('assets/aceadmin/js/jquery.validate.min.js');?>"></script>
      <!--ace scripts-->

      <script src="<?php echo base_url('assets/aceadmin/js/ace-elements.min.js');?>"></script>
      <script src="<?php echo base_url('assets/aceadmin/js/ace.min.js');?>"></script>
      <style type="text/css">
      body{
        font-family: "Arial", "Verdana", sans-serif;
      }
      </style>
      <?php echo $_scripts;?>
    </head>

    <body>

      <?php include("template_header.php");?>

      <div class="container-fluid" id="main-container">
        <a id="menu-toggler" href="#">
          <span></span>
        </a>

        <?php include("menu.php");?>

        <div id="main-content" class="clearfix">
          <div id="breadcrumbs">
            <?php echo $breadcrumbs;?>
          </div>

          <!--PAGE CONTENT BEGINS HERE-->
          <?php echo $content;?>
          <!--PAGE CONTENT ENDS HERE-->


          <div id="ace-settings-container">
            <div class="btn btn-app btn-mini btn-warning" id="ace-settings-btn">
              <i class="icon-cog"></i>
            </div>

            <div id="ace-settings-box">
              <div>
                <div class="pull-left">
                  <select id="skin-colorpicker" class="hidden">
                    <option data-class="default" value="#438EB9">#438EB9</option>
                    <option data-class="skin-1" value="#222A2D">#222A2D</option>
                    <option data-class="skin-2" value="#C6487E">#C6487E</option>
                    <option data-class="skin-3" value="#D0D0D0">#D0D0D0</option>
                  </select>
                </div>
                <span>&nbsp; Choose Skin</span>
              </div>

              <div>
                <input type="checkbox" class="ace-checkbox-2" id="ace-settings-header" />
                <label class="lbl" for="ace-settings-header"> Fixed Header</label>
              </div>

              <div>
                <input type="checkbox" class="ace-checkbox-2" id="ace-settings-sidebar" />
                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
              </div>
            </div>
          </div><!--/#ace-settings-container-->
        </div><!--/#main-content-->
      </div><!--/.fluid-container#main-container-->



      <a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
      </a>

</body>
</html>
