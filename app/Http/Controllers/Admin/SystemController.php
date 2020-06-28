<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\System;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 

class SystemController extends Controller{

	public function index(){
        return view('admin.options.index',[
            'options' => DB::table('systems')->first(),
        ]);
   	}

	public function edit(int $id){
	  	return view('admin.options.edit',[
	   	    'options' =>System::find($id)->toArray(),
		]); 
	}

	public function update(int $id, Request $request, System $system){
		$system = System::find($id);

		$system->update($request->all());
	
	 	return redirect()->route('admin.options.index');
    }

    public function footerAll(){
        return view('layouts.app', ['footers' => System::all()]);                          
    }


}
