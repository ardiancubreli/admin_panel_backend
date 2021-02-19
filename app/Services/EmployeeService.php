<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class EmployeeService
{
    protected $employeeRepository;

    protected $companyService;

    public function __construct(EmployeeRepository $employeeRepository, CompanyService $companyService)
    {
        $this->employeeRepository   = $employeeRepository;
        $this->companyService       = $companyService;
    }

    public function paginate()
    {
        return $this->employeeRepository->paginate();
    }

    public function find($id)
    {
        return $this->employeeRepository->find($id);
    }

    public function create($data)
    {
        $company = $this->companyService->find($data['company_id']);

        if (is_null($company)) {
            throw new UnprocessableEntityHttpException('Company selected does not exist!');
        }

        $employee = $this->employeeRepository->create($data);

        return $employee;
    }

    public function update($id, $data)
    {
        $employee = $this->employeeRepository->find($id);

        return $this->employeeRepository->update($employee, $data);
    }

    public function delete($id)
    {
        $employee = $this->employeeRepository->find($id);

        $this->employeeRepository->delete($employee);

        return true;
    }
}
