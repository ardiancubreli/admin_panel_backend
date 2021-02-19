<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = $this->companyService->paginate();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $company = $this->companyService->create($request->validated());

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company successfully created!');
    }

    public function show($id)
    {
        $company = $this->companyService->find($id);

        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = $this->companyService->find($id);

        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = $this->companyService->update($id, $request->validated());

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company successfully updated!');
    }

    public function destroy($id)
    {
        $company = $this->companyService->delete($id);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company successfully deleted!');
    }
}
