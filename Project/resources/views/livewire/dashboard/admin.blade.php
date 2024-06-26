{{--  <div class="h-screen">  --}}
<div
    class="grid md:grid-cols-2 grid-cols-1 h-screen w-full p-4 md:overflow-hidden overflow-y-auto md:pb-4 pb-36 relative">

    <div class="absolute top-3 left-3">
        <div class="flex items-center">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNVtB5xaYM_R5sVotcaEuG-4thCAuwQo-PKn_iFpBmnA&s"
                alt="" class="h-10/12 w-10 rounded-2xl mr-3">
            <label for="" value="" class=""><b>Bienvenido</b>, {{ Auth::user()->name }}</label>
            <img src="https://images.emojiterra.com/google/noto-emoji/unicode-15.1/color/share/1f44b-1f3fb.jpg"
                alt="" class="h-10/12 w-10 rounded-2xl">
        </div>
    </div>
    {{--  <div class="w-full h-full">  --}}


    <div class="flex flex-col md:h-[98%] w-[99%] p-4 gap-4 md:relative mt-16">
        <div class="grid grid-cols-2 md:absolute top-4 md:w-[97%] md:h-[20%] gap-4">
            <div class="bg-white w-full h-full py-6 px-4 rounded-lg shadow">
                <h2 class="text-1x2 font-extrabold p-2 text-gray-900">Llamadas recibidas</h2>
                <label for="" value=""
                    class="opacity-50 p-2 text-2">{{ \Carbon\Carbon::parse($fechaActual)->setTimezone('America/Bogota')->format('l, j \d\e F \d\e Y') }}</label>
                <div class="grid grid-cols-1 gap-1 p-2 bg-blue-100 w-[24%] z-10 rounded-3"
                    style="margin-top:5%; margin-left:34%;">
                    <p style="font-size: 4vh;top:5%; text-align:center;"><b>{{ count($datosDelDiaActual) }}</b></p>
                </div>
            </div>

            <div class="bg-white w-full h-full py-6 px-2 rounded-lg shadow">
                <div class="mt-4">
                    <div class="flex items-center mb-4">
                        <p class="flex-1 opacity-50 p-2 mr-4 text-2">%_EFICIENCIA</p>
                    </div>

                    <div class="relative h-4 w-full rounded-full overflow-hidden bg-green-200 flex items-center">
                        <?php
                        $totalDuracion = 0;
                        foreach ($datosDelDiaActual as $dato) {
                            // Calcular la duración de cada llamada en minutos
                            $duracionLlamada = Carbon\Carbon::parse($dato->end_date)->diffInMinutes(Carbon\Carbon::parse($dato->start_date));
                            // Sumar la duración de todas las llamadas
                            $totalDuracion += $duracionLlamada;
                        }
                        
                        if ($totalDuracion <= 5) {
                            $nivelEficiencia = 100;
                        } else {
                            $nivelEficiencia = (5 / $totalDuracion) * 100;
                        }
                        ?>
                        <div class="text-center w-full bg-green-500"
                            style="width: {{ $nivelEficiencia }}%; height: auto%;">{{ round($nivelEficiencia, 2) }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md:w-[90%] md:h-[55%] px-8 md:absolute bottom-0 ">
        <div class="bg-white md:w-[52%] md:h-[95%] px-4 rounded-lg shadow md:absolute">
            <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                <h2 class="text-xl"><b>Llamadas recibidas</b></h2>
            </div>
            <hr class="w-full border-b-2 border-gray-200">
            <br>
            <div class="ml-4 mr-4">
                @foreach ($datosDelDiaActual->take(10) as $dato)
                    <div class="flex items-center mb-4">
                        <img src="https://c0.klipartz.com/pngpicture/759/922/gratis-png-logo-del-telefono-iphone-telefono-smartphone-telefono-thumbnail.png"
                            class="h-10/12 w-10 rounded-2xl">
                        <div class="ml-2">
                            <p><b>Llamada recibida</b></p>
                            <label for="" value=""
                                class="opacity-60">{{ Carbon\Carbon::parse($dato->a)->setTimezone('America/Bogota')->format('H:i') }}
                                . {{ $dato->phone }}
                            </label>
                        </div>
                        <label for="" value=""
                            class="ml-auto"><b>{{ round(Carbon\Carbon::parse($dato->start_date)->diffInMinutes(Carbon\Carbon::parse($dato->end_date)), 1) }}
                                min</b></label>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="flex">
        <div class="md:w-[90%] md:h-[55%] px-4 md:absolute bottom-0 ">
            <div class="bg-white md:w-[50%] md:h-[95%] px-4 rounded-lg shadow md:absolute">
                <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                    <h2 class="text-xl"><b>Pico de Llamadas </b></h2>
                </div>
                <hr class="w-full border-b-2 border-gray-200 pl-5">
                <canvas id="picoLlamada"></canvas>
            </div>
        </div>

        <div class="md:w-[90%] md:h-[55%] px-4" style="margin-top: 5px;">
            <div class="bg-white md:w-[100%] md:h-[52%] py-4 px-3 rounded-lg shadow" style="margin-top:14%;">
                <div>
                    <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().getDay();
        today = (today === 0) ? 6 : today - 1;
        var daysOfWeek = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        var ctx1 = document.getElementById('myChart').getContext('2d');
        var llamadasPorDia = {!! json_encode($llamadasPorDiaArray) !!};
        var data = Object.values(llamadasPorDia);
        var backgroundColors = Array(data.length).fill('rgba(178, 172, 172)');
        backgroundColors[today] = 'rgba(54, 162, 235)';

        var maxYValue = Math.max(...data);
        var maxYTicks = maxYValue;

        var myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: daysOfWeek,
                datasets: [{
                    label: '# de Llamadas por Semana',
                    data: data,
                    backgroundColor: backgroundColors,
                    borderColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: function(value, context) {
                            return value;
                        },
                        precision: 0
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1,
                        ticks: {
                            stepSize: 1, // Establecer el tamaño del paso a 1 para asegurar valores enteros
                            callback: function(value) {
                                return (value === 0) ? '0' : parseInt(value)
                                    .toString(); // Convertir a entero y formatear como string
                            }
                        }
                    }
                }
            }
        });
    });


    // Datos proporcionados desde el controlador PHP
    var dataLlamadas = {!! json_encode($horaPico) !!};
    var horas = Object.keys(dataLlamadas['Hora']);
    var totales = Object.values(dataLlamadas['TotalHora']);

    // Modificar los valores en el eje Y para que sean enteros
    var maxYValue = Math.max(...totales);
    var maxYTicks = maxYValue;

    // Configurar la gráfica
    var ctx = document.getElementById('picoLlamada').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Tipo de gráfica: línea
        data: {
            labels: horas, // Horas en el eje X
            datasets: [{
                label: 'Total de Llamadas', // Etiqueta de la serie
                data: totales, // Totales en el eje Y
                backgroundColor: 'rgba(54, 162, 235, 0.8)', // Color del relleno
                borderColor: 'rgba(54, 162, 235, 1)', // Color de la línea
                borderWidth: 1,
                pointBackgroundColor: 'rgba(255, 99, 132, 1)' // Color de los puntos
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1,
                    ticks: {
                        callback: function(value) {
                            // Mostrar el valor solo si es un entero y mayor o igual a 1
                            if (Number.isInteger(value) && value >= 1) {
                                return value.toString();
                            } else {
                                return '';
                            }
                        }
                    }
                }
            }
        }
    });
</script>
