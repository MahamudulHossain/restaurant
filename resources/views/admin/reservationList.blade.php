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
                    <h3 class="card-title">Reservation Data</h3>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> Serial No.</th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Guest </th>
                            <th> Date </th>
                            <th> Time </th>
                            <th> Message </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)	
                          <tr>
                            <td> {{$data -> id}} </td>
                            <td> {{$data -> name}} </td>
                            <td> {{$data -> email}} </td>
                            <td> {{$data -> phone}} </td>
                            <td> {{$data -> guest}} </td>
                            <td> {{$data -> date}} </td>
                            <td> {{$data -> time}} </td>
                            <td> {{$data -> message}} </td>
                            <td>
                                <button class="btn btn-primary">Test</button>
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