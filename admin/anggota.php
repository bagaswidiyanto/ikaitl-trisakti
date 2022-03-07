<?php $menu = 'anggota' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Anggota</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow-x: scroll;">
                            <div class="dt-responsive">
                                <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>ID Anggota</th>
                                            <th>NIA</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                            <th>Tahun Masuk</th>
                                            <th>Tahun Wisuda</th>
                                            <th>Fakultas</th>
                                            <th>No Telp</th>
                                            <th>Alamat</th>
                                            <th>Kode Pos</th>
                                            <th>Provinsi</th>
                                            <th>Tanggal Entri</th>
                                            <th>Level</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($konek, "SELECT * FROM anggota");
                                        while ($a = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $a['ID_Anggota']; ?></td>
                                                <td><?= $a['NIA']; ?></td>
                                                <td><?= $a['Nama']; ?></td>
                                                <td><?= $a['NIM']; ?></td>
                                                <td><?= $a['Email']; ?></td>
                                                <td><?= $a['Tahun_Masuk']; ?></td>
                                                <td><?= $a['Tahun_Wisuda']; ?></td>
                                                <td><?= $a['Fakultas']; ?></td>
                                                <td><?= $a['No_Telp']; ?></td>
                                                <td><?= $a['Alamat']; ?></td>
                                                <td><?= $a['Kode_Pos']; ?></td>
                                                <td><?= $a['Provinsi']; ?></td>
                                                <td><?= $a["Tanggal_Entri"]; ?></td>
                                                <td><?= $a["Level"]; ?></td>
                                                <td align="center"><img src="../assets/img/profil/<?= $a['gambar']; ?>" style="width: 80px; height: 50px"></td>
                                                <td align="center">
                                                    <a href="anggota_edit.php?ID_Anggota=<?= $a['ID_Anggota']; ?>" title="Edit">
                                                        <button class="btn btn-icon btn-outline-primary">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </a> |
                                                    <a href="anggota_hapus.php?ID_Anggota=<?= $a['ID_Anggota']; ?>&gambar=<?= $a['gambar']; ?>" title="Hapus" onclick="return confirm('Anda yakin ingin hapus data ini?');">
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