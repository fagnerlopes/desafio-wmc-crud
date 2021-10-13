<?php

namespace App\Http\Controllers;

use App\City;
use App\Employee;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employee.index', compact(['employees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = new Employee();
        $cities = City::all();
        $states = State::all();
        $method = 'CREATE';
        $action = route('Dashboard.Employees.store');

        return view('employee.form', compact('employee','cities', 'states', 'method', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'postal_code' => 'required|formato_cep',
            'cpf' => 'required|cpf',
            'phone' => 'nullable|telefone_com_ddd',
            'cell_phone' => 'required|celular_com_ddd',
            'email' => 'required|email:rfc,dns',
            'dob' => 'nullable|date_format:d/m/Y',
            'wage' => 'required'
        ]);

        $employee = Employee::create([
            'name' => $request->input('name'),
            'city_id' => $request->input('city_id'),
            'address' => $request->input('address'),
            'address_details' => $request->input('address_details'),
            'number' => $request->input('number'),
            'neighborhood' => $request->input('neighborhood'),
            'postal_code' => $request->input('postal_code'),
            'cpf' => $request->input('cpf'),
            'phone' => $request->input('phone'),
            'cell_phone' => $request->input('cell_phone'),
            'email' => $request->input('email'),
            'dob' => Carbon::createFromFormat('d/m/Y', $request->input('dob')),
            'wage' => floatval($request->input('wage'))
        ]);

        toastr()->success('Criado com sucesso!');

        return redirect()->route('Dashboard.Employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        $cities = City::all();
        $states = State::all();
        $method = 'UPDATE';
        $action = route('Dashboard.Employees.update', ['id' => $id]);

        // dd($employee->city->state->id);

        return view('employee.form', compact(['employee', 'method', 'action', 'cities', 'states']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'city_id' => 'required',
            'address' => 'required',
            'number' => 'required',
            'neighborhood' => 'required',
            'postal_code' => 'required',
            'cpf' => 'required',
            'cell_phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'wage' => 'required'
        ]);

        $employee = Employee::find($id);

        try {
            $employee->update([
                'name' => $request->input('name'),
                'city_id' => $request->input('city_id'),
                'address' => $request->input('address'),
                'number' => $request->input('number'),
                'neighborhood' => $request->input('neighborhood'),
                'address_details' => $request->input('address_details'),
                'postal_code' => $request->input('postal_code'),
                'cpf' => $request->input('cpf'),
                'rg' => $request->input('rg'),
                'phone' => $request->input('phone'),
                'cell_phone' => $request->input('cell_phone'),
                'dob' => Carbon::createFromFormat('d/m/Y',$request->input('dob')),
                'email' =>  $request->input('email'),
                'wage' => (float) $request->input('wage')
            ]);

            $employee->save();

            toastr()->success('Atualizado com sucesso!');

        } catch (\Exception $e) {
            if(config('APP_DEBUG')) {
                toastr()->error($e->getMessage());
            } else {
                toastr()->error('Falha ao atualizar :(');
            }
        }

        return redirect()->route('Dashboard.Employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            $employee->delete();

            toastr()->success('Excluído com sucesso!');

        } catch (\Exception $e) {
            if(config('DEBUG')) {
                toastr()->error($e->getMessage());
            } else {
                toastr()->error('Falha ao excluir :(');
            }
        }

        return redirect()->back();
    }

    public function fill(Request $request)
    {
        $cities = City::select( "id", "name" )
            ->where( "state_id", $request->input('id'))
            ->get();

        return response()->json($cities);

    }
}
