{{-- @if (request()->path() != '/' && request()->path() != 'shop') --}}
<nav class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Breadcrumb -->
                <ol class="breadcrumb mb-0 fs-xs text-gray-400">
                    <li class="breadcrumb-item">
                        <a class="text-gray-400" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{$page}}
                    </li>
                </ol>

            </div>
        </div>
    </div>
</nav>
{{-- @endif --}}
