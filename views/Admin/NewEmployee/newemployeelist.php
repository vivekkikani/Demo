<?php $this->load->view('admin/layout/header.php');?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" defer></script>

    <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
    <div class="col-sm-12 col-xl-65">
    <div class="bg-secondary rounded h-100 p-4">
    <h6 class="mb-4">Employee List</h6>
        <table id="mytable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Technology</th>
                    <th scope="col">Resume</th>
                    <th scope="col">Salary</th>
                    <th scope="col">role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($employeediteles)):?>
                <?php foreach($employeediteles as $row):?>
                    
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['username'];?></td>
                    <td><?php echo $row['technology'];?></td>
                    <td><a href="<?php echo base_url($row['resume']);?>">Link</a></td>
                    <td><?php echo $row['salary'];?></td>
                    <td><?php echo $row['role'];?></td>
                    <td><?php echo anchor('newemployee/edit/'.$row['id'],'Edit',['class'=>'btn btn-primary']);?></td>
                    <td><?php echo anchor('newemployee/delete/'.$row['id'],'Delete',['class'=>'btn btn-danger']);?></td>

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
<?php $this->load->view('admin/layout/footer.php');?>