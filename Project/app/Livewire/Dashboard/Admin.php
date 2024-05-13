<?php

namespace App\Livewire\Dashboard;

use App\Models\Managements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Admin extends Component
{

    public function obtenerDatosTabla()
    {
        // Ejemplo de consulta para obtener datos de una tabla llamada "ejemplo"
        $datos = DB::table('managements')->get();
        return $datos;
    }


    public $user;
    public $fechaActual;

    public function render()
    {
        $fechaActual = Carbon::now('America/Bogota')->toDateString();
        $datosDelDiaActual = Managements::where('user_id', Auth::user()->id) //Pintamos los registros de llamadas que estan registradas en el dia actual
            ->where('state', 'Activo')
            ->whereDate('start_date', $fechaActual)
            ->get();


        //************* INICIO Bloque para Obtener la cantidad de llamadas de toda la semana ********************************************* */
        $hoy = Carbon::now();
        $inicioSemana = $hoy->startOfWeek();

        // Crear un array para almacenar el número total de llamadas por cada día de la semana
        $llamadasPorDia = [];

        // Iterar sobre cada día de la semana (lunes a domingo)
        for ($i = 0; $i < 7; $i++) {
            // Obtener la fecha para el día actual en la iteración
            $fechaDia = $inicioSemana->copy()->addDays($i);

            // Filtrar los datos de llamadas para el día actual
            $llamadasDia = $datosDelDiaActual->filter(function ($dato) use ($fechaDia) {
                return Carbon::parse($dato->start_date)->toDateString() === $fechaDia->toDateString();
            });

            // Obtener el número total de llamadas para el día actual
            $numeroTotalLlamadas = $llamadasDia->count();

            // Almacenar el número total de llamadas para el día actual en el array
            $llamadasPorDia[$fechaDia->format('l')] = $numeroTotalLlamadas;
        }

        $llamadasPorDiaArray = [
            'Monday' => $llamadasPorDia['Monday'] ?? 0,
            'Tuesday' => $llamadasPorDia['Tuesday'] ?? 0,
            'Wednesday' => $llamadasPorDia['Wednesday'] ?? 0,
            'Thursday' => $llamadasPorDia['Thursday'] ?? 0,
            'Friday' => $llamadasPorDia['Friday'] ?? 0,
            'Saturday' => $llamadasPorDia['Saturday'] ?? 0,
            'Sunday' => $llamadasPorDia['Sunday'] ?? 0
        ];


        //************* FIN Bloque para Obtener la cantidad de llamadas de toda la semana ********************************************* */

        //************* INICIO Bloque para Obtener el pico de llamadas por horas del día ******************************************* */
        $fechaActual = Carbon::now('America/Bogota');
        $fecha = $fechaActual->format('Y-m-d');

        // Inicializar los arrays para almacenar el número de llamadas y el total de llamadas por hora
        $llamadasPorHora = [];
        $totalLlamadasPorHora = [];

        // Iterar sobre los datos del día actual
        foreach ($datosDelDiaActual as $dato) {
            // Obtener la fecha y hora del registro
            $fechaHoraInicio = $dato->start_date;

            // Verificar si la fecha del registro es la fecha actual
            if (substr($fechaHoraInicio, 0, 10) === $fecha) {
                $hora = date('h:i A', strtotime($fechaHoraInicio));

                // Incrementar el contador de llamadas para esta hora
                if (isset($llamadasPorHora[$hora])) {
                    $llamadasPorHora[$hora]++;
                } else {
                    $llamadasPorHora[$hora] = 1;
                }

                // Incrementar el contador de llamadas totales por hora
                if (isset($totalLlamadasPorHora[$hora])) {
                    $totalLlamadasPorHora[$hora]++;
                } else {
                    $totalLlamadasPorHora[$hora] = 1;
                }
            }
        }

        // Almacenar los resultados en un array asociativo
        $horaPico = [
            'Hora' => $llamadasPorHora,
            'TotalHora' => $totalLlamadasPorHora
        ];
        //************* FIN Bloque para Obtener el pico de llamadas por horas del día ********************************************* */

        //dd($horaPico); //dd($totalLlamadasPorHora);

        return view('livewire.dashboard.admin', [
            'datosDelDiaActual' => $datosDelDiaActual,
            'llamadasPorDiaArray' => $llamadasPorDiaArray,
            'horaPico' => $horaPico,
        ])->layout('layouts.app');
    }
}
