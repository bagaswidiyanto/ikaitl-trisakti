<?php $menu = 'souvenir' ?>
<?php include "header.php" ?>

<?php
//membuat format rupiah dengan PHP
//tutorial www.malasngoding.com

function rupiah($angka)
{

    $hasil_rupiah = "" . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, '', '.');
    return $hasil_rupiah;
}
?>
<div class="main-content">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4" style="font-size: 16px">
            <li><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="breadcrumb-item" style="margin-left: 10px"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item no-drop active">Souvenir</li>

        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive p-4" style="overflow: scroll;">
                            <a href="souvenir_tambah.php" class="mb-2 btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a>
                            <div class="dt-responsive p-4">
                                <table class="table table-bordered display nowrap fixed" id="alt-pg-dt" style="font-size: 16px;">
                                    <col width="100px">
                                    <col width="200px">
                                    <col width="300px">
                                    <col width="100px">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>No Telepon</th>
                                            <th>Foto Produk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $sql = mysqli_query($konek, "SELECT * FROM souvenir");
                                        while ($g = mysqli_fetch_array($sql)) {
                                        ?>
                                            <tr>
                                                <td align="center"><?= $no++; ?></td>
                                                <td align="right"><?= $g["Nama_Barang"]; ?></td>
                                                <td align="right"><?= rp($g["Harga"]); ?></td>
                                                <td align="center"><?= $g["No_Telp"]; ?></td>
                                                <td align="center"><img src="img/Souvenir/<?= $g["gambar"]; ?>"  style="width: 80px; height: 50px"></td>
                                                <td align="center">
                                                    <a href="souvenir_edit.php?ID_Souvenir=<?= $g['ID_Souvenir']; ?>" title="Edit">
                                                        <button class="btn btn-icon btn-outline-primary">
                                                            <i class='fas fa-edit'></i>
                                                        </button>
                                                    </a> |
                                                    <a href="souvenir_hapus.php?ID_Souvenir=<?= $g['ID_Souvenir']; ?>&gambar=<?= $g['gambar']; ?>" title="Hapus" onclick="return confirm('Anda yakin ingin hapus data ini?');">
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