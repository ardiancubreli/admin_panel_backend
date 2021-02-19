<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $companyService;

    public function __construct(EmployeeService $employeeService, CompanyService $companyService)
    {
        $this->employeeService = $employeeService;
        $this->companyService = $companyService;
    }

    public function index()
    {
        $employees = $this->employeeService->paginate();
        $employees->load('company:id,name');

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = $this->companyService->all();

        return view('employees.create', compact('companies'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = $this->employeeService->create($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee successfully created!');
    }

    public function show($id)
    {
        $employee = $this->employeeService->find($id);
        $employee->load('company:id,name');

        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $companies = $this->companyService->all();
        $employee = $this->employeeService->find($id);
        $employee->load('company:id,name');

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = $this->employeeService->update($id, $request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee successfully updated');
    }

    public function destroy($id)
    {
        $employee = $this->employeeService->delete($id);

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee successfully deleted!');
    }
}
