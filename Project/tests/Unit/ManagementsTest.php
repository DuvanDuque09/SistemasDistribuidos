<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Managements;
use Carbon\Carbon;


// Inicio Prueba Unitaria para validar si la fecha que llega es similar a la actual *****************
class ManagementsTest extends TestCase
{
    /**
     * Test para verificar si la fecha actual se está obteniendo correctamente.
     *
     * @return void
     */
    public function testObtenerFechaActual()
    {
        // Obtener la fecha actual
        $fechaActual = Carbon::now('America/Bogota')->toDateString();

        // Comparar la fecha obtenida con la fecha actual del sistema
        $this->assertEquals($fechaActual, now()->tz('America/Bogota')->toDateString());
    }
    // Fin Prueba Unitaria para validar si la fecha que llega es similar a la actual *****************


    // Inicio Prueba Unitaria para Realizalizar el calculo de la cantidad de llamadas por día **************
    public function testCalculoLlamadasPorDia()
    {
        // Crear datos de llamadas de prueba para la semana actual
        $fechaActual = Carbon::now('America/Bogota')->toDateString();
        $datosDelDiaActual = factory(Managements::class, 10)->create([
            'start_date' => $fechaActual,
        ]);

        // Ejecutar la lógica para calcular el número total de llamadas por día de la semana
        $hoy = Carbon::now();
        $inicioSemana = $hoy->startOfWeek();
        $llamadasPorDia = [];

        for ($i = 0; $i < 7; $i++) {
            $fechaDia = $inicioSemana->copy()->addDays($i);
            $llamadasDia = $datosDelDiaActual->filter(function ($dato) use ($fechaDia) {
                return Carbon::parse($dato->start_date)->toDateString() === $fechaDia->toDateString();
            });
            $numeroTotalLlamadas = $llamadasDia->count();
            $llamadasPorDia[$fechaDia->format('l')] = $numeroTotalLlamadas;
        }

        // Verificar el resultado del cálculo
        $this->assertEquals(10, $llamadasPorDia[$fechaActual]); // Verificar el número total de llamadas para el día actual
        $this->assertEquals(0, $llamadasPorDia[$inicioSemana->copy()->addDays(1)->format('l')]); // Verificar el número total de llamadas para el siguiente día
    }
    // Fin Prueba Unitaria para Realizalizar el calculo de la cantidad de llamadas por día **************

}
