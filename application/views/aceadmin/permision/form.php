<div id="page-content" class="clearfix">
	<div class="page-header position-relative">
		<h1 class="smaller blue">
		Manage
		</h1>
	</div>
	<form id="validation-form"   method="post">
		<div class="row-fluid">
			<div class="span12">
				<div class="control-group">
					<label class="control-label" for="form-field-1">Name</label>
					<div class="controls">
						<input type="text" id="form-field-1" value="<?php if(isset($items['permision_name']))echo $items['permision_name']?>" name="mod_name" placeholder="Name">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="form-field-select-3">Icon</label>
					<div class="controls">
						<select name="mod_image" id="mod_image" class="span2" data-placeholder="Choose a Icons...">
							<option value=""></option>
							<?php foreach($font_data as $item):?>
							<option <?php if(isset($items['image']))if($item==$items['image'])echo 'selected="selected"';?>>
								<i class="<?php echo $item;?>"></i>
								<?php echo $item;?>
							</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<br>
				<div class="control-group">
					<label class="control-label" for="form-field-1">&nbsp;</label>
					<div class="controls">
						<label>
							<input name="show_on" <?php if($items['active']==1)echo 'checked="checked"';?>  id="show_on" value="y" type="checkbox">
							<span class="lbl">&nbsp;Show on Menu</span>
						</label>
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
		<div class="row-fluid">
			<div class="span12">
				<div class="row-fluid">
					<div class="row-fluid">
						<h3 class="header smaller lighter blue">
						Icons List
						<small>
						<a href="http://fontawesome.io/icons/" target="_blank">
						(see all icons
						<i class="icon-external-link"></i>
						)
						</a>
						</small>
						</h3>
					</div>
					<div class="row-fluid">
						<div class="span3">
							<ul class="unstyled the-icons">
								<li>
									<i class="icon-adjust"></i>
									icon-adjust
								</li>
								<li>
									<i class="icon-asterisk"></i>
									icon-asterisk
								</li>
								<li>
									<i class="icon-ban-circle"></i>
									icon-ban-circle
								</li>
								<li>
									<i class="icon-bar-chart"></i>
									icon-bar-chart
								</li>
								<li>
									<i class="icon-barcode"></i>
									icon-barcode
								</li>
								<li>
									<i class="icon-beaker"></i>
									icon-beaker
								</li>
								<li>
									<i class="icon-beer"></i>
									icon-beer
								</li>
								<li>
									<i class="icon-bell"></i>
									icon-bell
								</li>
								<li>
									<i class="icon-bell-alt"></i>
									icon-bell-alt
								</li>
								<li>
									<i class="icon-bolt"></i>
									icon-bolt
								</li>
								<li>
									<i class="icon-book"></i>
									icon-book
								</li>
								<li>
									<i class="icon-bookmark"></i>
									icon-bookmark
								</li>
								<li>
									<i class="icon-bookmark-empty"></i>
									icon-bookmark-empty
								</li>
								<li>
									<i class="icon-briefcase"></i>
									icon-briefcase
								</li>
								<li>
									<i class="icon-bullhorn"></i>
									icon-bullhorn
								</li>
								<li>
									<i class="icon-calendar"></i>
									icon-calendar
								</li>
								<li>
									<i class="icon-camera"></i>
									icon-camera
								</li>
								<li>
									<i class="icon-camera-retro"></i>
									icon-camera-retro
								</li>
								<li>
									<i class="icon-certificate"></i>
									icon-certificate
								</li>
							</ul>
						</div>
						<div class="span3">
							<ul class="unstyled the-icons">
								<li>
									<i class="icon-check"></i>
									icon-check
								</li>
								<li>
									<i class="icon-check-empty"></i>
									icon-check-empty
								</li>
								<li>
									<i class="icon-circle"></i>
									icon-circle
								</li>
								<li>
									<i class="icon-circle-blank"></i>
									icon-circle-blank
								</li>
								<li>
									<i class="icon-cloud"></i>
									icon-cloud
								</li>
								<li>
									<i class="icon-cloud-download"></i>
									icon-cloud-download
								</li>
								<li>
									<i class="icon-cloud-upload"></i>
									icon-cloud-upload
								</li>
								<li>
									<i class="icon-coffee"></i>
									icon-coffee
								</li>
								<li>
									<i class="icon-cog"></i>
									icon-cog
								</li>
								<li>
									<i class="icon-cogs"></i>
									icon-cogs
								</li>
								<li>
									<i class="icon-comment"></i>
									icon-comment
								</li>
								<li>
									<i class="icon-comment-alt"></i>
									icon-comment-alt
								</li>
								<li>
									<i class="icon-comments"></i>
									icon-comments
								</li>
								<li>
									<i class="icon-comments-alt"></i>
									icon-comments-alt
								</li>
								<li>
									<i class="icon-credit-card"></i>
									icon-credit-card
								</li>
								<li>
									<i class="icon-dashboard"></i>
									icon-dashboard
								</li>
								<li>
									<i class="icon-desktop"></i>
									icon-desktop
								</li>
								<li>
									<i class="icon-download"></i>
									icon-download
								</li>
								<li>
									<i class="icon-download-alt"></i>
									icon-download-alt
								</li>
							</ul>
						</div>
						<div class="span3">
							<ul class="unstyled the-icons">
								<li>
									<i class="icon-edit"></i>
									icon-edit
								</li>
								<li>
									<i class="icon-envelope"></i>
									icon-envelope
								</li>
								<li>
									<i class="icon-envelope-alt"></i>
									icon-envelope-alt
								</li>
								<li>
									<i class="icon-exchange"></i>
									icon-exchange
								</li>
								<li>
									<i class="icon-exclamation-sign"></i>
									icon-exclamation-sign
								</li>
								<li>
									<i class="icon-external-link"></i>
									icon-external-link
								</li>
								<li>
									<i class="icon-eye-close"></i>
									icon-eye-close
								</li>
								<li>
									<i class="icon-eye-open"></i>
									icon-eye-open
								</li>
								<li>
									<i class="icon-facetime-video"></i>
									icon-facetime-video
								</li>
								<li>
									<i class="icon-fighter-jet"></i>
									icon-fighter-jet
								</li>
								<li>
									<i class="icon-film"></i>
									icon-film
								</li>
								<li>
									<i class="icon-filter"></i>
									icon-filter
								</li>
								<li>
									<i class="icon-fire"></i>
									icon-fire
								</li>
								<li>
									<i class="icon-flag"></i>
									icon-flag
								</li>
								<li>
									<i class="icon-folder-close"></i>
									icon-folder-close
								</li>
								<li>
									<i class="icon-folder-open"></i>
									icon-folder-open
								</li>
								<li>
									<i class="icon-folder-close-alt"></i>
									icon-folder-close-alt
								</li>
								<li>
									<i class="icon-folder-open-alt"></i>
									icon-folder-open-alt
								</li>
								<li>
									<i class="icon-food"></i>
									icon-food
								</li>
							</ul>
						</div>
						<div class="span3">
							<ul class="unstyled the-icons">
								<li>
									<i class="icon-gift"></i>
									icon-gift
								</li>
								<li>
									<i class="icon-glass"></i>
									icon-glass
								</li>
								<li>
									<i class="icon-globe"></i>
									icon-globe
								</li>
								<li>
									<i class="icon-group"></i>
									icon-group
								</li>
								<li>
									<i class="icon-hdd"></i>
									icon-hdd
								</li>
								<li>
									<i class="icon-headphones"></i>
									icon-headphones
								</li>
								<li>
									<i class="icon-heart"></i>
									icon-heart
								</li>
								<li>
									<i class="icon-heart-empty"></i>
									icon-heart-empty
								</li>
								<li>
									<i class="icon-home"></i>
									icon-home
								</li>
								<li>
									<i class="icon-inbox"></i>
									icon-inbox
								</li>
								<li>
									<i class="icon-info-sign"></i>
									icon-info-sign
								</li>
								<li>
									<i class="icon-key"></i>
									icon-key
								</li>
								<li>
									<i class="icon-leaf"></i>
									icon-leaf
								</li>
								<li>
									<i class="icon-laptop"></i>
									icon-laptop
								</li>
								<li>
									<i class="icon-legal"></i>
									icon-legal
								</li>
								<li>
									<i class="icon-lemon"></i>
									icon-lemon
								</li>
								<li>
									<i class="icon-lightbulb"></i>
									icon-lightbulb
								</li>
								<li>
									<i class="icon-lock"></i>
									icon-lock
								</li>
								<li>
									<i class="icon-unlock"></i>
									icon-unlock
								</li>
							</ul>
						</div>
					</div>
				</div>
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
		rules: {
			mod_name: {
				required: true
			},
			mod_url: {
				required: true
			},
			mod_image:{
				valueNotEquals:""
			}
		},

		messages: {
			mod_name: {
				required: "Please specify a valid mod_name."
			},
			mod_url: {
				required: "Please specify a mod url.",
			},
			mod_image: {
				valueNotEquals: "Please specify a mod image.",
			}
		},

		invalidHandler: function (event, validator) { //display error alert on form submit
			$('.alert-error', $('.login-form')).show();
		},

		highlight: function (e) {
			$(e).closest('.control-group').removeClass('success').addClass('error');
		},

		success: function (e) {
			$(e).closest('.control-group').removeClass('error').addClass('success');
			$(e).remove();
		},

		errorPlacement: function (error, element) {
			if(element.is(':checkbox') || element.is(':radio')) {
				var controls = element.closest('.controls');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl').eq(0));
			}
			else if(element.is('.chzn-select')) {
				error.insertAfter(element.nextAll('[class*="chzn-container"]').eq(0));
			}
			else error.insertAfter(element);
		},

		submitHandler: function (form) {
			form.submit();

		},
		invalidHandler: function (form) {
		}
	});

	$("#mod_image").select2();
});
</script>