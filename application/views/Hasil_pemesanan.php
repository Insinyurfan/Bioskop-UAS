<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pemesanan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            padding: 50px;
            text-align: center;
        }
        .message {
            background: white;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        h2 {
            color: #10b981;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
        }
        a:hover {
            background: #1d4ed8;
        }
    </style>
</head>
<body>
    <div class="message">
        <h2>Pemesanan Berhasil!</h2>
        <p>Terima kasih, <strong><?= htmlspecialchars($nama) ?></strong> telah memesan tiket.</p>
        <a href="<?= site_url('tiket/cetak_struk/'.$id); ?>" target="_blank">Cetak Struk</a>
    </div>
</body>
</html>
