<?php
    //koneksi database
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "perpustakaan";
        
        $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
        
    if(isset($_POST['bsimpan']))
        {
            $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (npm, nama, alamat, prodi, buku)
                                              VALUES ('$_POST[tnpm]',
                                                     '$_POST[tnama]',
                                                     '$_POST[talamat]', 
                                                     '$_POST[tprodi]',
                                                     '$_POST[tbuku]')
                                                ");
                if($simpan)
                {
                    echo "<script>
                    alert('Data Kamu Berhasil Tersimpan');
                    document.location='index.php';
                 </script>";
                }
                else 
                {
                    echo "<script>
                            alert('Simpan Data Gagal!');
                            document.location='index.php';
                         </script>";
                }
        }
?>


<!DOCTYPE html>
    <html>
        <head>
        <title>Database</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Header /navbar -->
<nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#" style="font-size: 45px;">
        <img src="https://img.icons8.com/cute-clipart/64/000000/form.png" width="80" height="80" class="d-inline-block align-top" alt="">
        Perpustakaan Unindra
        </a>
    </nav>
        </head>
        <body>
        <div class="container">
        
        
        <h1 class="text-center">Database Mahasiswa</h1>
        <h2 class="text-center">Pinjam Buku</h2>

        <div class="card mt-3">
        <div class="card-header bg-primary text-white">
            Pinjaman Buku Mahasiswa
        </div>
        <div class="card-body">
           <form method="post" action="">
                <div class="form-group">
                    <labe>NPM</label>
                    <input type="text" name="tnpm" class="form-control" placeholder="input NPM anda" required>
                </div>

                <div class="form-group">
                    <labe>Nama Mahasiswa</label>
                    <input type="text" name="tnama" class="form-control" placeholder="input Nama anda" required>
                </div>

                <div class="form-group">
                    <labe>Alamat</label>
                    <textarea class="form-control" name="talamat" placeholder="Input Alamat anda" required>
                    </textarea>
                </div>
                

                <div class="form-group">
                    <labe>Program Studi</label>
                    <select class="form-control" name=tprodi placeholder="Pilih Prodi Anda">
                            <option></option>
                            <option value="D3">D3-informatika</option>
                            <option value="S1">S1-informatika </option>
                            <option value="S2">S2-informatika</option>
                    </select>
                </div>

                <div class="form-group">
                    <labe>Buku</label>
                    <select class="form-control" name=tbuku placeholder="Pilih Buku">
                            <option></option>
                            <option value="web">web development</option>
                            <option value="android">andro apps</option>
                            <option value="netwrok">network and information</option>
                    </select>
                </div>
            
                <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
                <button type="reset" class="btn btn-danger" name="breset">Reset</button>

           </form>
        </div>
        </div>

        <div class="card mt-3">
        <div class="card-header bg-success text-white">
            Data Pinjaman Buku
        </div>
        <div class="card-body">
                <table class="table table-border table-striped">
                    <tr>
                        <th>No.</th>
                        <th>NPM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <th>Buku</th>
                        <th> aksi</th>
                    </tr>
                    <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs order by id_mhs desc");
                        while($data = mysqli_fetch_array($tampil, MYSQLI_ASSOC)):
                        ?>  
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$data['npm']?></td>
                        <td><?=$data['nama']?></td>
                        <td><?=$data['alamat']?></td>
                        <td><?=$data['prodi']?></td>
                        <td><?=$data['buku']?></td>
                        <td>
                            <a href="#" class="btn btn-info">Edit</a>
                            <a href="#" class="btn btn-warning">Hapus</a>
                    </tr>
<?php endwhile;
                 ?>
                    </table>
        </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        </body>
        </html>
