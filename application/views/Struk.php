<!DOCTYPE html>
<html>
<head>
    <title>Struk Tiket</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9fafb;
            padding: 50px;
            display: flex;
            justify-content: center;
        }
        .struk {
            background: white;
            border: 1px solid #ccc;
            padding: 30px 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            color: #111827;
            margin-bottom: 20px;
        }
        p {
            font-size: 15px;
            color: #374151;
            margin: 8px 0;
        }
        .total {
            font-weight: bold;
            font-size: 16px;
            margin-top: 15px;
            color: #111827;
        }
    </style>
</head>
<body>
    <div class="struk">
        <h2>STRUK PEMBELIAN</h2>
        <p>Nama: <?= htmlspecialchars($tiket['nama']) ?></p>
        <p>Film: <?= htmlspecialchars($tiket['judul_film']) ?></p>
        <p>Jumlah Tiket: <?= $tiket['jumlah'] ?></p>
        <p>Tanggal: <?= $tiket['tanggal'] ?></p>
        <p>Jam: <?= $tiket['jam'] ?></p>
        <p>Studio: <?= $tiket['studio'] ?></p>
        <p>Kursi: <?= $tiket['kursi'] ?></p>
        <p class="total">Total Bayar: Rp <?= number_format($tiket['jumlah'] * 50000, 0, ',', '.') ?></p>
        <p style="margin-top:20px;">Terima kasih!</p>
    </div>
</body>
<script>
    window.print();
</script>

</html>
