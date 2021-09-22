<script type="text/javascript">
        var myChart = echarts.init(document.getElementById('main'));
        var option = {
                title: {
                        text: 'Dados Gerais Covid-19'
                },
                backgroundColor: '#fff',

                tooltip: {},
                legend: {},
                xAxis: {},

                yAxis: {},
                series: [{
                        name: '',
                        type: 'pie',    
                        radius: '55%',
                        center: ['50%', '50%'],
                        data: [
                        {name:'Total De Casos', value: <?php echo $flor;?>},
                        {name:'Mortos', value: 10},
                        {name:'Recuperados', value: 10,}],
                }]
        };

        myChart.setOption(option);


        var myChart2 = echarts.init(document.getElementById('main2'));

        // specify chart configuration item and data
        var option2 = {
                title: {
                        text: 'Dados Gerais Vacinas'
                },

                tooltip: {
                        trigger: 'axis',
                        axisPointer: {            
                                type: 'line'       
                        }
                },
                xAxis: {
                        data: ["Vacinados Primeira Dose","Vacinados Segunda Dose","Não Vacinados"]
                },      
                yAxis: {},
                series: [{
                        name: '',
                        type: 'bar',
                        barWidth: '50%',
                        data: [
                        {name:'Total De Casos', value: <?php echo $flor;?>, itemStyle: {color: '#a90000'}},
                        {name:'Mortos', value: 20, itemStyle: {color: '#a90000'}},
                        {name:'Recuperados', value: 10, itemStyle: {color: '#a90000'}}],
                        itemStyle: {
                                normal: {
                                        color: '#01BfF',
                                }
                        }
                }]
        };

        // use configuration item and data specified to show chart
        myChart2.setOption(option2);
    </script>