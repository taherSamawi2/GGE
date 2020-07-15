<?php

namespace App\Http\Controllers;

use App\Legislation;
use Illuminate\Http\Request;

class LegislationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All Legislations */
    public function index()
    {
        $legislation = Legislation::orderBy('id','asc')->first();
        return view('admin.legislations.index',['legislation' => $legislation]);
    }

    //show a single Legislation
    public function show(Legislation $legislation)
    {
        return view('admin.legislations.edit',['legislation' => $legislation]);
    }

    //show a create Legislation
    public function create(Legislation $legislation)
    {
        return view('admin.legislations.create',['legislation' => $legislation]);
    }

    public function Save($request ,$legislation)
    {
        $legislation->setTranslation('title', 'en', $request->en_title);
        $legislation->setTranslation('title', 'ar', $request->ar_title);
        $legislation->setTranslation('description', 'en', $request->en_description);
        $legislation->setTranslation('description', 'ar', $request->ar_description);
        $legislation->save();
        return $legislation;
    }

    // save the new Legislation
    public function store(Request $request)
    {
        $legislation  = $this->Save($request,new Legislation());
        return redirect(route('legislations.index'));
    }


    // show a view to edit Legislation
    public function edit(Legislation $legislation){
        return view('admin.legislations.edit',['legislation' => $legislation]);
    }

    // persist the edited Legislation
    public function update(Request $request,Legislation $legislation )
    {
        $legislation  = $this->Save($request,$legislation);
        return redirect(route('legislations.index'));
    }

    // Delete Legislation
    public function delete(Legislation $legislation){
        $legislation->delete();
        return redirect(route('legislations.index'));

    }
}
