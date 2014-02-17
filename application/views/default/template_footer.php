<div class="wrap-footer">
  <div class="container">
    <div class="row footer">
      <div class="col-sm-3 footer-menu"> <img src="<?php echo base_url('assets/default/img/logo-checkcondo-footer.png');?>" alt="CheckCondo.com" class="logo">
        <ul class="list-unstyled">
          <li><a href="<?php echo GetDomainName('www','contact');?>"><small>ติดต่อเรา</small></a></li>
          <li><a href="#"><small>แนะนำติชมเว็บไซต์</small></a></li>
          <li><a href="#"><small>ติดต่อโฆษณา</small></a></li>
          <li><a href="<?php echo GetDomainName('www','privacy');?>"><small>ความเป็นส่วนตัวและเงื่อนไขการใช้งาน</small></a></li>
        </ul>
      </div>
      <div class="col-sm-3 footer-subscribe">
        <h5>รับข่าวสาร</h5>
        <ul class="list-unstyled social clearfix">
          <li><a href="https://www.facebook.com/ThaiDHome" target="_blank" class="icon facebook"></a></li>
          <li><a href="https://twitter.com/ThaiDHome" target="_blank" class="icon twitter"></a></li>
          <li><a href="https://plus.google.com/u/0/106982055017141055608/posts" target="_blank" class="icon googleplus"></a></li>
          <li><a href="http://www.youtube.com/channel/UC-M7DmEHWOtf2GEZmuTI6kg/videos" target="_blank" class="icon youtube"></a></li>
          <li><a href="<?php echo GetDomainName('www','rss/feed');?>" target="_blank" class="icon feed"></a></li>
        </ul>

        <form action="http://checkcondo.us3.list-manage.com/subscribe/post?u=58d3ec01856e28e349336829f&amp;id=a0d8bd1968" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div class="enewsbox" id="mc_embed_signup">
            <input type="email" value="" name="EMAIL" class="form-control email" id="mce-EMAIL"  placeholder="กรอกอีเมลที่นี่...">
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_58d3ec01856e28e349336829f_a0d8bd1968" value=""></div>
            <input type="submit"  value="ส่งข้อมูล" name="subscribe" id="mc-embedded-subscribe" class="btn">
          </div>
        </form>
        
      </div>
       <div class="col-sm-3"><button id="btn_benchmarks" style="display:none" data-status="hide" class="btn btn-warning" >Show/Hide Benchmarks</button></div>
      <div class="col-sm-3">4 </div>
    </div>
  </div>
</div>
<div class="wrap-footer2">
  <div class="container">
    <div class="row footer2">
      <div class="col-sm-12">
        <p class="pull-left">&copy; 2013 <a href="http://www.powernetthailand.com" >Powernet Communication Thailand.</a> All rights reserved.</p>
      <a href="#" class="pull-right btn-scroll-up">Up</a> </div>
    </div>
  </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
  $("#codeigniter_profiler").hide();

  $('#btn_benchmarks').click(function(event) {
    /* Act on the event */
    var data_status=$(this).attr('data-status');
    if(data_status=='show'){
      $("#btn_benchmarks").attr('data-status','hide');
      $("#codeigniter_profiler").hide();
      
    }else{
      $("#btn_benchmarks").attr('data-status','show');
      $("#codeigniter_profiler").show();
       
    }
  });
});
</script>

<?php
/*
$CI =& get_instance();
$CI->output->enable_profiler(TRUE);
$sections = array(
  'benchmarks'  => TRUE,
  'queries' => TRUE,
  'memory_usage' => TRUE,
  'query_toggle_count' => TRUE
  );
$CI->output->set_profiler_sections($sections);*/

?>

