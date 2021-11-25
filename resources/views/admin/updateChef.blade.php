<x-app-layout>
    
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- It is used to import all css properly -->
  	<base href="/public">

    @include('admin.adminCss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.adminNav')
		<div class="col-md-9">
		      <div class="card-body">
	            <h3 class="card-title"> Chefs </h3>
	            <p class="card-description"> Update Chefs </p>
	            <form class="forms-sample" action="/updateChefsdata/{{$data -> id}}" method="post" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group">
	                <label for="exampleInputName1">Name</label>
	                <input type="text" class="form-control" name="name" value="{{$data -> name}}" required="required">
	              </div>
	              <div class="form-group">
	                <label for="exampleInputName1">Speciality</label>
	                <input type="text" class="form-control" name="speciality" value="{{$data -> speciality}}" required="required">
	              </div>
	              <div class="form-group">
                    <label>Old Image</label>
                    <div class="input-group col-xs-12">
                      <img src="/chefsImage/{{$data -> image}}" width="100px" height="100px">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>New Image upload</label>
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <input type="file" name="image" class="file-upload-browse btn btn-primary">
                      </span>
                    </div>
                  </div>
	              <button type="submit" class="btn btn-primary mr-2">Submit</button>
	              <button class="btn btn-dark">Cancel</button>
	            </form>
	          </div>
		    </div>
		</div>    
      @include('admin.adminScript')
  </body>
</html>