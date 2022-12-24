

    <div class="pagetitle">
      <h1>Products</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Products</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Top Selling -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">
              
               

                <div class="card-body pb-0">
                  {{-- <h5 class="card-title">Top Selling <span>| Today</span></h5> --}}
                  <div class="row">
                    <div class="col-md-6">
                      <span class="card-title"> 
                        <input type="text" class="form-control" id="inputPassword2" placeholder="Search" style="margin-top: 15px;max-width:50%">
                       </span>
                    </div>
                    <div class="col-md-6">
                      <div class="filter" style="padding-right: 1rem">
                        <a class="btn btn-sm btn-primary" href="#"><i class="bi-plus-circle"></i> Add Product</a>
                      </div>
                    </div>
                  </div>
               
                   
                   
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">In Stock</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="{{asset('dashboard/img/product-1.jpg')}}" alt=""></a></th>
                        <td><span class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</span></td>
                        <td>Mobiles</td>
                        <td class="fw-bold">124</td>
                        <td>Yes</td>
                        <td>
                          <a class="badge bg-success p-2" href="#"><i class="bi bi-pencil pl-1"></i></a>
                          <a class="badge bg-danger p-2" href="#"><i class="bi bi-trash3 pl-1"></i></a>
                          <a class="badge bg-primary p-2" href="#"><i class="bi bi-eye pl-1"></i></a></td>
                      </tr>
                    
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          

          </div>
        </div><!-- End Left side columns -->

    

      </div>
    </section>


 