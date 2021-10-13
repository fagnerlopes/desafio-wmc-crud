<?php

namespace App\Http\Controllers;

use App\City;
use App\Employee;
use App\State;
use Illuminate\Http\Request;
use Response;

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
        $method = 'POST';
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
        Employee::firstOrCreate($request->except(['_token', 'state_id']));

        return redirect()->back();
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
        $method = 'PUT';
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
        $employee = Employee::find($id);

        dd($employee);

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
            'dob' => $request->input('dob'),
            'email' => $request->input('email'),
            'wage' => $request->input('wage')
        ]);

        $employee->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

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
