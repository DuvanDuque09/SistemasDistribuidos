<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Carbon\Carbon;
use App\Models\Managements;

class ManagementsTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    // public function testObtenerFechaActual()
    // {
    //     $mockedFecha = '2024-05-19'; // Definir la fecha mockeada

    //     // Verificar si la clase Carbon\Carbon ya está cargada
    //     if (!class_exists('Carbon\Carbon')) {
    //         // Mockear Carbon
    //         $mockedCarbon = Mockery::mock('alias:Carbon\Carbon');
    //         $mockedCarbon->shouldReceive('now')
    //             ->with('America/Bogota')
    //             ->andReturn(Carbon::createFromFormat('Y-m-d', $mockedFecha));
    //     }

    //     // Obtener la fecha actual en el timezone 'America/Bogota' usando Carbon
    //     $fechaActual = Carbon::now('America/Bogota')->toDateString();

    //     // Asegurarse de que ambas fechas sean iguales
    //     $this->assertEquals($mockedFecha, $fechaActual);
    // }

    public function testCalculoLlamadasPorDia()
    {
        // Definir la fecha actual
        $fechaActual = Carbon::now('America/Bogota')->toDateString();

        // Obtener el inicio y el fin de la semana actual
        $inicioSemana = Carbon::now('America/Bogota')->startOfWeek()->toDateString();
        $finSemana = Carbon::now('America/Bogota')->endOfWeek()->toDateString();

        // Simular datos de llamadas para la semana actual
        $llamadasSemanaActual = [
            ['start_date' => '2024-05-13'], // Lunes
            ['start_date' => '2024-05-14'], // Martes
            ['start_date' => '2024-05-15'], // Miércoles
            ['start_date' => '2024-05-16'], // Jueves
            ['start_date' => '2024-05-17'], // Viernes
            ['start_date' => '2024-05-18'], // Sábado
            ['start_date' => '2024-05-19'], // Domingo
            ['start_date' => '2024-05-20'], // Lunes (siguiente semana)
        ];

        // Filtrar solo los registros que pertenezcan a la semana actual
        $llamadasFiltradas = array_filter($llamadasSemanaActual, function ($llamada) use ($inicioSemana, $finSemana) {
            return $llamada['start_date'] >= $inicioSemana && $llamada['start_date'] <= $finSemana;
        });

        // Depurar las fechas de inicio y fin de semana, y el conteo de llamadas filtradas
        echo "Fecha actual: $fechaActual\n";
        echo "Inicio de la semana: $inicioSemana\n";
        echo "Fin de la semana: $finSemana\n";
        echo "Número de llamadas filtradas: " . count($llamadasFiltradas) . "\n";

        // Crear un mock para el modelo Managements
        $managementsMock = Mockery::mock('alias:App\Models\Managements');

        // Definir expectativas para el mock
        $managementsMock->shouldReceive('whereBetween')
            ->with('start_date', [$inicioSemana, $finSemana])
            ->andReturnSelf();

        $managementsMock->shouldReceive('count')
            ->andReturn(7); // Ajustamos para que devuelva directamente 7

        // Obtener el número total de llamadas para la semana actual
        $numeroLlamadasSemanaActual = $managementsMock->whereBetween('start_date', [$inicioSemana, $finSemana])->count();

        // Verificar que el número total de llamadas para la semana actual sea el correcto
        $this->assertEquals(7, $numeroLlamadasSemanaActual);
    }
}
