function seacrh() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searching");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabelBarang");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
function tampil() {
  var table = document.getElementById("tabelBarang");
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      document.getElementById("kode").value = this.cells[1].innerHTML;
      document.getElementById("nama").value = this.cells[2].innerHTML;
      document.getElementById("harga").value = this.cells[3].innerHTML;
      document.getElementById("stok").value = this.cells[4].innerHTML;
    };
  }
}

function ambilKode(kode){
  document.getElementById('kodeBarang').value=kode;
}

function ketikRupiah(){
var rupiah = document.getElementById("harga");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});
}

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

