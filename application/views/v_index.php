<section>
    <h1><i class="fas fa-home fa-sm"></i><?php echo $judul ?></h1>    
    <br>
    <h1 style="font-size: 25pt"><strong>PENGERTIAN MVC</strong></h1>
    <h5 style="margin-top: -10px; color: grey">Karina - 20/10/2023, 13:00 WIB</h5>
    <center><img class="pict" src="https://1.bp.blogspot.com/-bsoPXDXzm3c/TzaFJjDsi5I/AAAAAAAAANI/gYNBTesbs3I/s400/mvc1.png" alt="codeignater"></center>
    <p align="justify">Pada pengertian codeignater diatas tadi dijelaskan nahwa codeignater menggunakan metode MVC. Apa 
        itu MVC? kita juga harus mengetahui apa itu MVC sebelum masuk dan lebih jauh dalam belajar Codeignater.
    </p>
    <p>MVC adalah teknik atau konsep yang memisahkan kompunen utama menjadi tiga komponen yaitu model,view,dan controller</p>
    <ol type="a">
        <li>Model</li>
<p align="justify">>Model adalah kelas yang merepresentasikan atau
memodelkan tipe data yang akan digunakan oleh aplikasi. Model juga
dapat didefinisakn sebagai bagian penanganan yang berhubungan dengan
pengolahan atau manipulasi database. Seperti misalnya mengambil data
dari database, menginput dan pengolahan database lainnya. Semua
intruksi atau fungsi yang berhubung dengan pengolahan database di
letakkan di dalam model. Sebagai contoh, jika ingin membuat aplikasi
untuk menghitung luas dan keliling lingkaran, maka dapat memodelkan
objek lingkaran sebagai kelas model.</p>
<p align="justify">>Sebagai catatan, Semua model harus disimpan di
dalam folder application\models</p>
<li>View</li>
<p align="justify">View merupakan bagian yang menangani halaman user
interface atau halaman yang muncul pada user(pada browser). Tampilan
dari user interface di kumpulkan pada view untuk memisahkannya
dengan controller dan model sehingga memudahkan web designer dalam
melakukan pengembangan tampilan halaman website.<</p>
<li>Controller</li>
<p align="justify">Controller merupakan kumpulan intruksi aksi yang
menghubungkan model dan view, jadi user tidak akan berhubungan
dengan model secara langsung, intinya data yang tersimpan di
database (model) di ambil oleh controller dan kemudian controller
pula yang menampilkan nya ke view. Jadi controller lah yang mengolah
intruksi.</p>
<p align="justify">Dari penjelasan tentang model view dan controller
di atas dapat di simpulkan bahwa controller sebagai penghubung view
dan model. Misalnya pada aplikasi yang menampilkan data dengan
menggunakan metode konsep mvc, controller memanggil intruksi pada
model yang mengambil data pada database, kemudian controller yang
meneruskannya pada view untuk di tampilkan. Jadi jelas sudah dan
sangat mudah dalam pengembangan aplikasi dengan cara mvc ini karena
web designer atau front-end developer tidak perlu lagi berhubungan
dengan controller, dia hanya perlu berhubungan dengan view untuk
mendesign tampilann aplikasi, karena back-end developer yang menangani bagian controller dan modelnya. Jadi pembagian tugas pun
menjadi mudah dan pengembangan aplikasi dapat di lakukan dengan
cepat dan terstruktur.</p>
        </ol>
</section>