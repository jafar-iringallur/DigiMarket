
<style>
  .dropdown-menu .dropdown-item {
    font-size: 12px;
    padding: 8px 12px;
    transition: 0.3s;
}
.dropdown-menu .dropdown-item i {
    font-size: 12px;
}
  </style>
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
                  <div class="row mb-2">
                    <div class="col-md-6">
                      <span class="card-title"> 
                        <input type="text" class="form-control" id="inputPassword2" placeholder="Search" style="margin-top: 15px;max-width:50%;height: 2rem">
                       </span>
                    </div>
                    <div class="col-md-6">
                      <div class="filter" style="padding-right: 1rem">
                        <a class="btn btn-sm btn-primary" href="{{route('products.add')}}"><i class="bi-plus-circle"></i> Add Product</a>
                      </div>
                    </div>
                  </div>
               
                   
                   
                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $product)
                      <tr>
                        <th scope="row"><a href="#"><img src="{{$product['image']}}" alt=""></a></th>
                        <td><span class="text-primary fw-bold">{{$product['name']}}</span></td>
                        <td>{{$product['category']}}</td>
                        <td class="fw-bold">{{$product['price']}}</td>
                        <td>{{$product['stock']}}</td>
                        <td>
                          {{-- <a class="badge bg-success p-2" href="#"><i class="bi bi-pencil pl-1"></i></a>
                         </td> --}}
                          <div class="dropdown">
                            <span class="" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer">
                              <i class="bi bi-three-dots-vertical"></i>
                            </span>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                              <a class="dropdown-item" href="#"><i class="bi bi-eye pl-1"> </i> View</a>
                              <a class="dropdown-item" href="#"><i class="bi bi-pencil pl-1"> </i> Edit</a>
                              <a class="dropdown-item" href="#"><i class="bi bi-trash3 pl-1"> </i> Delete</a>
                              <a class="dropdown-item" href="#"><i class="bi bi-clipboard pl-1"> </i> Copy</a>
                          
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                     
                    
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          

          </div>
        </div><!-- End Left side columns -->

    

      </div>
    </section>


 