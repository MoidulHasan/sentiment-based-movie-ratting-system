<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

                   
?>
          <div class="row show-grid">
            <!-- Customer ROW -->
            <div class="col-md-4">
              <!-- User record -->
              <div class="col-md-12 mb-3">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-0">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                        <div class="h6 mb-0 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM user";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?>
                        </div>
                      </div>
                        <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
            <!-- Employee ROW -->
          <div class="col-md-4">
            <!-- Movie record -->
            <div class="col-md-12 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Movie</div>
                      <div class="h6 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $query = "SELECT COUNT(*) FROM movie_details";
                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                        while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- PRODUCTS ROW -->
          <div class="col-md-4">
            <!-- Review record -->
            <div class="col-md-12 mb-3">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">

                    <div class="col mr-0">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Review</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php 
                          $query = "SELECT COUNT(*) FROM review";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                              echo "$row[0]";
                            }
                          ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>

<?php
include'../includes/footer.php';
?>