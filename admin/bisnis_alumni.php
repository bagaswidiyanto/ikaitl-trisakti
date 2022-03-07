<?php $menu = 'bisnis' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Berita</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow-x: scroll;">
                            <a href="bisnis_alumni_tambah.php" class="mb-2 btn btn-primary btn-sm" title="Tambah Bisnis Alumni"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <div class="dt-responsive p-4">
                                <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Bisnis</th>
                                            <th>Link Bisnis</th>
                                            <th>Tanggal</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($konek, "SELECT * FROM bisnis");
                                        while ($b = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $b['Nama_Bisnis']; ?></td>
                                                <td><?= $kata = $b["Link_Bisnis"]; ?></td>
                                                <td align="center"><?= $b["Tanggal_Entri"]; ?></td>
                                                <td align="center"><img src="img/BisnisAlumni/<?= $b["gambar"]; ?>" style="width: 80px; height: 50px"></td>
                                                <td align="center">
                                                    <a href="bisnis_alumni_edit.php?ID_Bisnis=<?= $b['ID_Bisnis']; ?>" title="Edit">
                                                        <button class="btn btn-icon btn-outline-primary">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </a> |
                                                    <a href="bisnis_alumni_hapus.php?ID_Bisnis=<?= $b['ID_Bisnis']; ?>&gambar=<?= $b['gambar']; ?>" title="Hapus" onclick="return confirm('Anda yakin ingin hapus data ini?');">
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