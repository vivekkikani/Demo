<?php $this->load->view('employee/layout/header.php');?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Leave Application</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($error=$this->session->flashdata('good')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                    <div class="alert alert-success">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url('index.php/employee/employeeleaveapplication/application');?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" id="subject">
                                </div>
                                <?php echo form_error('subject');?>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Detail</label>
                                    <textarea name="detail" class="form-control" id="detail"></textarea>
                                </div>
                                <?php echo form_error('description');?>
                                <!-- <div class="mb-3">
                                    <label for="exampleInputstatus" class="form-label">Status</label>
                                    <select  name="status" class="form-control" id="status">
                                        <option>Choose option</option>
                                        <option value=1>To do</option>
                                        <option value=2>Inprogres</option>
                                        <option value=3>Completed</option>
                                    </select>
                                </div>
                                <?php echo form_error('status');?> -->
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Date From</label><br>
                                    <input type="date" name="datefrom"  id="datefrom">
                                </div>
                                <?php echo form_error('datefrom');?>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Date To</label><br>
                                    <input type="date" name="dateto"  id="dateto">
                                </div>
                                <?php echo form_error('dateto');?>
                                <button type="submit" class="btn btn-primary">Apply</button>    
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form End -->
<?php $this->load->view('employee/layout/footer.php');?>