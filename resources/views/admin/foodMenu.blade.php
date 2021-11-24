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
	            <h3 class="card-title"> FOOD MENU </h3>
	            <p class="card-description"> Add Food Attributes </p>
	            <form class="forms-sample" action="/foodmenudata" method="post" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group">
	                <label for="exampleInputName1">Title</label>
	                <input type="text" class="form-control" name="title" placeholder="Enter the title of the food" required="required">
	              </div>
	              <div class="form-group">
	                <label for="exampleInputName1">Price</label>
	                <input type="num" class="form-control" name="price" placeholder="Enter the price of the food" required="required">
	              </div>
	              <div class="form-group">
                    <label>File upload</label>
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <input type="file" name="image" class="file-upload-browse btn btn-primary" required="required">
                      </span>
                    </div>
                  </div>    
	              <div class="form-group">
	                <label for="exampleTextarea1">Description</label>
	                <textarea class="form-control" name="description" placeholder="Enter a description of food" rows="4" required="required"></textarea>
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