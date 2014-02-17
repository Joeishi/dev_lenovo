<div id="page-content" class="clearfix">
  <div class="page-header position-relative">
    <h1 class="smaller blue"> <i class="icon-lock"></i> สมาชิก </h1>
  </div>
  <div class="row-fluid">
    <!--<div class="span12 text-right"> <a href="<?php echo base_admin_url('webboard/create');?>" class="btn btn-small btn-inverse "> <i class="icon-plus bigger-150"></i> เว็บบอร์ด </a> </div>-->
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-header">
          <h5 class="bigger lighter"> <i class="icon-table"></i> All Records </h5>
        </div>
        <div class="widget-body">
          <div class="widget-main no-padding">
            <table id="table_bug_report" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th class="center">#</th>
                  <th class="span10">นามแฝง</th>
				  <th class="span10">รหัสผ่าน</th>
				  <th class="span10">อีเมล์</th>
				  <th class="span10">สถานะ</th>
                  <th>เครื่องมือ</th>
                </tr>
              </thead>
              <tbody>
				 <?php
					foreach($member['items'] AS $key => $result):

				  ?>
                <tr>
				
				  
				  <td><?php echo $result['member_id']; ?></td>
                  <td><?php echo	$result['your_name']; ?></td>
                  <td><?php echo $result['password']; ?></td>
				  <td><?php echo $result['email']; ?></td>
				  <td><?php echo $result['user_level']; ?></td>
                  <td class="td-actions">
					  <div class="btn-group"> 	  
						<a href="<?php echo base_admin_url('member/edit/'.$result['member_id']); ?>" class="btn btn-mini btn-info" style="margin-right:15px;"> <i class="icon-edit bigger-120"></i> Edit </a> 
						<a href="<?php echo base_admin_url('member/delete_member/'.$result['member_id']); ?>" class="btn btn-mini btn-danger" id="delete-confirm"> <i class="icon-trash bigger-120"></i> Delete </a> 
					  </div>
				  
				  </td>

				
                </tr>

				 <?php 
					endforeach;
				 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.row-fluid --> 
</div>
<!-- /.outer --> 