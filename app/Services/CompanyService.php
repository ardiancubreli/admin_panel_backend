<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    protected $storageFileService;

    public function __construct(CompanyRepository $companyRepository, StorageFileService $storageFileService)
    {
        $this->companyRepository    = $companyRepository;
        $this->storageFileService   = $storageFileService;
    }

    public function all()
    {
        return $this->companyRepository->get();
    }

    public function paginate()
    {
        return $this->companyRepository->paginate();
    }

    public function find($id)
    {
        return $this->companyRepository->find($id);
    }

    public function create($data)
    {
        if (isset($data['logo'])) {
            $logo = $this->storageFileService->putFileInStorage($data['logo'], 'public');

            $data['logo'] = basename($logo);
        }

        $company = $this->companyRepository->create($data);

        return $company;
    }

    public function update($id, $data)
    {
        $company = $this->companyRepository->find($id);

        if (isset($data['logo'])) {
            $old_logo = $company->logo;
            $logo = $this->storageFileService->putFileInStorage($data['logo'], 'public');

            $data['logo'] = basename($logo);
        }

        $updated = $this->companyRepository->update($company, $data);

        if($updated && isset($data['logo'])) {
            $this->storageFileService->deleteFileFromStorage('public/' . $old_logo);
        }
    }

    public function delete($id)
    {
        $company = $this->companyRepository->find($id);
        $logo = $company->logo;

        $deleted = $this->companyRepository->delete($company);

        if ($deleted && $logo) {
            $this->storageFileService->deleteFileFromStorage('public/' . $logo);
        }

        return true;
    }
}
