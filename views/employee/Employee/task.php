<?php $this->load->view('employee/layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>

    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-65">
    <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">General Task </h6>
        <table id="mytable">
            <thead>
                <tr>
                    <th scope="col">Task name</th>
                    <th scope="col">Task Assignes</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Assigned</th>
                    <th scope="col">Date To Completed</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($task)):?>
                <?php foreach($task as $row):?>

                <tr>
                    <td><?php echo $row['taskname'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php $status = $row['status']?>
                        <?php if($status == 1) { ?>
                            <a>To do</a>
                        <?php } else if($status == 2) { ?>
                            <a>Inprogres</a>
                        <?php } else { ?>
                            <a>Completed</a>
                       <?php }?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['dateassigned']));?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['datetocompleted']));?></td>
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
    $('#mytable').dataTable();
    });
</script>

<?php $this->load->view('employee/layout/footer.php');?>