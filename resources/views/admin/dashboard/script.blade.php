<script>
    var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [{
            name: 'Pengguna',
            data: [10, 25, 15, 30, 40, 35, 50]
        }],
        xaxis: {
            categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
