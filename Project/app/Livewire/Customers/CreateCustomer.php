<?php

namespace App\Livewire\Customers;

use App\Models\Country;
use App\Models\CustomerProducts;
use App\Models\Customers;
use App\Models\IdentificationType;
use App\Models\Persons;
use App\Models\TypesPersons;
use App\Models\TypesProducts;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $open = false;
    public $products = [];
    public $customer = [];

    /**
     * Crear Customer
     *
     * @return void
     */
    #[On('createCustomer')]
    public function createCustomer($identification)
    {
        $this->customer['identification'] = $identification;
        $this->open = true;
    }

    public function save()
    {
        try {
            DB::beginTransaction(); // Iniciar transacción

            // Validar entrada de usuario
            $this->validate(
                [
                    'customer.identification_type' => 'required',
                    'customer.identification' => 'required|numeric|digits_between:6,11|unique:App\Models\Persons,identification',
                    'customer.person' => 'required|min:3|max:255',
                    'customer.gender' => 'required',
                    'customer.address' => 'required|min:3|max:50',
                    'customer.country_id' => 'required',
                    'customer.phone' => 'required|numeric|digits_between:3,11',
                    'customer.email' => 'required|email|unique:App\Models\User,email',
                    'customer.ocupation' => 'required|min:3|max:50',
                    'customer.birthdate' => 'required',
                    'customer.type_person' => 'required',
                    'customer.type_product' => 'required',
                    'customer.product' => 'required',
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

            // Crear la persona
            $person = new Persons();
            $person->identification_type_id = $this->customer['identification_type'];
            $person->identification = $this->customer['identification'];
            $person->person = $this->customer['person'];
            $person->gender = $this->customer['gender'];
            $person->address = $this->customer['address'];
            $person->country_id = $this->customer['country_id'];
            $person->phone = $this->customer['phone'];
            $person->email = $this->customer['email'];
            $person->ocupation = $this->customer['ocupation'];
            $person->birthdate = $this->customer['birthdate'];
            $person->save(); // Guardar persona

            // Crear Cliente
            $customer = new Customers();
            $customer->person_id =  $person->id;
            $customer->type_person_id = $this->customer['type_person'];
            $customer->save(); // Guardar Cliente

            // Crear Producto al Cliente
            $customerP = new CustomerProducts();
            $customerP->customer_id = $customer->id;
            $customerP->product_id = $this->customer['product'];
            $productNumber = $this->generateCardNumber();
            $customerP->product_number = Crypt::encryptString($productNumber);
            $customerP->save(); // Guardar Producto al Cliente

            DB::commit(); // Confirmar la transacción


            // Restablecer el formulario
            $this->reset('open');
            $this->customer = [];
            $this->products = [];
            $this->render();
            $this->dispatch('success', 'Cliente creado correctamente');
        } catch (\Illuminate\Database\QueryException $e) { // Manejo de errores de base de datos
            DB::rollBack();
            $this->dispatch('error', 'No se pudo crear el cliente. ' . $e->getMessage());
        }
    }

    public function searchIdentification()
    {
        $this->validate(
            [
                'customer.identification' => 'integer'
            ],
            [
                'integer' => "Solo se aceptan numeros."
            ]
        );

        $customer = Persons::where('identification', $this->customer['identification'])
            ->first();

        if (!is_null($customer)) {
            $this->customer = [];
            $this->dispatch('info', 'Ya existe usuario registrado con ese número de identificación.');
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
     * Lista de productos según el tipo de producto
     *
     * @author Duvan Smith Duque
     * 
     * @param int $id
     * @return collection
     */
    public function updatedCustomerTypeProduct($id)
    {
        if ($id == "") {
            $this->reset('products');
            $this->customer['product'] = '';
        } else {
            $this->reset('products');
            $this->customer['product'] = '';

            $typesProducts = TypesProducts::find($id);
            $this->products = $typesProducts->products;
        }
    }

    public function render()
    {
        $identificationTypes = IdentificationType::all();
        $countries = Country::all();
        $typesPersons = TypesPersons::all();
        $typesProducts = TypesProducts::all();

        return view('livewire.customers.create-customer', compact('identificationTypes', 'countries', 'typesPersons', 'typesProducts'))
            ->layout('layouts.app');
    }
}
