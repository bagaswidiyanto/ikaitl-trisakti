<?php

$konek = mysqli_connect("localhost", "ikac3457_admin", "NLBuyN0]e.PQ","ikac3457_itl_trisakti");

if (!$konek) {
    echo "Koneksi Database Gagal...!!!";
}

$sql = "SELECT * FROM berita";
$query = mysqli_query($konek, $sql);
while ($data = mysqli_fetch_array($query)) {
    // echo $data["Judul_Berita"] . " ";
    $item[] = array(
        'id' => $data['ID_Berita'],
        'judul' => $data['Judul_Berita'],
        'gambar' => $data['gambar'],

    );
}
$response = array(
    'status' => 'OK',
    'data' => $item
);
echo json_encode($response);
