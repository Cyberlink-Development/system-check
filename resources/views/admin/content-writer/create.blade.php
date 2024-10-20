@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
<a href="{{ route('contentwriter.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')
<section id="content"  >
<form class="form-horizontal" role="form" action="{{ route('contentwriter.store') }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}            
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
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" />            
          </div>
        </div>
      </div>       

      

      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Phone </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" />
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Facebook </label>
        <div class="col-lg-8">
          <div class="bs-component">
             <input type="text" id="" name="facebook" class="form-control" placeholder="https://www.facebook.com"   />
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Twitter </label>
        <div class="col-lg-8">
          <div class="bs-component">
             <input type="text" id="" name="twitter" class="form-control" placeholder="https://www.twitter.com" />
         
          </div>
        </div>
      </div>  
      <div class="form-group">
        <label for="inputStandard" class="col-lg-2 control-label"> Instagram </label>
        <div class="col-lg-8">
          <div class="bs-component">
          <input type="text" id="" name="instagram" class="form-control" placeholder="https://www.instagram.com"  />
          </div>
        </div>
      </div>       

       <div class="form-group">
    <label class="col-lg-2 control-label" for="textArea3"> Description </label>
    <div class="col-lg-9">
      <div class="bs-component">
        <textarea class="form-control" id="" name="description" rows="3"></textarea>
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
              <input type="number" id="" name="ordering" class="form-control" placeholder="Team Order" value="{{ $ordering }}" />   
            </label>
          </div>

         <div class="sid_bvijay mb10">
         <h4>Designation</h4>
         <div class="hd_show_con">
          <div class="form-group">
            <select name="email" class="form-control input-sm">
               <option value="0" disabled selected> Select </option>
                @foreach($cat as $row)
            <option value="{{$row->id}}">{{$row->title}}</option>
            @endforeach                

            </select>  
        </div>
        </div>
        </div>

          <div class="sid_bvijay mb10">
            <h4> Thumbnail </h4>
            <div class="hd_show_con">
              <div id="xedit-demo">
               <input type="file" name="thumbnail" />
             </div>
           </div>
         </div>
              

     </div>
   </div>
</form>
</section>
@endsection