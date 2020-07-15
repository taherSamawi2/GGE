<?php

namespace App\Http\Controllers;

use App\EstablishmentsRegistration;
use Illuminate\Http\Request;

class EstablishmentsRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All EstablishmentsRegistrations */
    public function index()
    {
        $establishmentsRegistration = EstablishmentsRegistration::orderBy('id','asc')->first();
        return view('admin.establishmentsRegistration.index',['establishmentsRegistration' => $establishmentsRegistration]);
    }

    //show a single EstablishmentsRegistration
    public function show(EstablishmentsRegistration $establishmentsRegistration)
    {
        return view('admin.establishmentsRegistration.edit',['establishmentsRegistration' => $establishmentsRegistration]);
    }

    //show a create EstablishmentsRegistration
    public function create(EstablishmentsRegistration $establishmentsRegistration)
    {
        return view('admin.establishmentsRegistration.create',['establishmentsRegistration' => $establishmentsRegistration]);
    }

    public function Save($request ,$establishmentsRegistration)
    {
        $establishmentsRegistration->setTranslation('title', 'en', $request->en_title);
        $establishmentsRegistration->setTranslation('title', 'ar', $request->ar_title);
        $establishmentsRegistration->setTranslation('description', 'en', $request->en_description);
        $establishmentsRegistration->setTranslation('description', 'ar', $request->ar_description);
        $establishmentsRegistration->save();
        return $establishmentsRegistration;
    }

    // save the new EstablishmentsRegistration
    public function store(Request $request)
    {
        $establishmentsRegistration  = $this->Save($request,new EstablishmentsRegistration());
        return redirect(route('establishmentsRegistration.index'));
    }


    // show a view to edit EstablishmentsRegistration
    public function edit(EstablishmentsRegistration $establishmentsRegistration){
        return view('admin.establishmentsRegistration.edit',['establishmentsRegistration' => $establishmentsRegistration]);
    }

    // persist the edited EstablishmentsRegistration
    public function update(Request $request,EstablishmentsRegistration $establishmentsRegistration )
    {
        $establishmentsRegistration  = $this->Save($request,$establishmentsRegistration);
        return redirect(route('establishmentsRegistration.index'));
    }

    // Delete EstablishmentsRegistration
    public function delete(EstablishmentsRegistration $establishmentsRegistration){
        $establishmentsRegistration->delete();
        return redirect(route('establishmentsRegistration.index'));

    }

}
