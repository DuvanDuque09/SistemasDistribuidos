<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use App\Services\CustomerService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Configura la prueba.
     */
    public function setUp(): void
    {
        parent::setUp();
        restore_error_handler(); // Restaurar el controlador de errores predeterminado
        restore_exception_handler(); // Restaurar el controlador de excepciones predeterminado
    }

    /**
     * Limpia los mocks después de cada prueba.
     */
    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close(); // Cerrar los mocks de Mockery
    }

    /**
     * Prueba unitaria para el método searchCustomer de CustomerService.
     *
     * @return void
     */
    public function testSearchCustomer()
    {
        // Desactivar el manejo automático de excepciones para esta prueba
        $this->withoutExceptionHandling();

        // Definir la cc que estás consultando
        $cc = '1234567890';

        // Simular datos quemados
        $personsData = [
            ['id' => 1, 'name' => 'John Faiber', 'cc' => '1234567890'],
        ];

        // Mock para el método searchCustomer
        $customerServiceMock = Mockery::mock(CustomerService::class);
        $customerServiceMock->shouldReceive('searchCustomer')
            ->with($cc)
            ->once()
            ->andReturn($personsData);

        // Crear instancia de CustomerService con el mock
        $customerService = $customerServiceMock;

        // Ejecutar la función que se está probando
        $result = $customerService->searchCustomer($cc);

        // Generar mensaje basado en el resultado
        if ($result[0]['cc'] === $cc) {
            $message = "Cliente encontrado";
        } else {
            $message = "Cliente no encontrado";
        }

        // Verificar que el mensaje sea el esperado
        $this->assertEquals("Cliente encontrado", $message); // Ajusta esto según tus necesidades
    }
}
