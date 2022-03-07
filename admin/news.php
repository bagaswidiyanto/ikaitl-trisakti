<?php $menu = 'news' ?>
<?php include "header.php" ?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">IKAITL News</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow-x: scroll;">
                            <a href="news_tambah.php" class="mb-2 btn btn-primary btn-sm" title="Tambah Berita"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <div class="dt-responsive p-4">
                                <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <!-- <col width="50px">
                                    <col width="200px">
                                    <col width="100px">
                                    <col width="130px">
                                    <col width="250px">
                                    <col width="150px"> -->
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Judul Berita</th>
                                            <th>Tanggal</th>
                                            <th>Foto Berita</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($konek, "SELECT * FROM news");
                                        while ($n = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td><?= $n['Judul_Berita']; ?></td>
                                                <td align="center"><?= $n["Tanggal"]; ?></td>
                                                <td align="center"><img src="img/News/<?= $n["gambar"]; ?>" style="width: 80px; height: 50px"></td>
                                                <td align="center">
                                                    <a href="news_edit.php?ID_News=<?= $n['ID_News']; ?>" title="Edit">
                                                        <button class="btn btn-icon btn-outline-primary">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </a> |
                                                    <a href="news_hapus.php?ID_News=<?= $n['ID_News']; ?>&gambar=<?= $n['gambar']; ?>" title="Hapus" onclick="return confirm('Anda yakin ingin hapus data ini?');">
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