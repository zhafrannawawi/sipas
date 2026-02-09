<script>
    // 1. Tangkap element select dan element input harga
    const deviceSelect = document.getElementById('create_device_id');
    const priceInput = document.getElementById('price_per_day_input');

    // 2. Jalankan fungsi setiap kali pilihan barang berubah
    deviceSelect.addEventListener('change', function() {
        // Ambil option yang sedang dipilih
        const selectedOption = this.options[this.selectedIndex];

        // Ambil nilai dari atribut data-price yang kita buat tadi
        const price = selectedOption.getAttribute('data-price');

        // Isi nilai input harga dengan harga dari barang tersebut
        priceInput.value = price;
    });
</script>
