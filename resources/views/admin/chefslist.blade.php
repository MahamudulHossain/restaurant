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
                    <h3 class="card-title">Chefs List</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Image</th>
                            <th> Name </th>
                            <th> Speciality </th>
                            <th> <center>Action</center> </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)	
                          <tr>
                            <td class="py-1">
                              <a href="/chefsImage/{{$data->image}}" target="_blank">
                                <img src="/chefsImage/{{$data->image}}" alt="image">
                              </a>
                            </td>
                            <td> {{$data -> name}} </td>
                            <td> {{$data -> speciality}} </td>
                            <td>
                              <a href=/updateChef/{{$data -> id}}><button class="btn btn-success">UPDATE</button></a> &nbsp;&nbsp;  
                              <a href=/deleteChef/{{$data -> id}}><button class="btn btn-danger">DELETE</button></a> 
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