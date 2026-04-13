<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS</title>
</head>
<body>
    <header>
        <h1>KOPERASI MAHASISWA</h1>
    </header>

    <div>
        <section>
            <h2>Formulir Pembelian Barang Koprasi</h2>
            <p>Setiap pengisian from akan diproses 1 hari setelahnya, jadi isi 1x saja ya..</p>
            
            <from action="proses.php" method="POST">
                <div>
                    <h4>Nama Lengkap :</h4>
                    <input type="text" name="nama" required>
                </div>
                <div>
                    <h4>NPM :</h4>
                    <input type="text" name="npm" minlength="13" maxlength="13" required>
                </div>
                <div>
                    <h4>Email :</h4>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <h4>Jenis Layanan :</h4>
                    <label><input type="radio" name="j_layanan" value="layanan1"> Reguler</label>
                    <label><input type="radio" name="j_layanan" value="layanan2"> Prioritas</label>
                </div>

                <h3>Pilih Barang</h3>
                <input type="checkbox" name="barang[]" value="Buku"> Buku (Rp. 5000)
                Jumlah: <input type="number" name="jumlah[Buku]" min="1"><br>

                <input type="checkbox" name="barang[]" value="Pulpen"> Pulpen (Rp. 3000)
                Jumlah: <input type="number" name="jumlah[Pulpen]" min="1"><br>

                <input type="checkbox" name="barang[]" value="Pensil"> Pensil (Rp. 2000)
                Jumlah: <input type="number" name="jumlah[Pensil]" min="1"><br>

                <input type="checkbox" name="barang[]" value="Penghapus"> Penghapus (Rp. 1000)
                Jumlah: <input type="number" name="jumlah[Penghapus]" min="1"><br>

                
                <div>
                    <h4>Pesan Permintaan :</h4>
                    <textarea name="pesan" id="" placeholder="Disesuaikan dengan stok yang ada ya.."></textarea>
                </div>

                <input type="submit" value="Kirim Pesanan">
                
            </from>
        </section>
    </div>

</body>
</html>