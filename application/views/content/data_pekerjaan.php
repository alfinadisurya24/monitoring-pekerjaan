<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary"><?= $header ?></h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Pengumpulan Data</li>
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
                            <?php if ($_SESSION['role'] == "admin") {?>
                            <a class="btn btn-md btn-primary ml-auto"
                                href="<?=base_url()?>main/proses/data-pekerjaan/create"><i class="fa fa-plus"></i>
                                Create</a>
                            <?php } ?>
                            <a class="btn btn-md btn-success ml-auto" href="<?=base_url()?>main/excelPekerjaan"><i
                                    class="fa fa-file"></i> Download Data Pekerjaan</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="my-tables">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Nama Pekerjaan</th>
                                            <th>Anggaran</th>
                                            <th>Start</th>
                                            <th>Finish</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show-data">
                                        <?php
                                        $i = 1; 
                                        foreach ($getData as $key => $value) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="text-dark"><?= $value->nama_pekerjaan ?></td>
                                            <td class="text-dark"><?= rupiah($value->anggaran) ?></td>
                                            <td class="text-dark"><?= tanggal_indo($value->start_date) ?></td>
                                            <td class="text-dark"><?= tanggal_indo($value->finish_date) ?></td>
                                            <td class="text-dark">
                                                <?php
                                        $progress = $value->tahapan_1 + $value->tahapan_2 + $value->tahapan_3 + $value->tahapan_4 + $value->tahapan_5 + $value->tahapan_6;
                                        if ($progress == 100) { ?>
                                                <div class="bg-success border-rounded text-center pt-1 pb-1 pl-2 pr-2">
                                                    <strong>Completed</strong> (<?= $progress ?>%)
                                                </div>
                                                <?php }else{ ?>
                                                <div class="bg-warning border-rounded text-center pt-1 pb-1 pl-2 pr-2">
                                                    <strong>On Progress</strong> (<?= $progress ?>%)
                                                </div>
                                                <?php } ?>
                                            </td>
                                            <td>

                                                <a href="<?= base_url()?>main/proses/data-pekerjaan/detail/<?=$value->id_pekerjaan?>"
                                                    class="btn btn-success btn-sm detailData m-1">Detail</a>
                                                <?php if ($_SESSION['role'] == "admin") {?>
                                                <a href="<?= base_url()?>main/proses/data-pekerjaan/update/<?=$value->id_pekerjaan?>"
                                                    class="btn btn-info btn-sm editData m-1">Update</a>
                                                <button class="btn btn-danger btn-sm m-1 deleteData"
                                                    data-id="<?= $value->id_pekerjaan ?>">Delete</button>
                                                <?php } ?>
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

</div>

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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onClick="window.location.reload();">Close</button>
                </div>
                <?= form_close(); ?>
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