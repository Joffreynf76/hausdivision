<?php


class CompanyController extends Framework
{
    public function addCompany(){
        include './Application/Model/Company.php';

        $company = new Company();
        $company->addCompany();

        $this->render("addCompany");
    }

    public function viewCompany(){
        include './Application/Model/Company.php';

        $company = new Company();
        $company->viewCompany();

        $this->render('viewCompany');
    }

    public function detailCompany(){
        include './Application/Model/Company.php';

        $company = new Company();
        $company->detailCompany();



        $this->render("detailCompany");
    }
}