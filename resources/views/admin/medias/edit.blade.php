@extends('admin.master')
@section('title','Media')
@section('breadcrumb')
<a href="{{ route('media.create') }}" class="btn btn-primary">Create</a>
<a href="{{ route('media.index') }}" class="btn btn-primary">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ route('media.update',$data->id) }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}     
 	<input type="hidden" name="_method" value="PUT" />         
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add </span>
    </div>
    <div class="panel-body"> 

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Name </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="name" name="name" class="form-control" value="{{ $data->name }}" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Thumbnail </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="file" id="thumbnail" name="thumbnail" class="form-control" />
          </div>
        </div>
      </div> 

    </div>
  </div> 

 <div class="form-group">  
  <div class="col-lg-8">
    <div class="bs-component">
     <input type="submit" class="btn btn-primary btn" value="Submit" />
   </div>
 </div>
</div> 

</div>
 <div class="col-md-4">
 	@if($data->thumbnail)
 	<span class="id{{$data->id}}">             
 	<img src="{{ asset( env('PUBLIC_PATH') . '/uploads/original/' . $data->thumbnail) }}" width="50%" /> <br /><br />
 	<a href="#{{$data->id}}" class="imagedelete"> Remove </a>
    <button id="copyBtn" class="btn btn-success btn" data-text="{{ asset( env('PUBLIC_PATH') . '/uploads/medium/' . $data->thumbnail) }}">Copy</button>
 	@endif
 </span>
 	
 </div>
</form>
@endsection

@section('scripts')
  <script type="text/javascript">
   // Delete Thumb
    $('.imagedelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('delete_thumbnail') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });
  </script>
  <!-- add the text you want to copy inside the data-text attribute -->


<script>
    const copyBtn = document.querySelector('#copyBtn');
    copyBtn.addEventListener('click', e => {
        const input = document.createElement('input');
        input.value = copyBtn.dataset.text;
        document.body.appendChild(input);
        input.select();
        if(document.execCommand('copy')) {
            alert('Text Copied');
            document.body.removeChild(input);
        }
    });
</script>
  @endsection