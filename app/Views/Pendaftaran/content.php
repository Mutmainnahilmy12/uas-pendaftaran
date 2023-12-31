<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/Peminjaman/Tambah"><i class="fa-solid fa-plus"></i>Tambah Peminjaman</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Id_anggota</th>
                            <th>Nama_Sekolah</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Tanggal Verifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        foreach ($Data_Pendaftaran as $r) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $r['Id_Pendaftar']; ?></td>
                                    <td><?php echo $r['Nama_Sekolah']; ?></td>
                                    <td><?php echo $r['Tanggal Pendaftaran']; ?></td>
                                    <td><?php echo $r['Tanggal Verifikasi']; ?></td>
                                    <td>Edit | Hapus</td>
                                </tr>
                            <?php
                            $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>   
        <!-- /.card -->
    </div>
</div>
<?php
echo $this->endSection();
