<?php $this->load->view('employee/layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>

    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-65">
    <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Status</h6>
        <table id="mytable">
            <thead>
                <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Date From</th>
                    <th scope="col">Date To</th> -->
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($employee_leave_application)):?>
                <?php foreach($employee_leave_application as $row):?>
                    
                <tr>
                    <td><?php echo $row['subject'];?></td>
                    <td><?php $status = $row['status']?>
                        <?php if($status == 1) { ?>
                            <a>Pending</a>
                        <?php } else if($status == 2) { ?>
                            <a>Appruved</a>
                        <?php } else { ?>
                            <a>Rejected</a>
                        <?php }?>
                    </td>
                    <!-- <td><?php echo date("d-m-Y", strtotime($row['datefrom']));?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['dateto']));?></td> -->
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
</script>
<?php $this->load->view('employee/layout/footer.php');?>