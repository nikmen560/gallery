    <div  class="tm-hero d-flex flex-row justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form " autocomplete="off"  method="" action="">
            <input id="inputSearch" name="search" class="form-control tm-search-input" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn"  type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>


    </div>

    <button type="button"  data-toggle="modal" data-target="#searchModal" class="btn btn-default navbar-btn">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    </button>

    <!-- Modal -->
    <div class="modal custom fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel">
        <div class="modal-dialog" role="document" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body ">
                    <h1 class="text-center mb-2">Search</h1>
                    <form class="navbar-form " id="searchForm" autocomplete="off" action="" method="">
                        <div class="form-group">
                            <input type="text" id="searchModalInput" name="search" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" id="searchSubmit" class="btn d-none">Submit</button>
                    </form>
                </div>
                <!-- HERE GOES SEARCH RESULTS -->
            </div>
        </div>
    </div>