(function() {
    let httpRequest;
    let materia_select = document.getElementById("materia_select")
    let comisiones_select = document.getElementById("comisiones_select")
    let graphBtn = document.getElementById("graphBtn") 
    let canvas = document.getElementById('myChart');
    let ctx = document.getElementById('myChart').getContext('2d');
    
    let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [0, 1 , 2, 3, 4, 5, 6, 7, 8, 9, 10],
            datasets: [{
                label: 'Cantidad de alumnos por nota',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 96, 64, 1)',
                    'rgba(245, 221, 66, 1)',
                    'rgba(174, 232, 74, 1)',
                    'rgba(232, 74, 137, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(73, 227, 201, 1)'
                ]
            }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        gridLines: {
                            display: false,
                            color: 'rgb(52, 184, 184)'
                        },
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false,
                            color: 'rgb(52, 184, 184)'
                        }
                    }]
                },
                legend: {
                        labels: {
                            boxWidth: 0,
                            fontSize: 16,
                            fontFamily: 'Work Sans',
                        }
                },
                responsive: true
            }
    });    
    materia_select.addEventListener('change', () => {
        while (comisiones_select.firstChild) {
            comisiones_select.removeChild(comisiones_select.firstChild);
        }
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = alertContents;
        
        httpRequest.open('GET', `https://ria.folp.unlp.edu.ar/mdl-course/getComisiones/${materia_select.value}`);
        httpRequest.responseType = 'json';
        httpRequest.send();
    })

    graphBtn.addEventListener('click', () => {
        let materia = materia_select.value;
        let comision = comisiones_select.value;
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = genDataset;
        httpRequest.open('GET',`https://ria.folp.unlp.edu.ar/mdl-course/getNotas/${materia}/${comision}`);
        httpRequest.responseType = 'json';
        httpRequest.send();
    })

    function genDataset() {
        if (okRequest()) {
            let { total } = httpRequest.response;
            let values = Array(11);
            values.fill(0);
            total.forEach(function(element, index, array) {
                values[Math.ceil(element.rawgrade)] += element.count;
            })
            addData(myChart, values, 0);
        }
    }

    function alertContents() {
        if (okRequest()) {
            let { comisiones } = httpRequest.response
            let option = document.createElement("option");
            option.setAttribute("value", '');
            let contenido = document.createTextNode("Elija una comisión");
            option.appendChild(contenido);
            comisiones_select.appendChild(option);
            for (var index in comisiones) {
                let option = document.createElement("option");
                option.setAttribute("value", index);
                let contenido = document.createTextNode(comisiones[index]);
                option.appendChild(contenido);
                comisiones_select.appendChild(option);
            }
        } 
    }
    function okRequest() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                return true;
            } else {
                alert('Problema');
            }
        } 
    }
    function addData(chart, data, datasetIndex) {
        chart.data.datasets[datasetIndex].data = data;
        chart.update();
     }
})();
