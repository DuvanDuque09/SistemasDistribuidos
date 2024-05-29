<?php

namespace App\Livewire\Managements;

use App\Models\Country;
use App\Models\Customers;
use App\Models\IdentificationType;
use App\Models\Managements;
use App\Models\Persons;
use App\Models\TypesManagements;
use App\Models\TypesPersons;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IndexManagement extends Component
{
    use WithPagination;
    public $identification;
    // public $identification = 1004148273;
    public $customer = [];
    public $management = [];
    public $cuentasInversion = [];
    public $tarjetasCredito = [];
    public $openManagement = false;
    public $isEditable = false;

    public function searchCustomer()
    {
        $this->cuentasInversion = [];
        $this->tarjetasCredito = [];

        $this->validate(
            [
                'identification' => 'required'
            ],
            [
                'identification.required' => "Por favor Ingrese Número de Identificación"
            ]
        );

        $query = Persons::select('persons.*', 'it.code', 'c.id as customer_id', 'tp.id as type_person_id', 'cp.id as cp_id', 'tpr.type_product', 'p.product', 'cp.product_number')
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
                'customer_id' => $first_row->customer_id,
                'identification_type' => $first_row->identification_type_id,
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
                'type_person' => $first_row->type_person_id,
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
                    'id' => $row->cp_id,
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


    #[On('createProduct')]
    public function createProduct()
    {
        $this->searchCustomer();
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

    public function editCustomer()
    {
        // dd($this->customer);
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'customer.person' => 'required|min:3|max:255',
                    'customer.identification_type' => 'required',
                    'customer.identification' => 'required|numeric|digits_between:6,11|unique:App\Models\Persons,identification,' . $this->customer['id'],
                    'customer.gender' => 'required',
                    'customer.birthdate' => 'required',
                    'customer.phone' => 'required|numeric|digits_between:3,11',
                    'customer.ocupation' => 'required|min:3|max:50',
                    'customer.address' => 'required|min:3|max:50',
                    'customer.email' => 'required|email|unique:App\Models\Persons,email,' . $this->customer['id'],
                    'customer.country_id' => 'required',
                    'customer.type_person' => 'required',
                    'customer.state' => 'required',
                ],
                [
                    'required' => 'Campo obligatorio',
                    'numeric' => 'Solo se permiten números',
                    'digits_between' => 'El :attribute debe tener entre 6 y 11 dígitos',
                    'customer.identification.unique' => "El número de identificación ya existe",
                    'min' => 'El campo debe tener más de 3 caracteres',
                    'max' => 'El campo excede el número máximo de caracteres permitidos',
                    'email' => 'Debe ingresar un correo electrónico válido',
                    'customer.email.unique' => 'El correo electrónico ingresado ya está registrado',
                ],
                [
                    'customer.identification' => 'Número de Identificación',
                    'customer.phone' => 'Número de Teléfono',
                    'customer.email' => 'Correo Electrónico',
                ],
            );

            // Editar la persona
            $person = Persons::find($this->customer['id']);
            $person->person = $this->customer['person'];
            $person->identification_type_id = $this->customer['identification_type'];
            $person->identification = $this->customer['identification'];
            $person->gender = $this->customer['gender'];
            $person->birthdate = $this->customer['birthdate'];
            $person->phone = $this->customer['phone'];
            $person->ocupation = $this->customer['ocupation'];
            $person->address = $this->customer['address'];
            $person->email = $this->customer['email'];
            $person->country_id = $this->customer['country_id'];
            $person->save(); // Guardar persona

            // Editar Cliente
            $customer = Customers::find($this->customer['customer_id']);
            $customer->type_person_id = $this->customer['type_person'];
            $customer->state = $this->customer['state'];
            $customer->save(); // Guardar Cliente


            DB::commit(); // Confirmar la transacción


            // Restablecer el formulario
            $this->reset('isEditable');
            $this->management = [];
            $this->render();
            $this->dispatch('success', 'Cliente editado correctamente');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo editar el Cliente. ' . $e->getMessage());
        }
    }
    public function saveManagement()
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'management.type_management_id' => 'required',
                    'management.phone' => 'required|numeric|digits_between:3,11',
                    'management.management' => ['required', 'not_regex:/[\x02]+/', 'max:300'],
                    'management.product' => 'required',
                ],
                [
                    'required' => 'Campo obligatorio',
                    'numeric' => 'Solo se permiten números',
                    'digits_between' => 'El :attribute debe tener entre 6 y 11 dígitos',
                    'management.management.not_regex' => 'Consulta no puede contener caracteres especiales.',
                    'management.management.max' => 'El campo Consulta no puede tener más de 300 caracteres.',
                ],
            );

            // Crear Consulta
            $management = new Managements();
            $management->type_management_id = $this->management['type_management_id'];
            $management->phone = $this->management['phone'];
            $management->management = $this->management['management'];
            $management->customer_product_id = $this->management['product'];
            $management->user_id = Auth::user()->id;
            $management->start_date = $this->management['start_date'];
            $management->end_date = date('Y-m-d H:i:s');
            $management->save(); // Guardar Consulta del Cliente

            DB::commit(); // Confirmar la transacción


            // Restablecer el formulario
            $this->reset('openManagement');
            $this->management = [];
            $this->render();
            $this->dispatch('success', 'Consulta creada correctamente');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo crear la Consulta. ' . $e->getMessage());
        }
    }

    public function render()
    {
        $identificationTypes = IdentificationType::where('state', 'Activo')->get();
        $countries = Country::where('state', 'Activo')->get();
        $typesPersons = TypesPersons::where('state', 'Activo')->get();
        $typesManagements = TypesManagements::where('state', 'Activo')->get();

        $managements = Managements::select('tm.type_management', 'tp.type_product', 'p.product', 'managements.start_date AS date', 'u.name', 'u.profile_photo_path AS photo')
            ->join('types_managements AS tm', 'managements.type_management_id', 'tm.id')
            ->join('customer_products AS cp', 'managements.customer_product_id', 'cp.id')
            ->join('products AS p', 'cp.product_id', 'p.id')
            ->join('types_products AS tp', 'p.type_product_id', 'tp.id')
            ->join('users AS u', 'managements.user_id', 'u.id')
            ->where('managements.state', 'Activo')
            ->where(function (Builder $query) {
                if (isset($this->customer['customer_id'])) {
                    return $query->where('cp.customer_id', $this->customer['customer_id']);
                }
            })
            // ->get();
            ->paginate(15);

        // dd($managements);

        return view('livewire.managements.index-management', compact('identificationTypes', 'typesManagements', 'countries', 'typesPersons', 'managements'))
            ->layout('layouts.app');
    }
}
