@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
<a href="{{ route('contentwriter.index') }}" class="btn btn-primary">List</a>
<a href="{{ route('contentwriter.create') }}" class="btn btn-primary">Create</a>@endsection
@section('content')
<section id="content"  >
<form class="form-horizontal" role="form" action="{{ route('contentwriter.update',$data->id) }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}     
 <input type="hidden" name="_method" value="PUT" />            
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add </span>
    </div>
    <div class="panel-body"> 

      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Name </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}"/> 
                      
          </div>
        </div>
      </div>  
     
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Phone </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="phone" name="phone" class="form-control"  value="{{ $data->phone }}"/>
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Facebook </label>
        <div class="col-lg-8">
          <div class="bs-component">
             <input type="text" id="" name="facebook" class="form-control" placeholder="https://www.facebook.com"   value="{{ $data->facebook }}"/>
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Twitter </label>
        <div class="col-lg-8">
          <div class="bs-component">
             <input type="text" id="" name="twitter" class="form-control" placeholder="https://www.twitter.com" value="{{ $data->twitter }}"/>
         
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Instagram </label>
        <div class="col-lg-8">
          <div class="bs-component">
          <input type="text" id="" name="instagram" class="form-control" placeholder="https://www.instagram.com"  value="{{ $data->instagram }}"/>
          </div>
        </div>
      </div>       

       <div class="form-group">
    <label class="col-lg-2 control-label" for="textArea3"> Description </label>
    <div class="col-lg-9">
      <div class="bs-component">
        <textarea class="form-control" id="" name="description" rows="3">{{ $data->description }}</textarea>
      </div>
    </div> 
  </div>
    </div>
  </div> 
  
</div>
 <div class="col-md-3">
        <div class="admin-form">
          <div class="sid_bvijay mb10">                  
           
            <footer>                        
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </footer>
            <div class="clearfix"></div>
          </div>     
           <div class="sid_bvijay mb10">
          <label class="field text">
            <input type="number" id="inputStandard" name="ordering" class="form-control" placeholder="Team Order" value="{{$data->ordering}}" />   
          </label>
        </div>
          <div class="sid_bvijay mb10">
           <h4> Designation</h4>
           <div class="hd_show_con">
           <div class="form-group">
            <select name="email" class="form-control input-sm">
               <option value="0" disabled selected> Select </option>
                 @if($cat)
                @foreach($cat as $row)
                <option value="{{$row->id}}" {{ ($row->id == $data->email )?'selected':'' }}> {{$row->title}}</option>
                @endforeach  
                @endif   

            </select>  
           
          </div>
          </div>
          </div>
         

          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
                @if($data->thumbnail)
                <span class="thumbnailid{{$data->id}}">
               
                <img src="{{ asset(env('PUBLIC_PATH').'uploads/original/' . $data->thumbnail) }}" width="150" />
                <hr>
                </span>
                @endif
               <input type="file" name="thumbnail" />
             </div>
           </div>
         </div>
              

     </div>
   </div>
</form>
</section>
@endsection
