{{--  <div class="h-screen">  --}}
<div
    class="grid md:grid-cols-2 grid-cols-1 h-screen w-full p-4 md:overflow-hidden overflow-y-auto md:pb-4 pb-36 relative">
    <div class="absolute top-3 left-3">
        <div class="flex items-center">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNVtB5xaYM_R5sVotcaEuG-4thCAuwQo-PKn_iFpBmnA&s"
                alt="" class="h-10/12 w-10 rounded-2xl mr-3">
            <label for="" value="" class=""><b>Bienvenido</b>, {{ $user->name }}</label>
            <img src="https://images.emojiterra.com/google/noto-emoji/unicode-15.1/color/share/1f44b-1f3fb.jpg"
                alt="" class="h-10/12 w-10 rounded-2xl">
        </div>
    </div>
    {{--  <div class="w-full h-full">  --}}
    <div class="flex flex-col md:h-[98%] w-[99%] p-4 gap-4 md:relative mt-16">
        <div class="grid grid-cols-2 md:absolute top-4 md:w-[97%] md:h-[20%] gap-4">
            <div class="bg-white w-full h-full py-6 px-4 rounded-lg shadow">
                <h2 class="text-1x2 font-extrabold p-2 text-gray-900">Llamadas recibidas</h2>
                <label for="" value="" class="opacity-50 p-2 text-2">{{ $fechaActual }}</label>
                <div class="grid grid-cols-1 gap-1 p-2 bg-blue-100 w-[24%] z-10 rounded-3"
                    style="margin-top:5%; margin-left:34%;">
                    <p style="font-size: 4vh;top:5%;"><b>200</b></p>
                </div>
            </div>

            <div class="bg-white w-full h-full py-6 px-2 rounded-lg shadow">
                <div class="mt-4">
                    <div class="flex items-center mb-4">
                        <p class="flex-1 opacity-50 p-2 mr-4 text-2">%_CONTESTADAS</p>
                        <p class="flex-1 opacity-50 p-2 mr-4 text-2">%_PERDIDAS</p>
                    </div>

                    <div class="grid grid-cols-2 gap-1 p-2 rounded-3 w-full">
                        <!-- Barra de progreso para % CONTESTADAS -->
                        <div class="relative h-4 w-full rounded-full overflow-hidden bg-green-200 flex items-center">
                            <div class="absolute top-0 left-0 bg-green-500" style="width: 30%; height: 100%;"></div>
                            <div class="text-center w-full">30%</div>
                        </div>
                        <!-- Barra de progreso para % PERDIDAS -->
                        <div class="relative h-4 w-full rounded-full overflow-hidden bg-yellow-200 flex items-center">
                            <div class="absolute top-0 right-0 bg-yellow-500" style="width: 30%; height: 100%;"></div>
                            <div class="text-center w-full">30%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="md:w-[90%] md:h-[55%] px-4 md:absolute bottom-0 ">
        <div class="bg-white md:w-[50%] md:h-[95%] px-4 rounded-lg shadow md:absolute">
            <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                <h2 class="text-xl"><b>Llamadas recibidas</b></h2>
            </div>
            <hr class="w-full border-b-2 border-gray-200">

            <br>
            <div class="ml-4 mr-4 flex items-center">
                <img src="https://c0.klipartz.com/pngpicture/759/922/gratis-png-logo-del-telefono-iphone-telefono-smartphone-telefono-thumbnail.png"
                    class="h-10/12 w-10 rounded-2xl">
                <div class="ml-2">
                    <p><b>Llamada recibida</b></p>
                    <label for="" value="" class="opacity-60">5:12 . Colombia</label>
                </div>
                <label for="" value="" class="ml-auto"><b>10 min</b></label>
            </div>

            <br>
            <div class="ml-4 mr-4 flex items-center">
                <img src="https://c0.klipartz.com/pngpicture/759/922/gratis-png-logo-del-telefono-iphone-telefono-smartphone-telefono-thumbnail.png"
                    class="h-10/12 w-10 rounded-2xl">
                <div class="ml-2">
                    <p><b>Llamada recibida</b></p>
                    <label for="" value="" class="opacity-60">5:12 . Colombia</label>
                </div>
                <label for="" value="" class="ml-auto"><b>10 min</b></label>
            </div>

            <br>
            <div class="ml-4 mr-4 flex items-center">
                <img src="https://c0.klipartz.com/pngpicture/756/62/gratis-png-iconos-de-la-computadora-llamada-telefonica-iphone-iphone.png"
                    class="h-10/12 w-10 rounded-2xl">
                <div class="ml-2">
                    <p><b>Llamada Perdida</b></p>
                    <label for="" value="" class="opacity-60">5:12 . Colombia</label>
                </div>
                <label for="" value="" class="ml-auto"><b>0 min</b></label>
            </div>

        </div>
    </div>

    <div class="flex">
        <div class="md:w-[90%] md:h-[55%] px-4 md:absolute bottom-0 ">
            <div class="bg-white md:w-[50%] md:h-[95%] px-4 rounded-lg shadow md:absolute">
                <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                    <h2 class="text-xl"><b>Resultados</b></h2>
                </div>
                <hr class="w-full border-b-2 border-gray-200 pl-5">
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
        var today = new Date().getDay(); // Obtener el día actual (0 para Domingo, 1 para Lunes, etc.)
        var daysOfWeek = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = [12, 19, 3, 5, 2, 3, 8].slice(0, today + 1); // Cortar los datos hasta el día actual
        var backgroundColors = Array(data.length).fill('rgba(178, 172, 172)'); // Colores predeterminados

        // Cambiar el color del día actual a azul
        backgroundColors[today] = 'rgba(54, 162, 235)';

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: daysOfWeek.slice(0, today +
                    1), // Cortar los días de la semana hasta el día actual
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
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
