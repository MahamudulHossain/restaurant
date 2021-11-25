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

      <div class="card-body">
                    <h3 class="card-title">Food Menu List</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Image</th>
                            <th> Title </th>
                            <th> Price </th>
                            <th> Description </th>
                            <th colspan="2"> <center>Action</center> </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)	
                          <tr>
                            <td class="py-1">
                              <a href="/foodImage/{{$data->image}}" target="_blank">
                                <img src="/foodImage/{{$data->image}}" alt="image">
                              </a>
                            </td>
                            <td> {{$data -> title}} </td>
                            <td> {{$data -> price}}/- </td>
                            <td> {{$data -> description}} </td>
                            <td>
                              <a href=/updateFood/{{$data -> id}}><button class="btn btn-success">UPDATE</button></a>   
                         	  </td>
                            <td>
                              <a href=/deleteFood/{{$data -> id}}><button class="btn btn-danger">DELETE</button></a>   
                            </td>
                          </tr>
                        @endforeach  
                        </tbody>
                      </table>
                    </div>
                  </div>
    </div>
      @include('admin.adminScript')
  </body>
</html>