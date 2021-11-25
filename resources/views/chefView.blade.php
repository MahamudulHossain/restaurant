<section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               @foreach($data as $data) 
                    <div class="col-lg-4">
                        <div class="chef-item">
                            <div class="thumb">
                                <img src="/chefsImage/{{$data->image}}" alt="Chefs Image">
                            </div>
                            <div class="down-content">
                                <h4>{{$data -> name}}</h4>
                                <span>{{$data -> speciality}}</span>
                            </div>
                        </div>
                    </div>
               @endforeach 
            </div>
        </div>
    </section>