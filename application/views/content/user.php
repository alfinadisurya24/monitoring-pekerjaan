<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary"><?= $header ?></h3> </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                            <?php if ($this->session->flashdata('message')) {?>
                                <div class="alert alert-<?= $this->session->flashdata('alert');?>">
                                <?= $this->session->flashdata('message');?>
                                </div>
                            <?php } ?>
                        <a class="btn btn-md btn-primary ml-auto" href="<?=base_url()?>main/proses/user/create"><i class="fa fa-plus"></i> Create</a>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="my-tables">
                        <thead>                                 
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nama</th>
                                <th>email</th>
                                <th>Status</th>
                                <th>Verfikasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="show-data"> 
                            <?php
                                $i = 1; 
                                foreach ($getData as $key => $value) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td class="text-dark"><?= $value->nama_depan.' '.$value->nama_belakang ?></td>
                                    <td class="text-dark"><?= $value->email ?></td>
                                    <td class="text-dark"><?= $value->role ?></td>
                                    <th class="text-dark">
                                        <?php if($value->role == 'user' && $value->verifikasi == 0){ ?>
                                            <h1> <i class="fa fa-times-circle text-danger" aria-hidden="true"></i></h1>
                                        <?php } elseif($value->role == 'user' && $value->verifikasi == 1){ ?>
                                            <h1> <i class="fa fa-check-circle text-success" aria-hidden="true"></i></h1>
                                        <?php   }  ?>
                                    </th>
                                    <td>
                                        <a href="<?= base_url()?>main/proses/user/update/<?=$value->id_user?>" class="btn btn-info btn-sm editData m-1">Update</a>
                                        <button class="btn btn-danger btn-sm m-1 deleteData" data-id="<?= $value->id_user ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php } ?>                             
                        </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal delete -->
    <div id="modal-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data ?</p>
                    <?= form_open('main/delete/'.$page);?>
                        <input type="hidden" name="id" id="id">
                        <div class="btn-group float-right" role="group" aria-label="Button group">
                            <button class="btn btn-primary mr-2" type="submit">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="window.location.reload();">Close</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    $(document).ready(function () {
        // show modal delete data
        $(".deleteData").click(function (e) { 
            e.preventDefault();
            $("#modal-delete").modal('show');
            $("#id").val($(this).data("id"));
        });
    });
</script>