<?php
function hitungHargaCilok($n) {
  $harga_satuan = 0;
  
  // ==========================================
  // TUGAS: Isi variabel $harga_satuan pakai Ternary Operator!
  // Clue: Gunakan ternary bercabang (nested ternary).
  // 
  // TULIS KODE KALIAN DI BAWAH INI:
  // ==========================================
  $harga_satuan = ($n <= 5) ? 1000 : (($n >= 5 && $n < 9) ? 950 : 900);
  // ==========================================
  // JANGAN UBAH KODE DI BAWAH INI
  return $n * $harga_satuan;
}

// Bagian ini buat ngecek apakah jawaban mereka bener
echo "Beli 4 cilok: Rp " . hitungHargaCilok(4) . " (Harusnya Rp 4000) <br>";
echo "Beli 5 cilok: Rp " . hitungHargaCilok(5) . " (Harusnya Rp 4750) <br>";
echo "Beli 10 cilok: Rp " . hitungHargaCilok(10) . " (Harusnya Rp 9000) <br>";
?>