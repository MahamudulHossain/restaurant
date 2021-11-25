<x-app-layout>
    
</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.adminCss')
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.adminNav')
		<div class="col-md-9">
		      <div class="card-body">
	            <h3 class="card-title"> CHEFS </h3>
	            <p class="card-description"> Add Chefs </p>
	            <form class="forms-sample" action="/addChefsData" method="post" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group">
	                <label for="exampleInputName1">Name</label>
	                <input type="text" class="form-control" name="name" placeholder="Enter the name of Chefs" required="required">
	              </div>
	              <div class="form-group">
	                <label for="exampleInputName1">Speciality</label>
	                <input type="text" class="form-control" name="speciality" placeholder="Enter the speciality of the chefs" required="required">
	              </div>
	              <div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <input type="file" name="image" class="file-upload-browse btn btn-primary" required="required">
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