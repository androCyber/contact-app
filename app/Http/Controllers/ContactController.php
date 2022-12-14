<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    //protected $company;
    public function __construct(protected CompanyRepository $company, Request $request)

    {  
        //$this->company= $company;
        //$this->company= new CompanyRepository();
    }
    

                            //Eğitim amaçlı yapılmıştır. Injection işlemi constructor ile yapıldığından gerek yoktur. 
    public function index(CompanyRepository $company)
    {
       /*  $companies = [
            1 => ['name' => 'Company One', 'contacts' => 3],
            2 => ['name' => 'Company Two', 'contacts' => 5],
        ]; */
    
        $companies=$this->company->pluck();
        $contacts=$this->getContacts();
    
        return view('contacts.index',compact('contacts','companies'));
    }

    protected function getContacts(){

        return [
            1=>['name'=>'Name-1', 'phone'=>"555-555-5555"],
            2=>['name'=>'Name-2', 'phone'=>"666-666-6666"],
            3=>['name'=>'Name-3', 'phone'=>"777-777-7777"],
            4=>['name'=>'Name-4', 'phone'=>"888-888-8888"]
        ];
    
    }

    public function create()
    {
        return view('contacts.create');
    }


    public function show($id)
    {
        $contacts=$this->getContacts();

        abort_if(!isset($contacts[$id]),404);
        //abort_unless(!isset($contacts[$id]),404);

    $contact=$contacts[$id];

    return view('contacts.show')->with('contact',$contact);
    }

}
