@include("template/header")

<div class="width-container" id="comestic-container-body">
    <div class="jumbotron" id="comestic-incspark-img">
          <h3>Spark Your Interest.!</h3>
          <h1>Find All Events In NYC here.</h1>
      </div>
    <div class="width-container" id="comestic-featuredEvents-vo">
        <div class="container">
        <h2>Featured Business Events</h2>
        <br/>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" id="comestic-finetune">
                        <div id="comestic-thumbnail-vo"></div>
                          <div class="caption" >
                              <h3><a href="#">Event Name</a></h3>
                            <p>Event Time</p>
                            <p>Event Location</p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="width-container" id="comestic-featuredEvents-ve">
        <div class="container">
        <h2>Popular Business Events</h2>
        <br/>
             <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail" id="comestic-finetune">
                        <div id="comestic-thumbnail-vo"></div>
                          <div class="caption" >
                              <h3><a href="#">Event Name</a></h3>
                            <p>Event Time</p>
                            <p>Event Location</p>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="comestic-button-center">
            <button type="button" class="btn btn-default">See More</button>
        </div>
    </div>
    <div class="width-container" id="comestic-featuredEvents">
        <div class="container">
        <h2>Filtered Categories</h2>
        <br/>
            <!-- md x4-->
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve"></div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve"></div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve"></div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-3">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve"></div>
                    </a>
                </div>
            </div>
        
            <!-- xs x2 -->
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve1"></div>
                    </a>
                </div>
                <div class="col-xs-6 col-md-6">
                    <a href="#" class="thumbnail">
                        <div id="comestic-thumbnail-ve1"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    
      
    </body>
 @include("template/footer")
</html>
