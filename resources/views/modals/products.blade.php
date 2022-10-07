
  <!-- Product -->
  <div class="modal fade" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">

        <!-- Close -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="fe fe-x" aria-hidden="true"></i>
        </button>

        <!-- Content -->
        <div class="container-fluid px-xl-0">
          <div class="row align-items-center mx-xl-0">
            <div class="col-12 col-lg-6 col-xl-5 py-4 py-xl-0 px-xl-0">

              <!-- Image -->
              <img class="img-fluid modalImage" src="assets/img/products/product-7.jpg" alt="...">

              <!-- Button -->
              <a class="btn btn-sm w-100 btn-primary modalLink" href="product.html">
                More Product Info <i class="fe fe-info ms-2"></i>
              </a>

            </div>
            <div class="col-12 col-lg-6 col-xl-7 py-9 px-md-9">

              <!-- Heading -->
              <h4 class="mb-3 modalTitle">Leather Sneakers</h4>

              <!-- Price -->
              <div class="mb-7">
                <span class="h5 modalPrice">$85.00</span>
                <span class="fs-sm modalStoc">(In Stock)</span>
              </div>

              <!-- Form -->
              <form action="" method="POST">
                @csrf
                <input type="hidden" class="product_id" name="product_id">
                <div class="form-group">

                  <!-- Label -->
                  <p>
                    <strong>Detail:</strong>
                  </p>

                  <!-- Radio -->
                  <div class="mb-8 modalDetail">

                  </div>

                </div>
                <div class="form-group">

                  <!-- Label -->
                  <p>
                     <strong>Size:</strong>
                  </p>

                  <!-- Radio -->
                  <div class="mb-2 Modalsize" >
                    <div class="form-check form-check-inline form-check-size mb-2">
                      <input type="radio" class="form-check-input" name="modalProductSize" id="modalProductSizeOne"
                        value="6" data-toggle="form-caption" data-target="#modalProductSizeCaption">
                      <label class="form-check-label" for="modalProductSizeOne">6</label>
                    </div>
                </div>
                <div class="form-group mb-0">
                  <div class="row gx-5">
                    <div class="col-12 col-lg-auto">

                      <!-- Quantity -->
                      <select class="form-select mb-2" name="quantity">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>

                    </div>
                    <div class="col-12 col-lg">

                      <!-- Submit -->
                      <button type="submit" class="btn w-100 btn-dark mb-2">
                        Add to Cart <i class="fe fe-shopping-cart ms-2"></i>
                      </button>

                    </div>
                    <div class="col-12 col-lg-auto">

                      <!-- Wishlist -->
                      <button class="btn btn-outline-dark w-100 mb-2" data-toggle="button">
                        Wishlist <i class="fe fe-heart ms-2"></i>
                      </button>

                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
