<? alert($user_acl);?>
<div id="page-content" class="clearfix">
  <form id="validation-form" enctype="multipart/form-data"   method="post">
    <div class="row-fluid">
      <div class="span8">
        <h3 class="header smaller lighter blue">Permision</h3>
        <div class="control-group">
          <label class="control-label" for="username">Username</label>
          <div class="controls">
            <input type="text"  class="required" id="username" value="<?php if(isset($user_data['username']))echo $user_data['username']?>" name="username" placeholder="Username">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Password</label>
          <div class="controls">
            <input type="password"  class="required" id="password" value="<?php if(isset($user_data['re_password']))echo $user_data['re_password']?>" name="password" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <input type="text" class="required email" id="email" value="<?php if(isset($user_data['email']))echo $user_data['email']?>" name="email" placeholder="Email">
          </div>
        </div>
        <div class="control-group">
          <h3 class="header smaller lighter blue">Role</h3>
          <div class="controls">
            <div class="controls">
              <?php foreach($role_data as $item):?>
              <label>
                <input name="user_level" <?php if($item['role_id'] == @$user_data['role_id']):echo 'checked="checked"';endif;?> id="user_type_<?php echo $item['role_id'];?>" value="<?php echo $item['role_id'];?>" type="radio">
                <span class="lbl"> <?php echo $item['role_name']?></span>
              </label>
              <?php endforeach;?>
            </div>
          </div>
        </div>
        <div class="control-group">
          <h3 class="header smaller lighter blue">Permision</h3>
          
          <div class="controls">
            <div class="controls">
              <?php foreach($mod_data as $item):?>
              <label>
                <input name="permission[]" <?php if(isset($user_acl)): if(in_array($item['permision_id'], $user_acl)):echo 'checked="checked"';endif;endif;?> id="permission_<?php echo $item['permision_id']?>" value="<?php echo $item['permision_id']?>" type="checkbox">
                <span class="lbl"> <?php echo ucfirst($item['permision_name']);?></span>
              </label>
              <?php endforeach;?>
            </div>
          </div>
        </div>
      </div>
      <div class="span3">
        <h3 class="header smaller lighter blue">Image</h3>
        <?php if(isset($user_data['profile_image'])):?>
            <div class="center">
                    <div>
                      <span class="profile-picture">
                        <img id="avatar" class="editable editable-click editable-empty" alt="<?php if(isset($user_data['username']))echo $user_data['username']?> Avatar" src="<?php echo resizeimage($user_data['profile_image'],180,200)?>"></img>
                      </span>

                      <div class="space-4"></div>

                      <div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
                        <div class="inline position-relative">
                          <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-circle light-green middle"></i>
                            &nbsp;
                            <span class="white middle bigger-120"><?php if(isset($user_data['username']))echo $user_data['username']?></span>
                          </a>

                          <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                            <li class="nav-header"> Change Status </li>

                            <li>
                              <a href="#">
                                <i class="icon-circle green"></i>
                                &nbsp;
                                <span class="green">Available</span>
                              </a>
                            </li>

                            <li>
                              <a href="#">
                                <i class="icon-circle red"></i>
                                &nbsp;
                                <span class="red">Busy</span>
                              </a>
                            </li>

                            <li>
                              <a href="#">
                                <i class="icon-circle grey"></i>
                                &nbsp;
                                <span class="grey">Invisible</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>

                    <div class="space-6"></div>



                    <div class="hr hr16 dotted"></div>
            </div>
            <?php endif;?> 
        <div class="control-group">
          <div class="controls">
            <input type="file" class="span4 thumb_add"  name="profile_image" id="profile_image" />
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="form-actions">
        <button class="btn btn-info" type="submit">
        <i class="icon-ok bigger-110"></i>
        Submit
        </button>
        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
        <i class="icon-undo bigger-110"></i>
        Reset
        </button>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
  
  $.validator.addMethod("valueNotEquals", function(value, element, arg){
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
  
  $('.thumb_add').ace_file_input({
    no_file: 'No File ...',
    style: 'well',
    btn_choose: 'คลิกที่เพื่ออัพโหลด',
    btn_change: null,
    no_icon: 'icon-picture',
    droppable: true,
    onchange: null,
    thumbnail: true,
    whitelist: 'gif|png|jpg|jpeg',
    lacklist: 'exe|php',
    // thumbnail: 'small',
  });
});
</script>