<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResearchController extends Controller
{
    
    public function  index(Request $request)
    {

        return view('pages.research.index');
    }

    public function  create()
    {

        return view('pages.research.create');
    }

    public function  store(Request $request)
    {
        
        
    }

    public function show($id)
    {

    }

    public function  edit($id)
    {

        
    }

    public function  update(Request $request, $id)
    {

       
    }

    public function destroy($id)
    {
       
    }


}
