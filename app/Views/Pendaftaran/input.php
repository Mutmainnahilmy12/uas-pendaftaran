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
                
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <div class="form-personal">
                        <label for="Id_pendaftar">Id_anggota</label>
                        <input type="Id_pendaftar" name="Id_pendaftar" id="Id_pendaftar" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Nama_Sekolah">Nama_Sekolah</label>
                        <input type="Nama_Sekolah" name="Nama_Sekolah" id="Nama_Sekolah" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="Tanggal Pendaftaran">Tanggal Pendaftaran</label>
                        <input type="Tanggal Pendaftaran" name="Tanggal Pendaftaran" id="Tanggal Pendaftaran" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Verifikasi</label>
                        <input type="Tanggal Verifikasi" name="Tanggal Verifikasi" id="Tanggal Verifikasi" class="form-control" >
                </div>
                
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save</button>
                    </div>            
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();
