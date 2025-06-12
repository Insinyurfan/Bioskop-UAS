<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Tiket Bioskop</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f2f4f7;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #333;
        }

        label {
            font-size: 14px;
            font-weight: 500;
            color: #444;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background: #2563eb;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #1d4ed8;
        }

        #harga {
            margin-top: -10px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 16px;
        }

        .screen {
            background: #ccc;
            text-align: center;
            padding: 8px;
            margin-bottom: 10px;
            font-weight: bold;
            border-radius: 4px;
        }

        .seat-layout {
            display: grid;
            grid-template-columns: repeat(5, auto); /* 5 kolom */
            gap: 8px;
            justify-content: center;
            margin-bottom: 20px;
        }

        .seat {
            position: relative;
        }

        .seat input {
            display: none;
        }

        .seat span {
            display: inline-block;
            width: 30px;
            height: 30px;
            background: #6d4c41;
            color: #fff;
            text-align: center;
            line-height: 30px;
            border-radius: 4px;
            font-size: 12px;
            cursor: pointer;
        }

        .seat input:checked + span {
            background: red;
        }

        .seat input:disabled + span {
            background: #aaa;
            cursor: not-allowed;
        }

    </style>
</head>
<body>
    <div class="card">
        <h2>Pesan Tiket</h2>
        <form action="<?= site_url('tiket/pesan'); ?>" method="post">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>

            <label for="judul_film">Judul Film:</label>
            <input type="text" name="judul_film" required>

            <label for="jumlah">Jumlah Tiket:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" value="1" readonly required>
            <p id="harga">Total Harga: Rp 50.000</p>

            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" required>

            <label for="jam">Jam Tayang:</label>
            <select name="jam" required>
                <option value="">-- Pilih Jam --</option>
                <option value="10:00">10:00</option>
                <option value="13:00">13:00</option>
                <option value="16:00">16:00</option>
                <option value="19:00">19:00</option>
                <option value="21:00">21:00</option>
            </select>

            <label for="studio">Studio:</label>
            <select name="studio" required>
                <option value="">-- Pilih Studio --</option>
                <option value="Studio 1">Studio 1</option>
                <option value="Studio 2">Studio 2</option>
                <option value="Studio 3">Studio 3</option>
            </select>

            <label for="kursi">Pilih Kursi:</label>
            <div class="screen">LAYAR</div>
            <div class="seat-layout">
            <?php
            $baris = ['A','B','C','D','E'];
            $kursi_terisi = ['C3', 'D2']; // contoh kursi terisi

            foreach ($baris as $b) {
                for ($k = 1; $k <= 5; $k++) {
                    $kode = $b . $k;
                    $disabled = in_array($kode, $kursi_terisi) ? 'disabled' : '';
                    echo "<label class='seat'>
                            <input type='checkbox' name='kursi[]' value='$kode' $disabled>
                            <span>$kode</span>
                        </label>";
                }
            }
            ?>
            </div>


            <p><strong>Kursi dipilih:</strong> <span id="selected-seats">-</span></p>



            <button type="submit">Pesan Tiket</button>
        </form>
    </div>

    <script>
        const inputJumlah = document.getElementById('jumlah');
        const labelHarga = document.getElementById('harga');
        const hargaPerTiket = 50000;

        function updateHarga() {
            let jumlah = parseInt(inputJumlah.value) || 1;
            let total = jumlah * hargaPerTiket;
            labelHarga.textContent = "Total Harga: Rp " + total.toLocaleString('id-ID');
        }

        inputJumlah.addEventListener('input', updateHarga);
        window.addEventListener('DOMContentLoaded', updateHarga);
        // Pemilihan kursi multiple
        const kursiInputs = document.querySelectorAll('input[name="kursi[]"]');
        const selectedSeats = document.getElementById('selected-seats');

        function updateKursi() {
            const selected = Array.from(kursiInputs)
                .filter(i => i.checked)
                .map(i => i.value);
            selectedSeats.textContent = selected.join(', ') || '-';
            inputJumlah.value = selected.length;
            updateHarga(); // panggil ulang agar total harga ikut berubah
        }

        kursiInputs.forEach(i => i.addEventListener('change', updateKursi));

    </script>
</body>
</html>
