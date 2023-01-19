<?php $this->load->view('admin/layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<!-- Modal -->
<div class="modal fade" id="status" tabindex="-1" aria-labelledby="statusLabela" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusLabela">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

    <!-- Form Start -->
    <form id="status-form">
        <input type="hidden" id ="updateid">
        <div class="mb-3">
            <label for="exampleInputstatus" class="form-label">Status</label>
            <select name="status" class="form-control" id="status">
                <option>Choose option</option>
                <option value=2>Approved</option>
                <option value=3>Rejected</option>
            </select>
        </div>
    <!-- Form End -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-65">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="table-responsive">
    <h6 class="mb-4">Application List</h6>
        <table id="mytable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                    <th scope="col">Date From</th>
                    <th scope="col">Date To</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($employee_leave_application)):?>
                <?php foreach($employee_leave_application as $row):?>
                    
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php echo $row['detail'];?></td>
                    <td><?php $stats=$row['status'];
	                    if($stats==1){ ?>
	                     <span style="color:blue">Pending</span>
	                     <?php } if($stats==2)  { ?>
	                     <span style="color:green">Approved</span>
	                     <?php } if($stats==3)  { ?>
	                     <span style="color:red">Rejected</span>
	                     <?php } ?></td>
                    <td><button type="button" class="hover btn btn-primary" data-bs-toggle="modal" data-bs-target="#status">Status</button></td>
                    <td><?php echo date("d-m-Y", strtotime($row['datefrom']));?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['dateto']));?></td>
                        <?php endforeach ;?>
                        <?php endif;?>
                </tr>
            
            </tbody>
        </table> 
    </div>
    </div>
    </div>
    </div>
<script>
    $(document).ready(function () {
    $('#mytable').DataTable();
    });

$(document).on('click', '.hover', function() { 
    var id=$(this).data('id');
  $.ajax({
    type:"ajax",
    url:"<?php echo base_url('index.php/leaveapplication/application')?>",
    type:"POST",
    data:{id:id},
    datatype:"JSON",
    success:function(data){
        // var response=JSON.parse(data);
        $("#status").val(data.status);
      }
   });
});

$("#submit").on('click', function(e) { 
    e.preventDefault();
    var id=$("#updateid").val();
    var formdata = $('#status-form').serializeArray();
    formdata.push({name:'updateid',value:id});
		$.ajax({
			url:"<?php echo base_url('index.php/leaveapplication/update')?>",
			type: "POST",
            cache:false,    
			data:$.param(formdata),
			success:function(data){
      $("#status-form")[0].reset();
                
			}
		});
	});
</script>
<?php $this->load->view('admin/layout/footer.php');?>