<?php

require_once 'cabecalho.php'; 
require_once 'navbar.php';
require_once '../funcoes/adocoes.php';

$dados_adocoes = buscarDadosDeAdocoes();
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
            // Dados que podem ser recuperados do seu banco de dados
            var dados = <?php echo json_encode($dados_adocoes); ?>;
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mês');
            data.addColumn('number', 'Adoções');
            dados.forEach(function(dado) {
                data.addRow([dado.mes, parseInt(dado.total)]);
            });

            // Opções de customização do gráfico
            var options = {
                title: 'Número de Adoções por Mês',
                hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'}},
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
