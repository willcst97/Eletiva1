<?php

    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard de Adoção de Pets</h2>

        <!-- Div onde o gráfico será renderizado -->
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>

    <!-- Inclusão da biblioteca Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Carregar a biblioteca do Google Charts
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            // Exemplo de dados que podem ser recuperados do seu banco de dados
            var data = google.visualization.arrayToDataTable([
                ['ONG', 'Adoções'],
                ['ONG 1', 15],
                ['ONG 2', 25],
                ['ONG 3', 30],
                ['ONG 4', 10],
            ]);

            // Opções de customização do gráfico
            var options = {
                title: 'Número de Adoções por ONG',
                hAxis: {title: 'ONGs',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                chartArea: {width: '70%', height: '70%'}
            };

            // Renderizar o gráfico na div com id 'chart_div'
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
