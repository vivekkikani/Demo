<?php $this->load->view('employee/layout/header.php');?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">User Data</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url('index.php/employee/employee/userupdate');?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="newemployeeid" value="<?php echo $employeediteles['id']; ?>">
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo $employeediteles['name'];?>">
                                </div>
                                <?php echo form_error('name');?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email1" value="<?php echo $employeediteles['email'];?>">
                                </div>
                                <?php echo form_error('email');?>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Username</label>
                                    <input type="text"  name="username" class="form-control" id="username" value="<?php echo $employeediteles['username'];?>">
                                </div>
                                <?php echo form_error('username');?>
                                <div class="mb-3">
                                <label for="exampleInputRoll" class="form-label">Technology</label><br> 
                                    <?php
                                        $explodedTechnology = explode(',',$employeediteles['technology']);
                                    ?>
                                    <?php foreach($technology as $row):?>
                                    <?php echo $row['technology'];?>
                                    <input class="form-check-input" name="technology[]" type="checkbox" id="Check" value="<?= $row['id']; ?>" <?php echo (in_array($row['id'],$explodedTechnology)) ? 'checked': ''; ?>>
                                    <?php endforeach;?>
                                </div>
                                <?php echo form_error('technology');?>
                                <div class="mb-3">
                                    <label for="exampleInputresume" class="form-label">Resume</label>
                                    <?php if ($employeediteles['resume']){?>
                                        <a href="<?php echo base_url($employeediteles['resume']);?>">Link</a>
                                    <?php } ?>
                                    <input class="form-control bg-dark" type="file"  name="resume" id="resume">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputSalary1" class="form-label">Salary</label>
                                    <input type="number" name="salary" class="form-control" id="salary" step="0.0001" value="<?php echo $employeediteles['salary'];?>">
                                </div>
                                <?php echo form_error('salary');?>
                                <button type="submit" class="btn btn-primary">Update</button>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
<?php $this->load->view('employee/layout/footer.php');?>