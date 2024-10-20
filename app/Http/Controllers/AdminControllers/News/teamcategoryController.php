<?php

namespace App\Http\Controllers\AdminControllers\News;

use App\Http\Controllers\Controller;
use App\Models\News\teamcategoryModel;
use Illuminate\Http\Request;

class teamcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = teamcategoryModel::all();
        return view('admin.team-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'title'=>'required|unique:cl_teamcategory',                    
        ]);
       $data = teamcategoryModel::create($request->all());
        if($data){
        return redirect()->back()->with('message','Add Successful.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data = teamcategoryModel::all();
        $data1 = teamcategoryModel::where('id',$id)->first();
        return view('admin.team-category.edit', compact('data','data1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|unique:cl_teamcategory',                       
            
        ]);
       

        $data = teamcategoryModel::find($id);     
        $data->title = $request->title;
   
        if($data->save()){
            return redirect()->back()->with('message','Update successful.');
        }else{
            return "Error";
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = teamcategoryModel::find($id);         
        $data->delete();
       return redirect()->back()->with('message','Delete Successful.');
    }
}
