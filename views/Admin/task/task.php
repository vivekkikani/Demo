<?php $this->load->view('admin/layout/header.php');?>
            <!-- Form Start -->
            <script src="//cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Task</h6>
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
                            <form action="<?php echo base_url('index.php/task/addtask');?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Task Name</label>
                                    <input type="text" name="taskname" class="form-control" id="taskname">
                                </div>
                                <?php echo form_error('taskname');?>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Description</label>
                                    <textarea name="description" class="form-control" id="description"></textarea>
                                </div>
                                <?php echo form_error('description');?>
                                <div class="mb-3">
                                    <label for="exampleInputtaskasignes" class="form-label">Task assignes</label>
                                    <select  name="taskassignes[]" class="form-control"   id="taskassignes" multiple="multiple">
                                        <option>Choose option</option>
                                        <?php foreach($employeediteles as $row):?>
                                        <?php echo $row['name'];?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <?php echo form_error('taskassignes');?>
                                <div class="mb-3">
                                    <label for="exampleInputstatus" class="form-label">Status</label>
                                    <select  name="status" class="form-control" id="status">
                                        <option>Choose option</option>
                                        <option value=1>To do</option>
                                        <option value=2>Inprogres</option>
                                        <option value=3>Completed</option>
                                    </select>
                                </div>
                                <?php echo form_error('status');?>
                                <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">Date to be completed</label><br>
                                    <input type="date" name="datetocompleted"  id="datetocompleted">
                                </div>
                                <?php echo form_error('datetocompleted');?>
                                <button type="submit" class="btn btn-primary">ADD</button>    
                        </div>
                    </div>
                </div>
            </div>
            <script>
                CKEDITOR.replace( 'description' );
            </script>

            <!-- Form End -->
<?php $this->load->view('admin/layout/footer.php');?>