<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Prog II | Merancang Template sederhana dengan codeignater</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/stylebuku.css">
</head>
<body>
    <div id="wrapper">
        <header>
            <hgroup>
                <h1>RentalBuku.net</h1>
                <h3>Membuat Template Sederhna deangan CodeIgnater</h3>
            </hgroup>
            <nav>
                <ul>
                    <li><a href="<?php echo base_url().'index.php/web'?>"></a></li>
                    <li><a href="<?php echo base_url().'index.php/web/about'?>"></a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </header>
<section>
    <h1><?php echo $judul ?></h1>
    <p align="justify">Pada pengertian codeignater diatas tadi dijelaskan nahwa codeignater menggunakan metode MVC. Apa 
        itu MVC? kita juga harus mengetahui apa itu MVC sebelum masuk dan lebih jauh dalam belajar Codeignater.
    </p>
    <p>MVC adalah teknik atau konsep yang memisahkan kompunen utama menjadi tiga komponen yaitu model,view,dan controller</p>

</section>
    </div>
    
</body>
</html>