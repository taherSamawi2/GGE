<?php

namespace App\Http\Controllers;

use App\LegalRegulation;
use Illuminate\Http\Request;

class LegalRegulationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All LegalRegulations */
    public function index()
    {
        $legalRegulation = LegalRegulation::orderBy('id','asc')->first();
        return view('admin.legalRegulations.index',['legalRegulation' => $legalRegulation]);
    }

    //show a single LegalRegulation
    public function show(LegalRegulation $legalRegulation)
    {
        return view('admin.legalRegulations.edit',['legalRegulation' => $legalRegulation]);
    }

    //show a create LegalRegulation
    public function create(LegalRegulation $legalRegulation)
    {
        return view('admin.legalRegulations.create',['legalRegulation' => $legalRegulation]);
    }

    public function Save($request ,$legalRegulation)
    {
        $legalRegulation->setTranslation('title', 'en', $request->en_title);
        $legalRegulation->setTranslation('title', 'ar', $request->ar_title);
        $legalRegulation->setTranslation('description', 'en', $request->en_description);
        $legalRegulation->setTranslation('description', 'ar', $request->ar_description);
        $legalRegulation->save();
        return $legalRegulation;
    }

    // save the new LegalRegulation
    public function store(Request $request)
    {
        $legalRegulation  = $this->Save($request,new LegalRegulation());
        return redirect(route('legalRegulations.index'));
    }


    // show a view to edit LegalRegulation
    public function edit(LegalRegulation $legalRegulation){
        return view('admin.legalRegulations.edit',['legalRegulation' => $legalRegulation]);
    }

    // persist the edited LegalRegulation
    public function update(Request $request,LegalRegulation $legalRegulation )
    {
        $legalRegulation  = $this->Save($request,$legalRegulation);
        return redirect(route('legalRegulations.index'));
    }

    // Delete LegalRegulation
    public function delete(LegalRegulation $legalRegulation){
        $legalRegulation->delete();
        return redirect(route('legalRegulations.index'));

    }
}
