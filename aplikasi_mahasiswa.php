<!-- Alvano Hastagina -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Data Mahasiswa</title>
</head>

<?php
    $dataJenisKelamin = ["Laki-laki", "Perempuan"];
    $dataAgama = ["Islam", "Katolik", "Kristen", "Budha", "Hindu"];
    $dataJurusan = ["Teknik Informatika", "Ilmu Komputer", "Sistem Informasi","Matematika", "Teknologi Informasi"];
    $dataMatkul = ["Web Developer", "Graphic Designer", "Kalkulus","Statiska", "Aljabar", "Program Linear", "Stokastik", "Matematika Diskrit", "Kecerdasan Buatan", "Pemrograman"];

    $fileJson = "data_mahasiswa.json";
    $dataMahasiswa = array();
    
    $isiDataJson = file_get_contents($fileJson);

    $dataMahasiswa = json_decode($isiDataJson, true);


    function nh () {
        $nilai = $_POST['nilai'];
        // for($nilai = 0 ; $nilai <= 100 ; $nilai++) {
            if ($nilai <= 50) {
                return "E";
            }
            else if ($nilai >= 51 && $nilai <= 70) {
                return "D";
            }
            else if ($nilai >= 71 && $nilai <= 80) {
                return "C";
            }
            else if ($nilai >= 81 && $nilai <= 90) {
                return "B";
            }
            else if ($nilai >= 91 && $nilai <= 100) {
                return "A";
            }
            else {
                return "A+";
            }
        // }

    }
  
    function keterangan () {
        $nilai = $_POST['nilai'];
        // for($keterangan = 0 ; $keterangan <= 100 ; $keterangan++) {
            if ($nilai <= 70) {
                return "Tidak Lulus";
            }
            else {
                return "Lulus";
            }
        // }

    }
  



    if (isset($_POST['btnSimpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenisKelamin'];
        $agama = $_POST['agama'];
        $alamat = $_POST['alamat'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $jurusan = $_POST['jurusan'];
        $matkul = $_POST['matkul'];
        $tela = $_POST['tela'];
        $tala = $_POST['tala'];
        $nilai = $_POST['nilai'];
        $nh = nh();
        $keterangan = keterangan();





        $dataBaru = array (
            "nim" => $nim,
            "nama" => $nama,
            "jenisKelamin" => $jenisKelamin,
            "agama" => $agama,
            "alamat" => $alamat,
            "tel" => $tel,
            "email" => $email,
            "jurusan" => $jurusan,
            "matkul" => $matkul,
            "nilai" => $nilai,
            "tela" => $tela,
            "tala" => $tala,
            "nh" => $nh,
            "keterangan" => $keterangan

        );

        array_push($dataMahasiswa, $dataBaru);

    }
        // ubah array menjadi json
        $dataYangDiTulis = json_encode($dataMahasiswa, JSON_PRETTY_PRINT);
        file_put_contents($fileJson, $dataYangDiTulis);

?>


<body>
    <div class="d-flex justify-content-center bg-info mt-4 mb-5">
        <h1>Form Mahasiswa</h1>
    </div>
    <div style="padding: 0px 50px">
        <form action="" method="post">
            <div class="row">
                <div class="mb-3 col-6">
                    <td>
                    <label class="form-label">NIM</label>
                    <input class="form-control" type="number" name="nim" id="nim" placeholder="221100000"/>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat" id="alamat" placeholder="Jawa Barat, Bogor" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" id="nama" placeholder="Alvano Hastagina" />
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">No Telepon</label>
                    <input class="form-control" type="number" name="tel" id="tel" placeholder="081299999999" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenisKelamin" id="jenisKelamin">
                            <?php
                                foreach($dataJenisKelamin as $jk) {
                                    echo "<option value='$jk'> $jk </option>";
                                }
                            ?>
                        </select>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="aaa@gmail.com" />
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">Tempat Lahir</label>
                    <input class="form-control" type="text" name="tela" id="tela" placeholder="Bogor" />
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Jurusan</label>
                    <td>
                        <select class="form-control" name="jurusan" id="jurusan">
                            <?php
                                foreach($dataJurusan as $jurusan) {
                                    echo "<option value='$jurusan'> $jurusan </option>";
                                }
                            ?>
                        </select>
                        </td>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tala" id="tala" />
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Mata Kuliah</label>
                    <select class="form-control" name="matkul" id="matkul">
                            <?php
                                foreach($dataMatkul as $matkul) {
                                    echo "<option value='$matkul'> $matkul </option>";
                                }
                            ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                        <label class="form-label">Agama</label>
                        <select class="form-control" name="agama" id="agama">
                                <?php
                                    foreach($dataAgama as $agama) {
                                        echo "<option value='$agama'> $agama </option>";
                                    }
                                ?>
                        </select>
                </div>
                <div class="mb-3 col-6">
                    <label class="form-label">Nilai</label>
                    <input class="form-control" type="number" name="nilai" id="nilai" />
                </div>
            </div>
            <div class="mb-3 col-6">
                <input class="form-control bg-info text-white" type="submit" value="simpan" name="btnSimpan" id="btnSimpan">
            </div>
        </form>
    </div>    

    <div class="d-flex justify-content-center bg-info my-5">
        <h1>Daftar Mahasiswa</h1>
    </div>
    <div style="padding: 0px 50px">
        <table class="table table-bordered table-striped table-hover" width="100%">
            <thead>
                <tr class="bg-info">
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Mata Kuliah</th>
                    <th>Nilai</th>
                    <th>NH</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($dataMahasiswa as $mahasiswa){
                        echo "<tr>";
                        echo "<td>" . $mahasiswa['nim'] . "</td>";
                        echo "<td>" . $mahasiswa['nama'] . "</td>";
                        echo "<td>" . $mahasiswa['jenisKelamin'] . "</td>";
                        echo "<td>" . $mahasiswa['jurusan'] . "</td>";
                        echo "<td>" . $mahasiswa['matkul'] . "</td>";
                        echo "<td>" . $mahasiswa['nilai'] . "</td>";
                        echo "<td>" . $mahasiswa['nh'] . "</td>";
                        echo "<td>" . $mahasiswa['keterangan'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>