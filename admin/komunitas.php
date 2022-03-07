<?php $menu = 'komunitas' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Komunitas</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow: scroll;">
                            <a href="komunitas_tambah.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <div class="dt-responsive p-4">
                                <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <col width="50px">
                                    <col width="600px">
                                    <col width="100px">
                                    <col width="130px">
                                    <col width="250px">
                                    <col width="250px">
                                    <col width="150px">
                                    <col width="150px">
                                    <col width="150px">
                                    <col width="150px">
                                    <col width="150px">
                                    <col width="150px">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Tahun Masuk</th>
                                            <th>Tahun Wisuda</th>
                                            <th>Nama Komunitas</th>
                                            <th>Fakultas</th>
                                            <th>Telepon</th>
                                            <th>Alamat</th>
                                            <th>Tanggal</th>
                                            <th>Kode Pos</th>
                                            <th>Provinsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($konek, "SELECT * FROM komunitas");
                                        while ($k = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $k["Nama"]; ?></td>
                                                <td><?= $k["Email"]; ?></td>
                                                <td align="center"><?= $k["Tahun_Masuk"]; ?></td>
                                                <td align="center"><?= $k["Tahun_Wisuda"]; ?></td>
                                                <td><?= $k["Nama_Komunitas"]; ?></td>
                                                <td><?= $k["Fakultas"]; ?></td>
                                                <td align="center"><?= $k["No_Telp"]; ?></td>
                                                <td><?= $k["Alamat"]; ?></td>
                                                <td align="center"><?= $k["Tanggal"]; ?></td>
                                                <td align="center"><?= $k["Kode_Pos"]; ?></td>
                                                <td><?= $k["Provinsi"]; ?></td>
                                                <td align="center">
                                                    <a href="komunitas_edit.php?ID_Komunitas=<?= $k['ID_Komunitas']; ?>" title="Edit">
                                                        <button class="btn btn-icon btn-outline-primary">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </a> |
                                                    <a href="komunitas_hapus.php?ID_Komunitas=<?= $k['ID_Komunitas']; ?>" title="Hapus" onclick="return confirm('Anda yakin ingin hapus data ini?');">
                                                        <button class="btn btn-icon btn-outline-danger">
                                                            <i class='fas fa-trash'></i>
                                                        </button>
                                                    </a>
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
    </div>
</div>
<?php include "footer.php" ?>