 <!-- Wait List -->
 <div class="modal fade" id="modalWaitList" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">

             <!-- Close -->
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                 <i class="fe fe-x" aria-hidden="true"></i>
             </button>

             <!-- Header-->
             <div class="modal-header lh-fixed fs-lg">
                 <strong class="mx-auto">Wait List</strong>
             </div>

             <!-- Body -->
             <div class="modal-body">
                 <div class="row mb-6">
                     <div class="col-12 col-md-3">

                         <!-- Image -->
                         <a href="product.html">
                             <img class="img-fluid mb-7 mb-md-0" src="{{ asset($product->photo) }}" alt="...">
                         </a>

                     </div>
                     <div class="col-12 col-md-9">

                         <!-- Label -->
                         <p>
                             <a class="fw-bold text-body" href="product.html">{{ $product->title }}</a>
                         <p class="fs-sm text-center text-gray-500">
                             {!! Str::substr($product->short_description, 0, 150) !!}
                         </p>
                         </p>

                         <!-- Radio -->


                     </div>

                 </div>

                 <form action="{{ route('waitlist') }}" method="post" id="waitlistForm">
                     @csrf
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                     <div class="row gx-5 mb-2">
                         <div class="col-12 col-md-6">

                             <!-- Form group -->
                             <div class="form-group">
                                 <label class="visually-hidden" for="listName">Your Name</label>
                                 <input class="form-control" id="listName" name="name" type="text" placeholder="Your Name *"
                                     required>
                             </div>

                         </div>
                         <div class="col-12 col-md-6">

                             <!-- Form group -->
                             <div class="form-group">
                                 <label class="visually-hidden" for="listEmail">Your Name</label>
                                 <input class="form-control" id="listEmail" name="email" type="email" placeholder="Your Email *"
                                     required>
                             </div>

                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12 text-center">

                             <!-- Button -->
                             <button class="btn btn-dark" type="submit">Subscribe</button>

                         </div>
                     </div>
                 </form>
             </div>

         </div>

     </div>
 </div>
