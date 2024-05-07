<?php

namespace App\Livewire\Dashboard;

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
    {


    public $user;
    public $fechaActual;

    public function render()
    {
        $user = Managements::select('users.*', 'p.*')
            ->join('persons AS p', 'users.person_id', 'p.id')
            ->where('users.id', $id)
            ->first();

        // Establecer la localización en español
        Carbon::setLocale('es');

        // Obtener la fecha actual y almacenarla en la variable $fechaActual
        $this->fechaActual = Carbon::now();

        $datosTabla = $this->obtenerDatosTabla();

        //************* INICIO Bloque para Obtener las llamadas del dia actual ************************************************************** */
        // Obtener la fecha actual
        $fechaActual = Carbon::now()->format('Y-m-d');

        // Filtrar los datos relacionados con el día actual
        $datosDelDiaActual = $datosTabla->filter(function ($dato) use ($fechaActual) {
            return Carbon::parse($dato->start_date)->setTimezone('America/Bogota')->format('Y-m-d') === $fechaActual;
        });
        //************* FIN Bloque para Obtener las llamadas del dia actual ************************************************************** */

        //************* INICIO Bloque para Obtener la cantidad de llamadas de toda la semana ********************************************* */
        // Obtener la fecha actual y la fecha del primer día de la semana (lunes)
        $hoy = Carbon::now();
        $inicioSemana = $hoy->startOfWeek();

        // Crear un array para almacenar el número total de llamadas por cada día de la semana
        $llamadasPorDia = [];

        // Iterar sobre cada día de la semana (lunes a domingo)
        for ($i = 0; $i < 7; $i++) {
            // Obtener la fecha para el día actual en la iteración
            $fechaDia = $inicioSemana->copy()->addDays($i);

            // Filtrar los datos de llamadas para el día actual
            $llamadasDia = $datosTabla->filter(function ($dato) use ($fechaDia) {
                return Carbon::parse($dato->start_date)->toDateString() === $fechaDia->toDateString();
            });

            // Obtener el número total de llamadas para el día actual
            $numeroTotalLlamadas = $llamadasDia->count();

            // Almacenar el número total de llamadas para el día actual en el array
            $llamadasPorDia[$fechaDia->format('l')] = $numeroTotalLlamadas;
        }

        $llamadasPorDiaArray = [
            'Monday' => $llamadasPorDia['Monday'],
            'Tuesday' => $llamadasPorDia['Tuesday'],
            'Wednesday' => $llamadasPorDia['Wednesday'],
            'Thursday' => $llamadasPorDia['Thursday'],
            'Friday' => $llamadasPorDia['Friday'],
            'Saturday' => $llamadasPorDia['Saturday'],
            'Sunday' => $llamadasPorDia['Sunday']
        ];
        //************* FIN Bloque para Obtener la cantidad de llamadas de toda la semana ********************************************* */

        //************* INICIO Bloque para Obtener el pico de llamadas por horas del día ******************************************* */
        // Crear un array para almacenar el número de llamadas por hora
        $llamadasPorHora = [];

        // Crear un array para almacenar el total de llamadas por hora
        $totalLlamadasPorHora = [];

        // Obtener la fecha actual en formato de día (sin la hora)
        $fechaActual = date('Y-m-d');

        // Iterar sobre los datos y contar el número de llamadas por hora
        foreach ($datosTabla as $dato) {
            // Obtener la fecha y hora del registro
            $fechaHoraInicio = $dato->start_date;

            // Verificar si la fecha del registro es la fecha actual
            if (substr($fechaHoraInicio, 0, 10) === $fechaActual) {
                // Obtener la hora del registro (formato de 24 horas)
                $hora = date('H', strtotime($fechaHoraInicio));

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

        $horaPico = [
            'Hora' => $llamadasPorHora,
            'TotalHora' => $totalLlamadasPorHora
        ];

        //************* FIN Bloque para Obtener el pico de llamadas por horas del día ********************************************* */

        // dd($totalLlamadasPorHora);

        return view('livewire.dashboard.admin', [
            'datosTabla' => $datosTabla,
            'datosDelDiaActual' => $datosDelDiaActual,
            'llamadasPorDiaArray' => $llamadasPorDiaArray,
            'horaPico' => $horaPico,
        ])->layout('layouts.app');
    }
}
