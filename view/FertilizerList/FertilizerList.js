$( document ).ready(function() {

    new Chart(document.getElementById("lineChart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("lineChart2").getContext("2d"), getChartJs2('line'));
    new Chart(document.getElementById("lineChart3").getContext("2d"), getChartJs3('line'));

    function getChartJs(type) {
        var config = null;

        if (type === 'line') {
            config = {
                type: 'line',
                data: {
                    labels: ["1", "2", "3", "4", "5", "6", "7"],
                    datasets: [{
                        label: "y = 5",
                        data: [5, 5, 5, 5, 5, 5, 5],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'ปริมาตรปุ๋ย(กก./ต้น)'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'อายุ'
                            }
                        }]
                    }
                }
            }
        }
    
        return config;
    }

    function getChartJs2(type) {
        var config = null;
        
        if (type === 'line') {
            config = {
                type: 'line',
                data: {
                    labels: ["1", "2", "3", "4", "5", "6", "7"],
                    datasets: [{
                        label: "y = 2 * อายุ",
                        data: [1, 3, 5, 7, 9, 11, 13],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'อายุ (ปี)'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'กก./ต้น'
                            }
                        }]
                    }
                }
            }
        }
    
        return config;
    }

    function getChartJs3(type) {
        var config = null;
        
        if (type === 'line') {
            config = {
                type: 'line',
                data: {
                    labels: [ 50,100,150,200,250,300,350],
                    datasets: [{
                        label: "y = 2 * อายุ",
                        data: [1, 2, 3, 4, 5, 6, 7],
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false,
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'ผลผลิต(กก./ปี)'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'ปริมาตรปุ๋ย(กก./ต้น)'
                            }
                        }]
                    }
                }
            }
        }
    
        return config;
    }

    //$('.equation').append();
    $('#edit1').click(function(){
        
        $('.Modal').append(editModal);
        $('#edit-Modal').modal('show');
    })

    $('#addFertilizer').click(function(){
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    })
   
    $('#add-interdict').click(function(){
        console.log('xxxx')
        let str = `<input type='text' id='user-email' name='user-email' class='form-control' placeholder='' onchange="" > `
        $('.interdict').append(str);
    })
});