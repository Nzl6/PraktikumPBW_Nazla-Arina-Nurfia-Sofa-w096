/buatkan logika yang php yang memproses file <NO_1 class="html"></NO_1>
<?php
// Cek apakah file telah diunggah
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        $fileName = $file['name'];
        $fileTmpPath = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        $uploadDir = 'uploads/';
        $destPath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            echo "File berhasil diunggah: " . htmlspecialchars($fileName);
        } else {
            echo "Terjadi kesalahan saat memindahkan file.";
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file. Kode error: " . $file['error'];
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
