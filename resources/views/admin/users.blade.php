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
                    <h3 class="card-title">Registerd Users</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Serial No.</th>
                            <th> User Name </th>
                            <th> Email </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)	
                          <tr>
                            <td> {{$data -> id}} </td>
                            <td> {{$data -> name}} </td>
                            <td> {{$data -> email}} </td>
                            <td>
                             @if($data -> usertype == '1')	
                              <button class="btn btn-danger disabled">DELETE</button>
                             @else
                              <a href=/deleteUser/{{$data -> id}}><button class="btn btn-danger">DELETE</button></a>
                             @endif 
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