<?php

namespace App\Livewire\Managements;

use App\Models\Country;
use App\Models\IdentificationType;
use App\Models\Persons;
use App\Models\TypesManagements;
use App\Models\TypesPersons;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\On;
use Livewire\Component;

class IndexManagement extends Component
{
    public $identification = 1004148273;
    public $customer = [];
    public $management = [];
    public $cuentasInversion = [];
    public $tarjetasCredito = [];
    public $openManagement = false;

    public function searchCustomer()
    {
        $this->validate(
            [
                'identification' => 'required'
            ],
            [
                'identification.required' => "Por favor Ingrese Número de Identificación"
            ]
        );

        $query = Persons::select('persons.*', 'it.code', 'c.id as customer_id', 'tp.id as type_person_id', 'tpr.type_product', 'p.product', 'cp.product_number')
            ->join('identification_types AS it', 'persons.identification_type_id', 'it.id')
            ->join('customers AS c', 'persons.id', 'c.person_id')
            ->join('customer_products AS cp', 'c.id', 'cp.customer_id')
            ->join('products AS p', 'cp.product_id', 'p.id')
            ->join('types_products AS tpr', 'p.type_product_id', 'tpr.id')
            ->join('types_persons AS tp', 'c.type_person_id', 'tp.id')
            ->where('persons.identification', $this->identification)
            ->where('cp.state', 'Activo')
            ->get();

        if ($query->isEmpty()) {
            $this->dispatch('customer-create-confirmation', text: '¿Quieres crear un nuevo cliente?');
        } else {

            $first_row = $query->first();

            $this->customer = [
                'id' => $first_row->id,
                'code' => $first_row->code,
                'identification_type_id' => $first_row->identification_type_id,
                'identification' => $first_row->identification,
                'person' => $first_row->person,
                'gender' => $first_row->gender,
                'address' => $first_row->address,
                'country_id' => $first_row->country_id,
                'phone' => $first_row->phone,
                'email' => $first_row->email,
                'ocupation' => $first_row->ocupation,
                'birthdate' => $first_row->birthdate,
                'state' => $first_row->state,
                'type_person_id' => $first_row->type_person_id,
            ];

            foreach ($query as $row) {
                // Desencripta el número de producto
                $decryptedProductNumber = Crypt::decryptString($row->product_number);
                $lastFourDigits = substr($decryptedProductNumber, -4);

                // Determina la imagen según el nombre del producto
                switch ($row->product) {
                    case 'Cuenta de Ahorros':
                        $path = 'recursos/Ahorros.png';
                        break;
                    case 'Cuenta de Nómina':
                        $path = 'recursos/Nomina.png';
                        break;
                    case 'Cuenta Corriente':
                        $path = 'recursos/Corriente.png';
                        break;
                    case 'One Rewards Metal':
                        $path = 'recursos/Metal.png';
                        break;
                    case 'One Rewards Classic':
                        $path = 'recursos/Classic.png';
                        break;
                    case 'One Rewards Gold':
                        $path = 'recursos/Gold.png';
                        break;
                    case 'One Rewards Black':
                        $path = 'recursos/Black.png';
                        break;
                    case 'One Rewards Platinum':
                        $path = 'recursos/Platinum.png';
                        break;
                    case 'One Rewards Signature':
                        $path = 'recursos/Signature.png';
                        break;
                    case 'One Rewards Infinite':
                        $path = 'recursos/Infinite.png';
                        break;
                    case 'One Light':
                        $path = 'recursos/Light.png';
                        break;
                    case 'One Cashback':
                        $path = 'recursos/Cashback.png';
                        break;
                }

                // Prepara el array del producto
                $product = [
                    'type_product' => $row->type_product,
                    'product' => $row->product,
                    'product_number' => '**** **** **** ' . $lastFourDigits,
                    'path' => $path,
                ];

                // Clasifica según `type_product`
                if ($row->type_product === 'Cuentas e Inversión') {
                    $this->cuentasInversion[] = $product;
                } elseif ($row->type_product === 'Tarjetas de Crédito') {
                    $this->tarjetasCredito[] = $product;
                }
            }

            // dd($this->cuentasInversion,  $this->tarjetasCredito);
        }
    }

    /**
     * Crear Customer
     *
     * @return void
     */
    #[On('redirectCreateCustomer')]
    public function redirectCreateCustomer()
    {
        $this->dispatch('createCustomer', $this->identification);
    }

    public function createManagement()
    {
        $this->management['start_date'] = date('Y-m-d H:i:s');
        $this->openManagement = true;
    }

    public function render()
    {
        $identificationTypes = IdentificationType::all();
        $typesManagements = TypesManagements::all();
        $countries = Country::all();
        $typesPersons = TypesPersons::all();

        return view('livewire.managements.index-management', compact('identificationTypes', 'typesManagements', 'countries', 'typesPersons'))
            ->layout('layouts.app');
    }
}
