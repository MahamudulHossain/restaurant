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
	            <h3 class="card-title"> FOOD MENU </h3>
	            <p class="card-description"> Update Food Attributes </p>
	            <form class="forms-sample" action="/updatefoodmenudata/{{$data -> id}}" method="post" enctype="multipart/form-data">
	            	@csrf
	              <div class="form-group">
	                <label for="exampleInputName1">Title</label>
	                <input type="text" class="form-control" name="title" value="{{$data -> title}}" required="required">
	              </div>
	              <div class="form-group">
	                <label for="exampleInputName1">Price</label>
	                <input type="num" class="form-control" name="price" value="{{$data -> price}}" required="required">
	              </div>
	              <div class="form-group">
	                <label for="exampleTextarea1">Description</label>
	                <textarea class="form-control" name="description" rows="4" required="required">{{$data -> description}}</textarea>
	              </div>
	              <div class="form-group">
                    <label>Old Image</label>
                    <div class="input-group col-xs-12">
                      <img src="/foodImage/{{$data -> image}}" width="100px" height="100px">
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