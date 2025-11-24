<!--<div class="row">-->
<!--  <div class="col-12 col-sm-12 col-lg-12">-->
<!--            <div class="card card-primary card-outline card-outline-tabs">-->
<!--              <div class="card-header p-0 border-bottom-0">-->
              
<!--              </div>-->
<!--              <div class="card-body">-->
<!--                <p>-->
<!--			      <div id="page_number" style="display:none;"></div>-->
<!--                   <div class="table-responsive" id="country_table">-->
<!--                      <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>-->
<!--                   </div>-->
<!--                   <div align="right" id="pagination_link"></div>-->
<!--                 </p> -->
                
<!--              </div>-->
              <!-- /.card -->
<!--            </div>-->
<!--          </div>-->
        
<!--</div>   -->
<br/>
<div class="container">
  <div class="table-responsive">
<table class="table table-bordered text-center">
  <thead class=" bg-info">
    <tr>
      <th >ID</th>
      <th >Name</th>
      <th >Education</th>
      <th >Father</th>
      <th >Mobile</th>
      <th >Operation</th>
    </tr>
  </thead>
  <?php if(count($data)):?>
  <?php foreach ($data as $my):?>
  <tbody>
    <tr>
      <td><?php echo $my->id;?></td>
      <td ><?php echo $my->name;?></td>
      <td ><?php echo $my->education;?></td>
      <td ><?php echo $my->father_name;?></td>
       <td><?php echo $my->mobile;?></td>
       <td class="btn btn-danger btn-sm" value="<?php $my->id;?>"><a href="matrimonial_edit/<?php echo $my->id;?>" class="text-white">Edit</a></td>
    </tr>
    </tbody>
        <?php endforeach;?>
        <?php else:?>
        <tr>
            <td colspan="3">No data available</td>
        </tr>
        <?php endif; ?>
</table>
</div>
</div>

  