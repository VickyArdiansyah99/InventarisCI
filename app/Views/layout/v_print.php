<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url() ?>/paper-css/paper.css">
    <style>
        @page {
            size: A4;
            margin: 0;
            /* Hapus margin default untuk memastikan margin dari paper.css yang digunakan */
        }

        body.A4 .sheet {
            padding: 10mm;
            /* Atur padding dalam mm sesuai kebutuhan */
            box-sizing: border-box;
            /* Pastikan padding tidak menambah ukuran elemen */
            height: auto;
            /* Biarkan konten menentukan tinggi */
            page-break-after: auto;
            /* Hindari pemisahan halaman jika tidak diperlukan */
        }

        /* Kop surat CSS */
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop-surat img {
            float: left;
            width: 100px;
            height: 100px;
        }

        .kop-surat h2,
        .kop-surat h1,
        .kop-surat p {
            margin: 0;
            padding: 0;
        }

        .kop-surat h1 {
            font-size: 20pt;
            font-weight: bold;
        }

        .kop-surat h2 {
            font-size: 12pt;
            font-weight: bold;
        }

        .kop-surat p {
            font-size: 12pt;
        }

        .kop-surat a {
            color: blue;
            text-decoration: none;
        }

        .line {
            border-top: 3px solid black;
            border-bottom: 1px solid black;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="A4" onload="print()">
    <section class="sheet padding-10mm">
        <!-- Kop Surat -->
        <div class="kop-surat">
            <img src="<?= base_url('img/amik.png') ?>" alt="Logo AMIK PGRI Kebumen">
            <h2>AKADEMI MANAJEMEN INFORMATIKA DAN KOMPUTER</h2>
            <h1>AMIK PGRI KEBUMEN</h1>
            <h2><strong>TERAKREDITASI BAN-PT</strong></h2>
            <p>Alamat: Jl. Cendrawasih No. 27A Telp. 0287-386630 Kebumen 564313</p>
            <p>Website: www.amikpgrikebumen.ac.id | e-mail: office@amikpgrikebumen.ac.id</p>
            <div class="line"></div>
        </div>

        <!-- Content Section -->
        <?= $this->renderSection('content') ?>
    </section>
</body>

</html>