<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe Restaurant</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 

                            @auth

                            <li class="scroll-to-section"><a href="{{url('/showCart')}}">Cart[{{$cart}}]</a></li>
                            
                            @endauth

                            @if (Route::has('login'))
                                
                                @auth
                                    <x-app-layout>
    
                                    </x-app-layout>
                                @else
                                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    </li>
                                    @if (Route::has('register'))
                                       <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                    @endif
                                @endauth
                            
                        @endif
                        </ul> 
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-xs-12">
                    <div class="left-text-content">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Item No.</th>
                              <th scope="col">Name</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Unit Price</th>
                              <th scope="col">Total</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $i=1;
                                $subTotal = 0;
                            ?>
                            @foreach($itemData as $itemData)
                            <tr>
                              <th scope="row">{{$i++}}</th>
                              <td>{{$itemData->title}}</td>
                              <td>{{$itemData->quantity}}</td>
                              <td>{{$itemData->price}}</td>
                              <td>{{$itemData->quantity * $itemData->price}}</td>
                              <?php 
                                $subTotal += $itemData->quantity * $itemData->price;
                              ?>
                              <td>
                                <a href="{{url('/delCartItem',$itemData->Rid)}}"><button class="btn btn-danger">Remove</button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="right-content">
                        <table class="table table-success">
                            <tr>
                              <th scope="col">Sub Total</th>
                              <td>{{$subTotal}}/-</td>
                            </tr>  
                              <th scope="col">Delivery Charge</th>
                              <td>50-/</td>
                            </tr>
                            <tr>
                              <th scope="col">Grand Total</th>
                              <td>{{$subTotal + 50}}/-</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>    
            </div>
            <div style="margin-left: 650px;">
                <a href="{{url('/')}}"><button class="btn btn-primary">Shop More</button></a>
                <button class="btn btn-success" id="placeOrder">Place Order</button>
            </div>
            
            <div id="FrmDiv" class="col-lg-6 col-md-6 col-xs-12" style="display: none;">
                <div style="color:green;font-weight: bold; margin-bottom: 10px;">
                    <h3>Fill This Form For Order Confirmation</h3>
                </div>
                <form action="{{url('confirmOrder')}}" method="post">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mobile No.</label>
                    <input type="number" class="form-control" id="number" name="phone">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
     <!-- ***** Footer Start ***** -->
  

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
    <script type="text/javascript">
        $('#placeOrder').on('click',function(e){
            $('#FrmDiv').show();
        });
    </script>
  </body>
</html>
