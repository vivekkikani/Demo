<?php $this->load->view('admin/layout/header.php');?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-4">
                        <div class="bg-secondary rounded h-100 p-3">
                            <h6 class="mb-4">Add Technology</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form  action="<?php echo site_url('technology/add_technology');?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputUsername" class="form-label">Technology</label>
                                    <input type="text" name="technology" class="form-control" id="technology">
                                </div>
                                <?php echo form_error('technology');?>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="active"  id="active" value="1">
                                    <label class="form-check-label"  for="exampleActive">Active</label>
                                </div>
                                <button type="submit" name="submit" value="Add" class="btn btn-primary">Add</button>   
                            </form> 
                            <p><?php echo $this->session->flashdata('resp_message');?></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
<?php $this->load->view('admin/layout/footer.php');?>