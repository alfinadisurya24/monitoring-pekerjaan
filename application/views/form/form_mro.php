<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary"><?= $header ?></h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/main/index/data-pekerjaan">Data Pekerjaan</a></li>
                    <li class="breadcrumb-item active">MRO (Manajemen Risiko) Pengadaan</li>
                </ol>
            </div>
        </div>

        <div class="section-body">
            <!-- <p class="section-lead">
              Examples for showing pagination to indicate a series of related content exists across multiple pages.
            </p> -->
            <div class="row">
                <div class="col-12">
                    <div class="card border">
                        <!-- <div class="card-header">
                            <a href="<?#= base_url()?>main/proses/data-pekerjaan/detail/<?=$field->id_pekerjaan?>" class="btn btn-primary">back</a>
                        </div> -->
                        <div class="card-body">
                            <?php if ($this->session->flashdata('message')) {?>
                                <div class="alert alert-<?= $this->session->flashdata('alert');?>">
                                <?= $this->session->flashdata('message');?>
                                </div>
                            <?php } ?>
                            
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link <?= $_GET['child'] == 'profile_risiko' ? 'active' : '' ?> <?= $disabled == true ? "disabled" : "" ?>" data-toggle="tab" href="#profile_risiko" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Profile Risiko</span></a> </li>
                                <li class="nav-item"> <a class="nav-link <?= $_GET['child'] == 'kajian_risiko' ? 'active' : '' ?> <?= $disabled == true ? "disabled" : "" ?>" data-toggle="tab" href="#kajian_risiko" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Kajian Risiko</span></a> </li>
                            </ul>
                            <div class="tab-content tabcontent-border">
                                <!-- profile risiko -->
                                <div class="tab-pane p-20 <?= $_GET['child'] == 'profile_risiko' ? 'active' : '' ?>" id="profile_risiko" role="tabpanel">
                                    <?= form_open_multipart('main/tahapan_kerja/profile_risiko/'.$field->id_pekerjaan);?>
                                        <input type="hidden" name="id" value="<?= $profile_risiko->id_profile_risiko ?>">
                                        <div class="form-group">
                                            <label>Upload File Profile Risiko</label>
                                            <input type="file" class="form-control" name="upload" placeholder="* upload file" <?= $profile_risiko->id_profile_risiko == null ? 'required' : '' ?>>
                                            <p><?= $profile_risiko->file_upload != null ? '<img src="/assets/images/pdf.png" width="50" alt="pdf">'.explode('/', $profile_risiko->file_upload)[1] : '' ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Cek</label>
                                            <select class="form-control" name="upload_cek" required>
                                                <option value="0" <?= $profile_risiko->upload_cek ? 'selected' : '' ?>>Belum dicek</option>
                                                <option value="1" <?= $profile_risiko->upload_cek ? 'selected' : '' ?>>Sudah dicek</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary text-capitalize" type="submit">Next</button>
                                    <?= form_close(); ?>
                                </div>

                                <!-- kajian risiko -->
                                <div class="tab-pane  p-20 <?= $_GET['child'] == 'kajian_risiko' ? 'active' : '' ?>" id="kajian_risiko" role="tabpanel">
                                    <?= form_open_multipart('main/tahapan_kerja/kajian_risiko/'.$field->id_pekerjaan);?>
                                        <input type="hidden" name="id" value="<?= $kajian_risiko->id_kajian_risiko ?>">
                                        <div class="form-group">
                                            <label>Upload File Kajian Risiko</label>
                                            <input type="file" class="form-control" name="upload" placeholder="* upload file" <?= $kajian_risiko->id_kajian_risiko == null ? 'required' : '' ?>>
                                            <p><?= $kajian_risiko->file_upload != null ? '<img src="/assets/images/pdf.png" width="50" alt="pdf">'.explode('/', $kajian_risiko->file_upload)[1] : '' ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Cek</label>
                                            <select class="form-control" name="upload_cek" required>
                                                <option value="0" <?= $kajian_risiko->upload_cek ? 'selected' : '' ?>>Belum dicek</option>
                                                <option value="1" <?= $kajian_risiko->upload_cek ? 'selected' : '' ?>>Sudah dicek</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-primary text-capitalize" type="submit">Submit</button>
                                    <?= form_close(); ?>
                                </div>

                            </div>
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
