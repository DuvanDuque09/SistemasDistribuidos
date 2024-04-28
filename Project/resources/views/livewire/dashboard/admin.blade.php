<div class="h-screen w-full p-2 overflow-y-auto md:pb-4 pb-36">
    <div class="w-full px-6 mx-auto">
        <div class="mt-3 flex items-center">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNVtB5xaYM_R5sVotcaEuG-4thCAuwQo-PKn_iFpBmnA&s"
                alt="" class="h-10/12 w-10 rounded-2xl mr-3">
            <label for="" value="" class=""><b>Bienvenido</b>, Admin</label>
            <img src="https://images.emojiterra.com/google/noto-emoji/unicode-15.1/color/share/1f44b-1f3fb.jpg"
                alt="" class="h-10/12 w-10 rounded-2xl">
        </div>

        <br>
        <div class="flex">
            <div class="relative items-center p-0 overflow-hidden bg-center bg-cover h-40 rounded-2xl w-1/3 mr-4">
                <span
                    class="absolute inset-0 bg-center bg-cover bg-gradient-to-tl from-gray-50 to-gray-300 opacity-70 rounded-3 border-3 h-full"></span>
                <div class="grid grid-cols-1 gap-2 p-2 mt-2 relative">
                    <div style="z-index: 1;">
                        <h2 class="font-bold border-gray-400 p-2 text-2xl mt-5">Llamadas recibidas</h2>
                        <label for="" value="" class="opacity-50 p-2">MIÉRCOLES 24 ABRIL 2024</label>
                    </div>
                    <div class="grid grid-cols-1 gap-2 p-4 bg-blue-100 absolute top-6 right-14 z-10">
                        <p style="font-size: 5vh;"><b>200</b></p>
                    </div>
                </div>
            </div>

            <div class="relative items-center p-0 overflow-hidden bg-center bg-cover h-40 rounded-2xl w-1/2">
                <span
                    class="absolute inset-0 bg-center bg-cover bg-gradient-to-tl from-gray-50 to-gray-300 opacity-70 rounded-3 border-3 h-full"></span>
                <div class="grid grid-cols-1 gap-2 p-2 mt-2 relative">
                    <canvas id="myChart" style="width: 100%; height: 90%;"></canvas>
                </div>
            </div>
        </div>

        <div class="w-full rounded-2xl border-gray-400 flex gap-4">
            <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover h-80 rounded-2xl w-1/2">
                <span
                    class="absolute inset-0 bg-center bg-cover bg-gradient-to-tl from-gray-50 to-gray-300 opacity-70 rounded-3 border-3 h-full">
                    <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                        <h2 class="text-xl"><b>Llamadas recibidas</b></h2>
                    </div>
                    <hr class="w-full border-b-2 border-gray-400">

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

                </span>
            </div>

            <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover h-80 rounded-2xl w-1/2">
                <span
                    class="absolute inset-0 bg-center bg-cover bg-gradient-to-tl from-gray-50 to-gray-300 opacity-70 rounded-3 border-3 h-full">
                    <div class="grid grid-cols-2 gap-2 p-2 mt-2">
                        <h2 class="text-xl"><b>Resultados</b></h2>
                    </div>
                    <hr class="w-full border-b-2 border-gray-400 pl-5">
                    <br>

                    <div>

                    </div>
                </span>
            </div>
        </div>

        <div
            class="relative items-center p-0 mt-2 overflow-hidden bg-center bg-cover h-21 rounded-2xl w-1/3 mr-4 ml-auto">
            <span
                class="absolute inset-0 bg-center bg-cover bg-gradient-to-tl from-gray-50 to-gray-300 opacity-70 rounded-3 border-3 h-full"></span>
            <div class="flex flex-col p-4 relative">
                <div class="flex">
                    <label class="opacity-50 p-2 mr-4"> % CONTESTADAS </label>
                    <label class="opacity-50 p-2 mb-4"> % PERDIDAS </label>
                </div>
                <div class="flex">
                    <!-- Barra de progreso para % CONTESTADAS -->
                    <div class="relative h-4 rounded-full overflow-hidden bg-green-200 w-40 flex items-center mr-4">
                        <div class="absolute top-0 left-0 h-full bg-green-500" style="width: 25%;"></div>
                        <div class="text-center w-full">30%</div>
                    </div>
                    <!-- Barra de progreso para % PERDIDAS -->
                    <div class="relative h-4 rounded-full overflow-hidden bg-yellow-200 w-40 flex items-center mb-4">
                        <div class="absolute top-0 right-0 h-full bg-yellow-500" style="width: 24%;"></div>
                        <div class="text-center w-full">30%</div>
                    </div>
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
