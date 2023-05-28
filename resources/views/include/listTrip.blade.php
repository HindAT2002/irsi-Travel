 <!-- ======= Portfolio Section ======= -->
 <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Choise  your derection now</h2>
            </div>
          </div>
        </div>
        <div class="row wesome-project-1 fix">
          <!-- Start Portfolio -page -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Morrocco</li>
              <li data-filter=".filter-card">The most populare</li>
              <li data-filter=".filter-web">just for you</li>
            </ul>
          </div>
        </div>
        <div class="row awesome-project-content portfolio-container">
        @foreach($trips as $trip)
          <!-- portfolio-item start -->
          <div class="col-md-4 col-sm-4 col-xs-12 portfolio-item filter-app">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="{{asset('/show'.$trip->id)}}"><img src="{{ asset('storage/img/blog/'. $trip->image1) }}" height="100px" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a  href="{{asset('show/'.$trip->id)}}">
                      <h4>{{ $trip->localisation }}</h4>
                      <h5>{{ $trip->prix }}</h5>
                      <span>{{ $trip->description }}</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- portfolio-item end -->
          @endforeach
        </div>
      </div>
    </div><!-- End Portfolio Section -->
