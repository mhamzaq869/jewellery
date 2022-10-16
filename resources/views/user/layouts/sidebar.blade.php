 <!-- Nav -->
 <nav class="mb-10 mb-md-0">
     <div class="list-group list-group-sm list-group-strong list-group-flush-x">
         <a class="list-group-item list-group-item-action dropend-toggle @if (request()->path() == 'user/orders') active @endif" href="{{route('user.orders.index')}}">
             Orders
         </a>
         <a class="list-group-item list-group-item-action dropend-toggle @if (request()->path() == 'user/wishlist') active @endif" href="{{route('wishlist.index')}}">
             Wishlist
         </a>
         <a class="list-group-item list-group-item-action dropend-toggle @if (request()->path() == 'user/profile') active @endif" href="{{route('profile.index')}}">
             Personal Info
         </a>
         <a class="list-group-item list-group-item-action dropend-toggle @if (request()->path() == 'user/address') active @endif" href="{{route('address.index')}}">
             Addresses
         </a>
         <a class="list-group-item list-group-item-action dropend-toggle @if (request()->path() == 'user/payment') active @endif" href="{{route('payment.index')}}">
             Payment Methods
         </a>
         <a class="list-group-item list-group-item-action py-0" href="#!">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn p-0">Logout</button>
            </form>
         </a>
     </div>
 </nav>
