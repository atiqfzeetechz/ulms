<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered" id="datatable_student" width="100%">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Father</td>
                    <td>Admission No</td>
                    
                    <td>Class</td>
                </tr>
            </thead>
            <tbody>
                <?php $sr = 1; foreach($students as $row): if($row['fname'] !='' || $row['class_id']!='') { ?>
                
                <tr>
                    <td><?php echo$sr++; ?></td>
                    <td><?php echo$row['fname'].' '.$row['lname'];?></td>
                    <td><?php echo$row['father_name'];?></td>
                    <td><?php echo$row['admission_no'];?></td>
                    <td><?php echo$this->db->get_where('class',array('class_id'=>$row['class_id']))->row()->name;?></td>
                </tr>
                <?php } endforeach;?>
            </tbody>
        </table>
    </div>
</div>