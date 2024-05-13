<?php

namespace App\Livewire\Products;

use App\Models\CustomerProducts;
use App\Models\TypesProducts;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateProduct extends Component
{
    public $open = false;
    public $type_product;
    public $product;
    public $path;
    public $customer_id;
    public $products = [];

    public function save()
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'type_product' => 'required',
                    'product' => 'required',
                ],
                [
                    'required' => 'Campo obligatorio',
                ],
            );

            // Crear Producto al Cliente
            $customerP = new CustomerProducts();
            $customerP->customer_id = $this->customer_id;
            $customerP->product_id = $this->product;
            $productNumber = $this->generateCardNumber();
            $customerP->product_number = Crypt::encryptString($productNumber);
            $customerP->save(); // Guardar Producto al Cliente

            DB::commit(); // Confirmar la transacción


            // Restablecer el formulario
            $this->reset('open', 'type_product', 'product');
            // $this->render();
            $this->dispatch('success', 'Producto agregado');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo agregar el producto. ' . $e->getMessage());
        }
    }

    public function generateCardNumber()
    {
        $number = '';
        while (strlen($number) < 16) {
            $number .= mt_rand(0, 9); // Genera un dígito aleatorio
        }
        return $number;
    }

    /**
     * Imagen del producto
     *
     * @author Duvan Smith Duque
     * 
     * @param int $id
     * @return collection
     */
    public function updatedProduct($id)
    {
        if (!empty($id)) {
            switch ($id) {
                case 1:
                    $this->path = 'recursos/Ahorros.png';
                    break;
                case 2:
                    $this->path = 'recursos/Nomina.png';
                    break;
                case 3:
                    $this->path = 'recursos/Corriente.png';
                    break;
                case 4:
                    $this->path = 'recursos/Metal.png';
                    break;
                case 5:
                    $this->path = 'recursos/Classic.png';
                    break;
                case 6:
                    $this->path = 'recursos/Gold.png';
                    break;
                case 7:
                    $this->path = 'recursos/Black.png';
                    break;
                case 8:
                    $this->path = 'recursos/Platinum.png';
                    break;
                case 9:
                    $this->path = 'recursos/Signature.png';
                    break;
                case 10:
                    $this->path = 'recursos/Infinite.png';
                    break;
                case 11:
                    $this->path = 'recursos/Light.png';
                    break;
                case 12:
                    $this->path = 'recursos/Cashback.png';
                    break;
            }
        }
    }

    /**
     * Lista de productos según el tipo de producto
     *
     * @author Duvan Smith Duque
     * 
     * @param int $id
     * @return collection
     */
    public function updatedTypeProduct($id)
    {
        if ($id == "") {
            $this->reset('products', 'product');
        } else {
            $this->reset('products', 'product');

            $typesProducts = TypesProducts::find($id);
            $this->products = $typesProducts->products;
        }
    }

    public function render()
    {
        $typesProducts = TypesProducts::where('state', 'Activo')->get();

        return view('livewire.products.create-product', compact('typesProducts'))
            ->layout('layouts.app');
    }
}
