<?php
$CI =& get_instance();
$CI->load->model('admin/contact_model');
$data_filters['allrecord']='true';
$data_filters['active']=0;
$data_filters['dateorder']='yes';
$data_contact=$CI->contact_model->get_contacts(true,true,$data_filters);


?>

<div class="navbar navbar-inverse">
	<div class="navbar-inner ">
		<div class="container-fluid">
			<a href="<?php echo base_admin_url();?>" class="brand">
			<small>
			<i class="icon-fire"></i>
			Backoffice
			</small>
			</a><!--/.brand-->
			<ul class="nav ace-nav pull-right">

				<li class="green">
					<?php if(isset($data_contact['items'])):?>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<i class="icon-envelope-alt icon-only icon-animated-vertical"></i>
					<span class="badge badge-success"><?php echo @count($data_contact['items'])?></span>
					</a>
					
					<ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-closer">
						<li class="nav-header">
							<i class="icon-envelope"></i>
							<?php echo @count($data_contact['items'])?> Messages
						</li>
						<?php foreach($data_contact['items'] as $nitem):?>
						<li>
							<a href="#">
							<span class="msg-body">
							<span class="msg-title">
							<span class="blue"><?php echo $nitem['contact_email']?>:</span>
							<?php echo character_limiter($nitem['contact_description'],70)?>
							</span>
							<span class="msg-time">
							<i class="icon-time"></i>
							<span><?php echo timespan(strtotime($nitem['create_at']), time() ) . "&nbsp; Ago" ;?></span>
							</span>
							</span>
							</a>
						</li>
						<?php endforeach;?>
						<li>
							<a href="<?php echo base_admin_url('contact')?>">
							See all messages
							<i class="icon-arrow-right"></i>
							</a>
						</li>
					</ul>
					<?php endif;?>
				</li>
				<li class="light-blue user-profile">
					<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
					<img class="nav-user-photo" src="<?php echo base_url('assets/aceadmin/avatars/user.jpg');?>" alt="Jason's Photo" />
					<span id="user_info">
					<small>Welcome,</small>
					Jason
					</span>
					<i class="icon-caret-down"></i>
					</a>
					<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
						<li>
							<a href="#">
							<i class="icon-cog"></i>
							Settings
							</a>
						</li>
						<li>
							<a href="#">
							<i class="icon-user"></i>
							Profile
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?php echo base_admin_url('login?logout=1');?>">
							<i class="icon-off"></i>
							Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--/.ace-nav-->
		</div>
		<!--/.container-fluid-->
	</div>
	<!--/.navbar-inner-->
</div>