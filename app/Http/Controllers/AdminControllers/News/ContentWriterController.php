<?php

namespace App\Http\Controllers\AdminControllers\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News\ContentWriterModel;
use App\Models\News\teamcategoryModel;
use App\Models\News\NewsModel;

class ContentWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ContentWriterModel::orderBy('id','asc')->get();
        $cat =  teamcategoryModel::all();
        return view('admin.content-writer.index', compact('data','cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $ordering = ContentWriterModel::max('ordering');
          $_ordering = 0;
          if( $ordering ){
            $ordering = $ordering + 1;
        }
         $cat =  teamcategoryModel::all();
        return view('admin.content-writer.create',compact('cat','ordering'));
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
            'name'=>'required',                      
        ]);
        
        $data = $request->all();        
         $thumbnail =  $request->file('thumbnail');
          $name = '';
         // Upload Image
       if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $name = time().rand(5000,999999). '.' . $thumbnail->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/original/');
        $thumbnail->move($destinationPath, $name);
        $data['thumbnail'] = $name;

         }

        $data['thumbnail'] = $name;
        $data['uri'] =  time().rand(5000,99999);
        $result = ContentWriterModel::create($data);
        $last_id = $result->id;
        if($result){
            return redirect('admin/contentwriter/'.$last_id.'/edit')->with('message','Added successful.');
        }else{
            return "Error";
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
        $data = NewsModel::where('content_writer',$id)->get();
         return view('admin.content-writer.newslist-index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cat =  teamcategoryModel::all();
        $data = ContentWriterModel::where('id',$id)->first();
         return view('admin.content-writer.edit', compact('data','cat'));
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
            'name'=>'required',                       
            
        ]);
       

        $data = ContentWriterModel::find($id);
         $thumbnail = $request->file('thumbnail');
         $name = '';
           // Update Icon
       if ($request->hasFile('thumbnail')) {
           $data = ContentWriterModel::find($id);
        if($data->thumbnail){
          if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }
        }
        $thumbnail = $request->file('thumbnail');
        $name = time().rand(5000,999999). '.' . $thumbnail->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/original/');
        $thumbnail->move($destinationPath, $name);
        $data['thumbnail'] = $name;
         }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;        
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;       
        $data->description = $request->description;
         $data->ordering = $request->ordering;
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
        $data = ContentWriterModel::find($id);
         if($data->thumbnail != NULL){
         if(file_exists(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail)){
            unlink(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail);
          }     
      }
        $data->delete();
        return 'Are you sure to delete?';
    }
    
}
