@extends('admin.master')
@section('breadcrumb')
<a href="{{ route('teamcategory.index') }}" class="btn btn-primary"> Create</a>
@endsection
@section('content')
<div class="alert" id="message" style="display: none"></div>
<form class="form-horizontal" role="form" action="{{ route('teamcategory.update',$data1->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }} 
	    <input type="hidden" name="_method" value="PUT" /> 
	  <div class="col-md-6">
		<!-- Input Fields -->
		<div class="panel">
        <table class="table admin-form table-striped  dataTable">
          <thead>
            <tr class="panel-heading">
              <th class="text-center"> SN </th>
              <th>Designation</th> 
              <th class="text-center">Action</th>             
            </tr>
          </thead>
          <tbody>
           @if($data->count() > 0)
            @foreach($data as $row)
            <tr class="id{{$row->id}}">
              <td class="text-center">
                {{$loop->iteration}}
              </td>
              <td class="post_title title_hi_sh">                
                 <strong> {{ ucfirst($row->title) }} </strong>                 
                </td>
                <td class="text-center"><a href="{{ url('admin/teamcategory/'.$row->id.'/edit') }}">Edit</a> 
                	@if(!is_empty_team($row->id))
					| <a href="{{ route('teamcategory.destroy',$row->id.'/delete') }}" onclick="return confirm('Confirm Delete?')">Delete</a>
				@endif
				</td>           
              </tr>
              @endforeach
             
              @endif 
          </tbody>
        </table>
      </div>
  </div>

	<div class="col-md-6">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Team Category</span>
			</div>
			<div class="panel-body">  
				
				<div class="form-group">
					<label for="inputStandard" class="col-lg-2 control-label"> Title </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="text" name="title" id="title" class="form-control" value="{{$data1->title}}" /> 	
						</div>
					</div>
				</div>  

				<div class="form-group">
					<label for="inputStandard" class="col-lg-2 control-label">  </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="submit" name="submit" value="Submit">      
						</div>
					</div>
				</div>  
			</div>
			</div> 		
	</div>
</form>

		
@endsection

@section('libraries')

@endsection
