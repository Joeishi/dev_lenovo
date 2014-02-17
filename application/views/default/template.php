<?php

  $status_login = login_status();

    if (empty($_GET['code']) == false) {

     $form_login	   = get_form_login($_GET['code']);
     $iframe_register  = GetDomainName("www","profile/register?username=".urlencode($form_login['facebook']['username'])."&email=".urlencode($form_login['facebook']['email'])."&fbid=".urlencode($form_login['facebook']['uid']));

       if (isset($form_login['facebook']['status_register'])) {
             if ($form_login['facebook']['status_register'] == 0) {
                   $form_register_html = <<<txt
			top.location.href = "http://www.checkcondo.com/profile/register/";
txt;
              } else {
				  $email  = $form_login['facebook']['email'];
				  $uid    = $form_login['facebook']['uid'];
		

				  $form_register_html = <<<txt

          top.location.href = "http://www.checkcondo.com/profile/post_login_form?email={$email}&fbid={$uid}&login=fb";
txt;
          }
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
    <title><?php echo $title;?></title>
    <meta name="msvalidate.01" content="7D4FAC5F0C5FD59308AC99B59B1EC86F" />
    <meta name="description" content="<?php echo $description;?>">
    <meta name="keywords" content="<?php echo $keywords;?>">
    
    <meta property="og:site_name" content="Checkcondo">
    <meta property="og:url" content="<?php echo current_url();?>">
    <?php echo $meta_og_title;?>
    <?php echo $meta_og_images;?>
    <?php echo $meta_og_description;?>
    <meta property="fb:app_id" content="<?php echo appId;?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta name="viewport" content="width=1240">-->
    <link rel="shortcut icon" href="<?php echo GetDomainName('www','assets/default/img/favicon.ico');?>" />
    <link type="text/css" href="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/css/bootstrap.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/js/bootstrap-select/bootstrap-select.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/js/bootstrap-fileupload/bootstrap-fileupload.min.css');?>" rel="stylesheet">
    <link type="text/css" href="<?php echo GetDomainName('www','assets/default/css/theme.css');?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/js/jquery-1.9.1.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/js/jquery.easing.1.3.js');?>"></script>
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/js/bootstrap-select/bootstrap-select.js');?>"></script>
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/bootstrap-3.0.0/js/bootstrap-fileupload/bootstrap-fileupload.min.js');?>"></script>
    <link href="<?php echo GetDomainName('www','assets/default/js/jscrollpane/jquery.jscrollpane.css');?>" rel="stylesheet">
    <script src="<?php echo GetDomainName('www','assets/default/js/jscrollpane/jquery.jscrollpane.min.js');?>"></script>
    <script src="<?php echo GetDomainName('www','assets/default/js/jscrollpane/jquery.mousewheel.js');?>"></script>
    <script src="<?php echo GetDomainName('www','assets/default/js/jscrollpane/mwheelIntent.js');?>"></script>
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/js/fancyapps-fancyBox-v2.1.5/source/jquery.fancybox.js'); ?>"></script>
    <link href="<?php echo GetDomainName('www','assets/default/js/fancyapps-fancyBox-v2.1.5/source/jquery.fancybox.css'); ?>" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo GetDomainName('www','assets/default/js/lightbox.js'); ?>"></script>
    <?php echo $_styles;?><?php echo $_scripts;?>
    <link type="text/css" href="<?php echo GetDomainName('www','assets/default/css/responsive.css');?>" rel="stylesheet">
    <script type="text/javascript">
    $(function () {

      $(document).on('click','#fcb_close',function () {
          $.fancybox.close();
          parent.$.fancybox.close();
      });
      $(".btn-write").click(function () {
        $(".btn-profile").next("ul").hide();
        $(".btn-profile").parent().removeClass("active");
        $(this).next("ul").slideToggle("fast");
        $(this).parent().toggleClass("active");
      });
      $(".btn-profile").click(function () {
        $(".btn-write").next("ul").hide();
        $(".btn-write").parent().removeClass("active");
        $(this).next("ul").slideToggle("fast");
        $(this).parent().toggleClass("active");
      });
      $(".item-list > ul li").hover(function () {
        $(this).find(".intro").stop().animate({bottom:0},1000,"easeOutExpo");
      },function () {
        $(this).find(".intro").stop().animate({bottom:-200},1000,"easeOutExpo");
      });

      <?php if (isset($form_register_html)) : echo $form_register_html;endif; ?>
    });
    </script>
    <script type="text/javascript">

    $(function () {
		
		$(".col-w160").hover(function(){
			$(".jspVerticalBar").addClass("trackHover");
			$(".jspDrag").stop().animate({opacity:1});
		},function(){
			setTimeout(function(){
				$(".jspDrag").stop().animate({opacity:0});
				$(".jspVerticalBar").removeClass("trackHover");
			},1500);
		});
		
		$("#btn-sidebar").click(function(){
			$(".col-w160").toggle( "slide" ,function(){
				$(".col-w630").toggleClass("tgSidebar");
			});
		});
		
    });

    $(function () {
        $('.scroll-pane').each(
            function () {
                $(this).jScrollPane(
                    {
						verticalDragMinHeight: 100,
						verticalDragMaxHeight: 100,
                        showArrows: $(this).is('.arrow')
                    }
                );
                var api = $(this).data('jsp');
                var throttleTimeout;
                $(window).bind(
                    'resize',
                    function () {
                        if (!throttleTimeout) {
                            throttleTimeout = setTimeout(
                                function () {
                                    api.reinitialise();
                                    throttleTimeout = null;
                                },
                                50
                            );
                        }
                    }
                );
            }
        )

    });

    </script>
    <script src="<?php echo GetDomainName('www','assets/default/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js');?>"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo GetDomainName('www','assets/default/js/html5shiv.js');?>"></script>
    <script src="<?php echo GetDomainName('www','assets/default/js/respond.min.js');?>"></script>
    <![endif]-->
    </head>
    <style type="text/css">
.topnav > div {
	position: relative;
	z-index: 9;
}
#tools-profile {
	z-index: 900;
}
</style>
    <body>
<?php echo $header;?>
<div class="container">
      <div class="row fixtop">
    <div class="col-sm-12" data-spy="affix" data-offset-top="235">
          <div class="row header">
        <div class="col-lg-5 col-sm-6 col-xs-12 logo"> <a href="<?php echo GetDomainName('www');?>"><img src="<?php echo base_url('assets/default/img/logo-checkcondo.png');?>" alt="CheckCondo.com" class="img-responsive"></a> </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
              <div class="search-box">
            <form action="<?php echo GetDomainName('search');?>" id="search_form" method="get" >
                  <input type="text" name="keywords" value="<?php if(isset($_GET['keywords']))echo $_GET['keywords'];?>" class="form-control">
                  <input type="submit" class="btn-search" value="Search">
                </form>
          </div>
            </div>
        <div class="col-lg-4 col-xs-12">
              <div id="tools">
            <div class="col-sm-12 clearfix">
                  <?php
                if (empty($status_login) == false) {

                  $logout_url			= GetDomainName("www","profile/logout/");
                  $change_password_url  = GetDomainName("www","profile/change_password/");
                  $edit_profile_url     = GetDomainName("www","profile/edit_profile/");
                  $bookmark_url     = GetDomainName("member","bookmark");
                          $post_webboard_url	= "http://webboard.checkcondo.com/posts/";

                  if (isset($status_login['thumb']) AND $status_login['thumb'] != '') {
                        $thumb_user_profile  = resizeimage("/contents/users/".strtotime($status_login['create_date']).$status_login['member_id']."/".$status_login['thumb']);
                  } else {
                        $thumb_user_profile  = base_url('assets/default/img/exam-thumb-80x80.png');
                  }

                  echo <<<html

                <div id="tools-write">
                     <span class="btn-write"></span>
                    <ul class="list-unstyled">
                      <li><a href="{$post_webboard_url}" class="btn-new-topic">ตั้งกระทู้</a></li>
                      <li><a href="http://prakard.checkcondo.com/posts/" class="btn-buy-sell">ประกาศซื้อ/ขาย</a></li>
                      <li><a href="http://www.checkcondo.com/contact/" class="btn-contact">ติดต่อ</a></li>
                    </ul>
                </div>

                <div id="tools-notification"><a href="http://member.checkcondo.com/bookmark/" class="btn-notification"></a></div>

                <div id="tools-profile">
                    <span class="btn-profile"><span class="avatar"><img src="$thumb_user_profile" class="img-responsive"></span></span>
                    <ul class="list-unstyled">
                        <li><a href="{$bookmark_url}">การติดตาม</a></li>
                        <li><a id="popup-change-password" href="{$change_password_url}">เปลี่ยนรหัสผ่าน</a></li>
                        <li><a id="popup-edit-profile" href="{$edit_profile_url}">แก้ไขข้อมูลส่วนตัว</a></li>
                        <li><a href="{$logout_url}">ล็อกเอ้าท์</a></li>
                    </ul>
                </div>

html;

                }
              ?>
                  <?php
                if (empty($status_login) == true) {

                  $login_url    = GetDomainName("www","profile/login/");
                  $register_url = GetDomainName("www","profile/register/");

                  echo <<<html

                <div id="tools-notlogin">
                      <span><a id="popup-profile-login" href="{$login_url}">ล๊อกอิน</a> / <a id="popup-profile-register" href="{$register_url}">สมัครสมาชิก</a></span>
                </div>


html;

                }

                if (empty($status_login) == false) {
					$count_notifications	= count_notifications($status_login['member_id']);
                  echo <<<html

                <div class="col-sm-12 txt-notification clearfix">
                  <p>มีแจ้งเตือนใหม่ <a href="http://www.checkcondo.com/notification/">$count_notifications ข้อความ</a></p>
                </div>
html;
    }
  ?>
                </div>
          </div>
            </div>
      </div>
          <?php include("menu.php");?>
        </div>
  </div>
    </div>
<div class="container"> <?php echo $content;?> </div>
<?php echo $sub_content;?>
<?php include("template_footer.php");?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46016013-1', 'checkcondo.com');
  ga('send', 'pageview');

</script>
<style type="text/css">
#tools-notification{
	z-index: 99;
	position: relative;
}
</style>
</body>
</html>
