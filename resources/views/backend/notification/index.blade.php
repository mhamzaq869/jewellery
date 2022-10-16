@extends('backend.layouts.app')

@section('title', 'Notifications')
@section('home_url', route('notification.index'))
@section('page', ' ')

@push('style')
    {{-- <style>
        .avatar .avatar-content {
            width: 52px;
            height: 52px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            font-size: 0.857rem;
        }
    </style> --}}
@endpush
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content mt-2">
                    <div class="tab-pane active" id="home" aria-labelledby="home-tab" role="tabpanel">
                        @foreach ($notifications as $noti)
                            <div class="d-flex">
                                <div class="avatar"
                                    style="display: flex; background-color:transparent !important; justify-content: center; align-items: center;">
                                    <a class="d-flex" href="#">
                                        <div class="list-item d-flex align-items-start">
                                            <div class="me-1">
                                                <div class="avatar bg-light-{{ $noti->btn_class }}">
                                                    <div class="avatar-content"><i class="avatar-icon"
                                                            data-feather="{{ $noti->noti_icon }}"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <div class="transaction-percentage mx-2">
                                    <h5 class="message-title mb-0 mt-1">
                                        {{ $noti->noti_title != null ? $noti->noti_title : '' }} </h5>
                                    <span class="font-12 d-block text-muted"> {!! $noti->noti_desc != null ? $noti->noti_desc : '' !!} </span>
                                    <span class="font-12 text-nowrap d-block text-muted"> {{ $noti->created_at }} </span>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>

                    @if ($notifications->lastPage() > 1)
                        <nav aria-hidden="false" aria-label="Pagination" data-v-aa799a9e="">
                            <ul aria-disabled="false" class="pagination b-pagination b-pagination-pills">

                                <li aria-hidden="true" class="page-item">
                                    <a aria-label="Go to previous page" class="page-link" href="{{ $notifications->previousPageUrl() }}">‹</a>
                                </li>
                                <!---->
                                <!---->
                                @for ($i = 1; $i <= $notifications->lastPage(); $i++)
                                    <li class="page-item {{ $notifications->currentPage() == $i ? 'active' : '' }}">
                                        <a aria-label="Go to page {{ $i }}" href="{{ $notifications->url($i) }}" target="_self" class="page-link">{{ $i }}</a>
                                    </li>
                                @endfor
                                <!---->
                                <li aria-hidden="true" class="page-item">
                                    <a aria-label="Go to next page" class="page-link" href="{{ $notifications->nextPageUrl() }}">›</a>
                                </li>

                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
