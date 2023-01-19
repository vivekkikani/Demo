<?php $this->load->view('employee/layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<!-- Modal -->
<div class="modal fade" id="task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

    <!-- Form Start -->
        <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
        <form id="task-form">
            <input type="hidden" id ="id">
        <div class="modal-body">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Task Name</label>
            <input type="text" name="taskname" class="form-control" id="taskname">
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputtaskasignes" class="form-label">Task assignes</label>
            <select  name="taskassignes[]" class="form-control" id="taskassignes" multiple="multiple">
                <option>Choose option</option>
                <?php foreach($employeediteles as $row):?>
                <option value="<?php echo $row['id']?>" ><?php echo $row['name']?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputstatus" class="form-label">Status</label>
            <select name="status" class="form-control" id="status">
                <option>Choose option</option>
                <option value=1>To do</option>
                <option value=2>Inprogres</option>
                <option value=3>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Date to be completed</label><br>
            <input type="date" name="datetocompleted"  id="datetocompleted">
        </div>
        </div>
        <script>
            CKEDITOR.replace('description');
        </script>
    <!-- Form End -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
    <div class="modal-body"></div>
  </div>
</div>
<!-- model End -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-65">
                <div class="bg-secondary rounded h-100 p-4">
                    <div class="table-responsive"> 

    <h6 class="mb-4">Task Work</h6>
        <?php
	       $data['todo'] = $todo;
           $data['inprogres'] = $inprogres;
           $data['completed'] = $completed;
        ?>
            <table id="mytable">
                <thead>
                    <tr>
                        <th scope="col">UpComing Task</th>
                        <th scope="col">Worke on Task</th>
                        <th scope="col">Completa Task</th>
                    </tr>
                </thead>
                <tbody>
                <tr>    
                    <td>
                        <?php foreach($data['todo'] as $rowa):?>
                        <button type="button" data-id=<?=$rowa['id'];?> class="hover btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">Task Details</button>
                        <?php echo '<span  style="color:white">'.$rowa['taskname']."</span> <br><br>"; endforeach; ?>
                    </td>   
                    <td>
                        <?php foreach($data['inprogres'] as $rowb):?>
                        <button type="button" data-id=<?=$rowb['id'];?> class="hover btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">Task Details</button>
                        <?php echo '<span style="color:white">'.$rowb['taskname']."</span> <br><br>"; endforeach; ?> 
                    </td>       
                    <td>
                        <?php foreach($data['completed'] as $rowc):?>
                        <button type="button"  data-id=<?=$rowc['id'];?> class="hover btn btn-primary" data-bs-toggle="modal" data-bs-target="#task">Task Details</button>
                        <?php echo '<span style="color:white">'.$rowc['taskname']."</span> <br><br>"; endforeach; ?>
                    </td>
                </tr>
                </tbody>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script>
    $(document).ready(function(){
    $('#mytable').dataTable();
    });
</script>

<script type="text/javascript">
$(document).on('click', '.hover', function(){
    var id=$(this).data('id');
    $.ajax({
        type:"ajax",
        method:"post",
        url:"<?php echo base_url('index.php/employee/taskwork/view')?>",  
        data:{id:id},
        datatype:"json",
        success:function(data){
            var response=JSON.parse(data);
            // console.log(response.task[0].id);
            $.each(response, function (key, value){
            $("#id").val(response.task[0].id);
            $("#taskname").val(response.task[0].taskname);
            $("#description").val(response.task[0].description);
            CKEDITOR.instances['description'].setData(description);
            $("#taskassignes").val(response.task_user);
            $("#status").val(response.task[0].status);
            $("#datetocompleted").val(response.task[0].datetocompleted);
            $('#task').modal('show');
            }
        )}
    });
});

</script>
<?php $this->load->view('employee/layout/footer.php');?>    