document.getElementById("formNilai").addEventListener("submit", function(event){
    event.preventDefault();

    let nama = document.getElementById("nama").value;
    let npm = document.getElementById("npm").value;
    let nilai = parseInt(document.getElementById("nilai").value);
    let hasil = "";

    if(nilai < 0 || nilai > 100){
    hasil = "Nilai tidak valid!";
    }
    else if(nilai >= 80){
        hasil = "Huruf Mutu: A";
    }
    else if(nilai >= 70){
        hasil = "Huruf Mutu: B";
    }
    else if(nilai >= 60){
        hasil = "Huruf Mutu: C";
    }
    else if(nilai >= 50){
        hasil = "Huruf Mutu: D";
    }
    else{
        hasil = "Huruf Mutu: E";
    }

    document.getElementById("hasil").innerHTML =
    "Nama: " + nama + "<br>" +
    "NPM: " + npm + "<br>" +
    hasil;

});