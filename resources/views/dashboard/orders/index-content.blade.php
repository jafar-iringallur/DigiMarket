
     <div class="pagetitle">
        <h1>Orders</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Orders</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section dashboard">
        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
 
            <div class="card-body">
              <h5 class="card-title">Latest Orders </h5>
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTab" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100 active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#bordered-pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="accepted-tab" data-bs-toggle="tab" data-bs-target="#bordered-accepted" type="button" role="tab" aria-controls="accepted" aria-selected="false">Accepted</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#bordered-rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">Rejected</button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                    <button class="nav-link w-100" id="all-tab" data-bs-toggle="tab" data-bs-target="#bordered-all" type="button" role="tab" aria-controls="all" aria-selected="false">All</button>
                    </li>
                </ul>
                <div class="tab-content pt-2" id="borderedTabContent">
                    <div class="tab-pane fade show active" id="bordered-pending" role="tabpanel" aria-labelledby="pending-tab">
                        <table class="table table-borderless datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Items</th>
                                <th scope="col">Price</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                            
                            </tbody>
                          </table>
                      </div>
                    <div class="tab-pane fade" id="bordered-accepted" role="tabpanel" aria-labelledby="accepted-tab">
                        <table class="table table-borderless datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Items</th>
                                <th scope="col">Price</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                            
                            </tbody>
                          </table>
                    </div>
                    <div class="tab-pane fade" id="bordered-rejected" role="tabpanel" aria-labelledby="rejected-tab">
                        <table class="table table-borderless datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Items</th>
                                <th scope="col">Price</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                            
                            </tbody>
                          </table>
                    </div>
                    <div class="tab-pane fade" id="bordered-all" role="tabpanel" aria-labelledby="all-tab">
                        <table class="table table-borderless datatable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Items</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td><span class="badge bg-success">Accepted</span></td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td><span class="badge bg-danger">Rejected</span></td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td><span class="badge bg-success">Accepted</span></td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                              <tr>
                                  <th scope="row">2457</th>
                                <td>Brandon Jacob</td>
                                <td>2</td>
                                <td>$64</td>
                                <td><span class="badge bg-success">Accepted</span></td>
                                <td>  <a class="badge bg-primary" href="#"><i class="bi bi-eye pl-1"></i> View</a></td>
                              </tr>
                            
                            </tbody>
                          </table>
                    </div>
                </div><!-- End Bordered Tabs -->
            
 
            </div>
 
          </div>
        </div><!-- End Recent Sales -->
      </section>
  
  
   