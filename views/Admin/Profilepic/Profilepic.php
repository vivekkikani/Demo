<?php $this->load->view('admin/layout/header.php');?>
            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Profilepic</h6>
                            <?php if($error=$this->session->flashdata('failed')):?>
                                <div class="row">
                                    <div class="col-lg-6" >
                                        <div class="alert alert-danger">
                                        <?= $error; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo base_url('index.php/profilepic/profilepicupdate');?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                <?php if ($admin->profilepic) { ?>
                                  <img src="<?php echo base_url($admin->profilepic);?>"style="height:180px; width:180px;">
                                <?php } ?>
                                    <input class="form-control bg-dark" type="file"  name="profilepic" id="profilepic">
                                </div>
                                <?php echo form_error('profilepic');?>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-upload"></i> UPLOAD</button>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->
            <?php $this->load->view('admin/layout/footer.php');?>