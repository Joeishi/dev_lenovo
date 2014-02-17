<div id="page-content" class="clearfix">
  <div class="page-header position-relative">
    <h1 class="smaller blue"> <i class="icon-edit"></i> จัดการข้อมูลสมาชิก </h1>
  </div>
  <form id="validation-form"  class="" method="post">
    <div class="row-fluid">
      <div class="span12">
        <div class="row-fluid">
          <div class="span12">
            <div class="control-group">
              <label class="control-label" for="your_name">นามแฝง</label>
              <div class="controls">
                <input type="text" name="your_name" id="your_name" value="<?php echo $member['your_name']; ?>" style="width:400px;" >
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="password">รหัสผ่าน</label>
              <div class="controls">
                <input type="text" name="password" id="password" value="<?php echo $member['password']; ?>" style="width:400px;">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="email">อีเมล์</label>
              <div class="controls">
                <input type="text" name="email" id="email" value="<?php echo $member['email']; ?>" style="width:400px;">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="user_level">สถานะในเว็บไซต์</label>
              <div class="controls">
                <select id="user_level" name="user_level">
                  <option value="">กรุณาเลือกสถานะ</option>
                  <?php
				  	echo $options;
				  ?>
                </select>
              </div>
            </div>
            <br style="clear:both;">
            <div class="control-group span12">
              <div class="controls">
                <button class="btn btn-info" type="submit"> <i class="icon-ok bigger-110"></i> Submit </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset"> <i class="icon-undo bigger-110"></i> Reset </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {

    $.validator.addMethod("valueNotEquals", function(value, element, arg) {
        return arg != value;
    }, "Value must not equal arg.");
    $.validator.setDefaults({
        errorPlacement: function(error, placement) {
            //console.log(error.innerText);
        }
    });
    $('#validation-form').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: false,
        rules: {
            condo_comnany: {
                valueNotEquals: ""
            }
        },
        messages: {
            condo_comnany: {
                valueNotEquals: "Please specify a mod image.",
            }
        },
        invalidHandler: function(event, validator) { //display error alert on form submit
            $('.alert-error', $('.login-form')).show();
        },
        highlight: function(e) {
            $(e).closest('.control-group').removeClass('success').addClass('error');
        },
        success: function(e) {
            $(e).closest('.control-group').removeClass('error').addClass('success');
            $(e).remove();
        },
        errorPlacement: function(error, element) {
            if (element.is(':checkbox') || element.is(':radio')) {
                var controls = element.closest('.controls');
                if (controls.find(':checkbox,:radio').length > 1) controls.append(error);
                else error.insertAfter(element.nextAll('.lbl').eq(0));
            } else if (element.is('.chzn-select')) {
                error.insertAfter(element.nextAll('[class*="chzn-container"]').eq(0));
            } else error.insertAfter(element);
        },
        submitHandler: function(form) {
            form.submit();
        },
        invalidHandler: function(form) {}
    });
	
    $('#thumb').ace_file_input({
        no_file: 'No File ...',
        style: 'well',
        btn_choose: 'คลิกที่เพื่ออัพโหลด',
        btn_change: null,
        no_icon: 'icon-picture',
        droppable: false,
        onchange: null,
        thumbnail: true,
        //| true | large
        whitelist: 'gif|png|jpg|jpeg',
        lacklist: 'exe|php',
        thumbnail: 'small',
        //onchange:''
        //
    });
	
});
</script>
<style type="text/css">
img.flag {
	height: 10px;
	width: 15px;
	padding-right: 10px;
}
.block_room_type span.help-inline {
	display: none !important;
}
</style>
