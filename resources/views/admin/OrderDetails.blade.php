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
                    <th> S.No </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Address </th>
                    <th> Mobile No. </th>
                    <th> Order Details </th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i=1;
                    echo "<pre>";
                    print_r($itemData);
                  ?>
                 @foreach($details as $data) 
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->phone}}</td>
                    <td></td>
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