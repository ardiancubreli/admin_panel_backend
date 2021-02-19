<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    public function getModel()
    {
        return new Company();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Company $company, array $data)
    {
        return $company->update($data);
    }

    public function delete(Company $company) : bool
    {
        $company->delete();

        return true;
    }
}
