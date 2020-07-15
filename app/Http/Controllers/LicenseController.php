<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;

class LicenseController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* show All Licenses */
    public function index()
    {
        $license = License::orderBy('id','asc')->first();
//        return print_r($license);
        return view('admin.licenses.index',['license' => $license]);
    }

    //show a single License
    public function show(License $license)
    {
        return view('admin.licenses.edit',['license' => $license]);
    }

    //show a create License
    public function create(License $license)
    {
        return view('admin.licenses.create',['license' => $license]);
    }

    public function Save($request ,$license)
    {
        $license->setTranslation('title', 'en', $request->en_title);
        $license->setTranslation('title', 'ar', $request->ar_title);
        $license->setTranslation('description', 'en', $request->en_description);
        $license->setTranslation('description', 'ar', $request->ar_description);
//        $license->title = $request->title;
//        $license->description = $request->description;
        $license->save();
        return $license;
    }

    // save the new License
    public function store(Request $request)
    {
        $license  = $this->Save($request,new License());
        return redirect(route('licenses.index'));
    }


    // show a view to edit License
    public function edit(License $license){
        return view('admin.licenses.edit',['license' => $license]);
    }

    // persist the edited License
    public function update(Request $request,License $license )
    {
        $license  = $this->Save($request,$license);
        return redirect(route('licenses.index'));
    }

    // Delete License
    public function delete(License $license){
        $license->delete();
        return redirect(route('licenses.index'));

    }

}
