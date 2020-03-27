<?php
//Pakai ARRAY ASSOSIATING
$data = array(
    "catatan1" => "Kehadiran >= 70%",
    "catatan2" => "Interaktif dikelas",
    "catatan3" => "Tidak terlambat mengumpulkan tugas"
);

?>
<html>
<title>Latihan 3_6</title>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <br>
    <br>
    <br>
    <form action="" method="post" name="input">

        <table align="center">
            <tr>
                <td>NIM</td>
                <td><input type="text" class="form-control form-control-lg" name="nim" value="<?php if (!empty($_POST["nim"])) {
                                                                                                    echo $_POST["nim"];
                                                                                                }; ?>" required></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td><select name="progdi" class="form-control" required>
                        <option value="A11 - Teknik Informatika S1">Teknik Informatika S1 </option>
                        <option value="A12 - Sistem Informasi S1 ">Sistem Informasi S1</option>
                        <option value="A22 - Teknik Informatika D3">Teknik Informatika D3</option>

                    </select></td>
            </tr>
            <tr>
                <td>Nilai Tugas</td>
                <td><input type="text" class="form-control form-control-lg" name="nt" value="<?php if (!empty($_POST["nt"])) {
                                                                                                    echo $_POST["nt"];
                                                                                                }; ?>" required></td>
            </tr>
            <tr>
                <td>Nilai UTS</td>
                <td><input type="text" class="form-control form-control-lg" name="uts" value="<?php if (!empty($_POST["uts"])) {
                                                                                                    echo $_POST["uts"];
                                                                                                }; ?>" required></td>
            </tr>
            <tr>
                <td>Nilai UAS</td>
                <td><input type="text" class="form-control form-control-lg" name="uas" value="<?php if (!empty($_POST["uas"])) {
                                                                                                    echo $_POST["uas"];
                                                                                                }; ?>" required></td>
            </tr>
            <tr>
                <td>Catatan Khusus</td>
                <td>
                    <br><input type="checkbox" name="catatan1" value="<?php echo $data["catatan1"]; ?>">Kehadiran >= 70%</br>
                    <br><input type="checkbox" name="catatan2" value="<?php echo $data["catatan2"]; ?>">interaktif dikelas</br>
                    <br><input type="checkbox" name="catatan3" value="<?php echo $data["catatan3"]; ?>">Tidak terlambat mengumpulkan tugas</br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="btn btn-warning" name="input" value="simpan"></td>
            </tr>

        </table>
    </form>
</body>

</html>

<?php

function hasil_akhir($nt, $uts, $uas)
{
    return ($nt * 0.4) + ($uts * 0.3) + ($uas * 0.3);
}
function keterangan($nt, $uts, $uas)
{
    if (hasil_akhir($nt, $uts, $uas) >= 60) {
        echo "LULUS";
    } else {
        echo "TIDAK LULUS";
    }
}
if (isset($_POST['input'])) {

    if (isset($_POST['progdi'])) {
        $progdi = $_POST['progdi'];
    }
    if (isset($_POST['nim'])) {
        $nim = $_POST['nim'];
    }
    if (isset($_POST['nt'])) {
        $nt = $_POST['nt'];
    }
    if (isset($_POST['uts'])) {
        $uts = $_POST['uts'];
    }
    if (isset($_POST['uas'])) {
        $uas = $_POST['uas'];
    }



?>
    <table border="1" cellpadding="10" align="center">
        <tr>
            <td bgcolor="black" style="color: white;">Program Studi</td>
            <td bgcolor="black" style="color: white;">NIM</td>
            <td bgcolor="black" style="color: white;">Nilai Akhir</td>
            <td bgcolor="black" style="color: white;">STATUS</td>
            <td bgcolor="black" style="color: white;">Catatan Khusus</td>

        </tr>
        <tr bgcolor="#A9A9A9">
            <td><?= $progdi ?></td>
            <td><?= $nim ?></td>
            <td><?= hasil_akhir($nt, $uts, $uas) ?></td>
            <td><?php keterangan($nt, $uts, $uas) ?></td>
            <td><?php
                if (isset($_POST['catatan1'])) {
                    echo "+ " . $_POST['catatan1'] . "<br>";
                }
                if (isset($_POST['catatan2'])) {
                    echo "+ " . $_POST['catatan2'] . "<br>";
                }
                if (isset($_POST['catatan3'])) {
                    echo "+ " . $_POST['catatan3'] . "<br>";
                } ?></td>
        </tr>
    </table>

<?php } ?>