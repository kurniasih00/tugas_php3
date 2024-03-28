<?php
    $mahasiswa = [
        ['nama' => 'silpi', 'nim' => 11111, 'nilai' => 75],
        ['nama' => 'mute', 'nim' => 12222,'nilai' => 90],
        ['nama' => 'iyan', 'nim' => 13333, 'nilai' => 55],
        ['nama' => 'asha', 'nim' => 14444, 'nilai' => 80],
        ['nama' => 'yoga', 'nim' => 15555, 'nilai' => 70],
        ['nama' => 'yanis', 'nim' => 16666, 'nilai' => 60],
        ['nama' => 'rara', 'nim' => 17777, 'nilai' => 85],
        ['nama' => 'adit', 'nim' => 18888, 'nilai' => 45],
        ['nama' => 'sunan', 'nim' => 19999, 'nilai' => 95],
        ['nama' => 'adrian', 'nim' => 22221, 'nilai' => 65],
        ['nama' => 'esa', 'nim' => 33331, 'nilai' => 75],
        ['nama' => 'fauzi', 'nim' => 44441, 'nilai' => 90],
        ['nama' => 'aldo', 'nim' => 55551, 'nilai' => 55],
        ['nama' => 'doyok', 'nim' => 66661, 'nilai' => 80],
        ['nama' => 'fadli', 'nim' => 777771, 'nilai' => 70],
        ['nama' => 'faris', 'nim' => 88881, 'nilai' => 60],
        ['nama' => 'dafa', 'nim' => 99991, 'nilai' => 80],
        ['nama' => 'difa', 'nim' => 22222, 'nilai' => 70],
        ['nama' => 'rio', 'nim' => 33333, 'nilai' => 60],
        ['nama' => 'khoirul', 'nim' => 44444, 'nilai' => 85],
        ['nama' => 'ganing', 'nim' => 55555, 'nilai' => 45],
        ['nama' => 'jeki', 'nim' => 66666, 'nilai' => 95],
        ['nama' => 'tito', 'nim' => 77777, 'nilai' => 65],
        ['nama' => 'clara', 'nim' => 88888, 'nilai' => 95],
        ['nama' => 'kadek', 'nim' => 99999, 'nilai' => 65]
    ];

    $ar_judul = ['No','Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    //agregat
    $nilai = array_column($mahasiswa, 'nilai');
    $nilai_tertinggi = max($nilai);
    $nilai_terendah = min($nilai);
    $nilai_rata2 = array_sum($nilai) / count($nilai);
    $jumlah_siswa = count($mahasiswa);
    $jumlah_nilai = array_sum($nilai);

    $keterangan = [
        'Nilai Tertinggi'=>$nilai_tertinggi,
        'Nilai Terendah'=>$nilai_terendah,
        'Rata-Rata Nilai'=>$nilai_rata2,
        'Jumlah Mahasiswa'=>$jumlah_siswa,
        'Jumlah Keseluruhan Nilai'=>$jumlah_nilai
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        h3{
            text-align: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        thead {
            background-color: palevioletred;
        }
        tfoot{
            background-color: lightpink;
        }
        .data_a:nth-child(even) {
            background-color: rgb(255, 215, 221);
        }
        footer {
            color: black;
            text-align: center;
        }
    </style>
    
</head>
<body>
    <h3>Daftar Nilai Mahasiswa</h3>
    <table align="center">
        <thead>
            <tr>
                <?php foreach($ar_judul as $judul){ ?>
                    <th><?= $judul ?> </th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php
            usort($mahasiswa, function($a, $b) {
                return strcmp($a['nama'], $b['nama']);
            });

            $no=1;
            foreach ($mahasiswa as $siswa){
            //ternary
            $status = $siswa['nilai'] >= 65 ? 'Lulus' : 'Tidak Lulus';
            $grade = '';
            $predikat = '';

            //if multi kondisi
            if ($siswa['nilai'] >= 85) {
                $grade = 'A';
            } elseif ($siswa['nilai'] >= 75) {
                $grade = 'B';
            } elseif ($siswa['nilai'] >= 65) {
                $grade = 'C';
            } elseif ($siswa['nilai'] >= 50) {
                $grade = 'D';
            } else {
                $grade = 'E';
            }

            //switch case
            switch ($grade) {
                case 'A':
                    $predikat = 'Memuaskan';
                    break;
                case 'B':
                    $predikat = 'Bagus';
                    break;
                case 'C':
                    $predikat = 'Cukup';
                    break;
                case 'D':
                    $predikat = 'Kurang';
                    break;
                case 'E':
                    $predikat = 'Buruk';
                    break;
                default:
                    $predikat = '';
            }
            ?>
                <tr class="data_a">
                    <td><?= $no++ ?></td>
                    <td><?= $siswa['nama']?></td>
                    <td><?= $siswa['nim']?></td>
                    <td><?= $siswa['nilai']?></td>
                    <td><?= $status ?></td>
                    <td><?= $grade ?></td>
                    <td><?= $predikat ?></td>
                </tr>
            <?php } ?>
        </tbody>

        <tfoot>
                <?php
                    foreach($keterangan as $ket => $hasil){
                ?>
                    <tr>
                        <th colspan="3"><?= $ket ?></th>
                        <th colspan="4"><?= $hasil ?></th>
                    </tr>

                <?php } ?>
        </tfoot>
    </table>
    <footer>
        <p>&copy; 2024 Kurniasih.</p>
    </footer>
    
</body>
</html>