<div id="page-content" class="clearfix">

  <?php if($this->session->flashdata('success_msg')):?>
  <div class="alert alert-block alert-success">
    <button type="button" class="close" data-dismiss="alert">
    <i class="icon-remove"></i>
    </button>
    <p>
    <strong>
    <i class="icon-ok"></i>
    Success!
    </strong>
    <?php echo $this->session->flashdata('success_msg');?>
    </p>
  </div>
  <?php endif;?>
  <?php if($this->session->flashdata('success_error')):?>
  <div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">
    <i class="icon-remove"></i>
    </button>
    <p>
    <strong>
    <i class="icon-remove"></i>
    Error!
    </strong>
    <?php echo $this->session->flashdata('success_error');?>
    </p>
  </div>
  <?php endif;?>

  <div class="row-fluid">
    <div class="span12 text-right"> <a href="<?php echo base_admin_url($this->router->fetch_class().'/create');?>" class="btn btn-small btn-inverse "> <i class="icon-plus bigger-150"></i> Add </a> </div>
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
                  <th width="5%" class="center">#</th>
                  <th class="span10">Permisson</th>
                  <th class="span3">Show on Menu</th>

                  <th width="20%">Tools Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($rs_data['items'] AS $key => $result):?>
                <tr>
                  <td ><p class="text-center"><?php echo $result['permision_id']; ?></p></td>
                  <td><?php echo $result['permision_name']; ?></td>
                  <td>
                    <?php if($result['active']=='1'):?>
                      <i class="icon-circle light-green middle"></i>
                      &nbsp;
                      <span class="blue middle ">Available</span>
                    <?php else:?>     
                      <i class="icon-circle light-grey middle"></i>
                      &nbsp;
                      <span class="blue middle ">Invisible</span>                       
                    <?php endif;?>        
                          </td>
                  <td class="td-actions">
                    <div class="btn-group">
                      <a href="<?php echo base_admin_url($this->router->fetch_class().'/edit/'.$result['permision_id']); ?>" class="btn btn-mini btn-info" style="margin-right:15px;"> <i class="icon-edit bigger-120"></i> Edit </a>
                      <a href="<?php echo base_admin_url($this->router->fetch_class().'/delete/'.$result['permision_id']); ?>" onclick="return false;"  class="btn btn-mini btn-danger" id="delete-confirm"> <i class="icon-trash bigger-120"></i> Delete </a>
                    </div>
                  </td> 
                </tr>
                <?php  endforeach; ?>
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
<script type="text/javascript" src="<?php echo base_url('assets/aceadmin/js/bootbox.min.js');?>" ></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
  $("#delete-confirm").on('click', function() {
      var url_delete=$(this).data("url");
      bootbox.confirm("Are you sure you want to delete?", function(result) {
        if(result) {
          location.href=url_delete;
          return true;
        }
      });
  });
  
          
});
</script>