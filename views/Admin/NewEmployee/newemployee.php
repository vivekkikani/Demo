<?php $this->load->view('admin/layout/header.php');?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">New Employee</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url('index.php/newEmployee/newemployee_Add');?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo set_value('name');?>">
                                </div>
                                <?php echo form_error('name');?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email1" value="<?php echo set_value('email');?>">
                                </div>
                                <?php echo form_error('email');?>
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Username</label>
                                    <input type="text"  name="username" class="form-control" id="username" value="<?php echo set_value('username');?>">
                                </div>
                                <?php echo form_error('username');?>
                                <div class="mb-3">
                                <label for="exampleInputRoll" class="form-label">Technology</label><br> 
                                    <?php foreach($technology as $row):?>
                                    <?php echo $row['technology'];?>
                                    <input class="form-check-input" name="technology[]" type="checkbox" id="Check" value="<?php echo $row['id'];?>">
                                    <?php endforeach;?>
                                </div>
                                <?php echo form_error('technology');?>
                                <div class="mb-3">
                                <label for="exampleInputresume" class="form-label">Resume</label>
                                <input class="form-control bg-dark" type="file"  name="resume" id="resume" >
                                </div>
                                <?php echo form_error('resume');?>
                                <div class="mb-3">
                                    <label for="exampleInputSalary1" class="form-label">Salary</label>
                                    <input type="number" name="salary" class="form-control" id="salary" step="0.0001" value="<?php echo set_value('salary');?>">
                                </div>
                                <?php echo form_error('salary');?>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>  
                                <?php echo form_error('password');?>
                                <button type="submit" class="btn btn-primary">ADD</button>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <?php $this->load->view('admin/layout/footer.php');?>