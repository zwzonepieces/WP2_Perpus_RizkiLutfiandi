<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Output</title>
</head>

<style>
    fieldset {
        width: 40%;
        margin: 20px auto;
        border-radius: 5px;
    }
    select{
        width: 100%;
    }
</style>

<body>
    <fieldset>
        <legend align="center">Output Transaksi</legend>

        <form method="POST">
            <table>
                <tr>
                    <th align="left">Nama Pembeli</th>
                    <td>:</td>
                    <td>
                        <?= $nama ; ?>
                    </td>
                </tr>

                <tr>
                    <th align="left">Nomer HP</th>
                    <td>:</td>
                    <td>
                        <?= $nhp ; ?>
                    </td>
                </tr>

                <tr>
                    <th align="left">Merk Sepatu</th>
                    <td>:</td>
                    <td>
                    <?= $merk ; ?>
                    </td>
                </tr>

                <tr>
                    <th align="left">Ukuran Sepatu</th>
                    <td>:</td>
                    <td>
                    <?= $ukuran ; ?>
                    </td>
                </tr>

                <tr>
                    <th align="left">Harga</th>
                    <td>:</td>
                    <td>
                    <?= $harga ; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="center">
                        <hr>
                            <a href="<?= base_url('Pertemuan6'); ?>">Kembali</a>
                        </hr>
                    </td>
                </tr>

            </table>
    </fieldset>
</body>
</html>