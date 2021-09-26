# SDP_Project_Kelas_Yuk

# Bahasa ONLY INDONESIA !!!

# Untuk Routing Akan Seperti Ini

# Routing Essential

/login -> Untuk Login System
/register -> Untuk Register System

->routing kelas (untuk parameter nanti bisa diatur sesuai kebutuhan. Pakai session atau cookie atau apapun)
/kelas/{idKelas} -> masuk homepage kelas berdasarkan ID

# Routing Guru

->routing group khusus guru (guru punya homepage sendiri)
guru/kelas/buat -> membuat kelas

->routing group guru saat dikelas (guru punya homepage sendiri)
guru/kelas/{idKelas}/ -> masuk kelas (menampilkan dashboard guru pada saat dikelas)
guru/kelas/{idKelas}/beriTugas -> memberi tugas pada kelas berdasarkan id
guru/kelas/{idKelas}/buatKuis -> masuk halaman pembuatan kuis (or pake modal which means ga pake routing)
guru/kelas/{idKelas}/penilaian -> masuk halaman penilaian tugas

# Routing Murid

->routing group khusus murid
murid/joinKelas/{idKelas} -> mendaftarkan diri ke kelas yang dituju
murid/ToDo -> masuk halaman tampilkan semua tugas di seluruh kelas yang masih ongoing(belum kena dedline)

->Routing Group murid saat masuk kelas
murid/kelas/{idKelas} -> masuk kelas (menampilkan dashboard murid pada saat dikelas)
murid/kelas/{idKelas}/kumpulTugas/{fileTugas} -> pengumpulan tugas
murid/kelas/{idKelas}/kerjakanKuis/{idKuis} -> masuk ke halaman kerja kuis
murid/kelas/{idKelas}/lihatNilai -> melihat nilai murid yang sedang login(pake session untuk melihat id murid)

# Pages (more to Come)

# Pembagian akan menjadi 3 folder semua yang layouting(murid & guru) masuk pada folder layout

# pages diisi sesuai dengan group routing diatas dibagi 3 (essential, guru, murid)

# sedangkan untuk components akan diisi untuk keperluan lain misal (textBox, ) yang bisa diulang" (tenang nek pusing ga dipake yo gpp, pas koding gausah se modular aku gpp)

layout
layout_essential -> layout untuk Essential(# diatas) (mungkin ga dipake)
layout_guru -> layout untuk guru
layout_murid -> layout
pages
essentials (folder)
navbar_guru -> navbar untuk guru
navbar_murid -> navbar untuk murid
footer -> created by u and me
login -> halaman login
register -> halaman register
kelas (folder)
kelas_guru -> halaman kelas untuk guru (dashboard)
kelas_murid -> halaman kelas untuk murid (dashboard)
guru
buat_kelas -> halaman guru membuat kelas
beri_tugas -> halaman guru memberi tugas
buat_kuis -> halaman guru membuat kuis
penilaian -> halaman guru menilai
murid
tugas -> halaman murid mendownload tugas + kumpul tugas
ambil_kuis -> halaman murid mengambil kuis
lihat_nilai -> halaman murid melihat nilai
to_do -> halaman murid melihat tugas yang masih berlangsung
components
textbox
