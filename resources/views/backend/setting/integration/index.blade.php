@extends('backend.layouts.app')

@section('title', 'Integration')
@section('home_url', route('integration.index'))
@section('page', ' ')

@section('content')

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($integrations as $integration)
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <img src="{{ asset('/backend/app-assets/images/icons/'.$integration->image) }}"
                                                    alt="{{ $integration->name }}" height="40" width="40" />
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input med-query" id="customSwitch1"
                                                        data-id="{{ $integration->id }}"
                                                        {{ $integration->status == '0' ? '' : 'checked' }} name="status"
                                                        onchange="integrationStatus(this)"
                                                        style="position: relative;left: 78px;bottom: 3px;" />

                                                </div>
                                                <div class="dropdown chart-dropdown">
                                                    <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                                                        data-bs-toggle="dropdown"></i>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"
                                                            onclick="showFolderModel('{{ route('integration.show',[$integration->id]) }}')">
                                                            <i data-feather="settings" class="me-25"></i>
                                                            <span class="align-middle">Manage</span>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                                <div class="role-heading">
                                                    <h4 class="fw-bolder">{{ $integration->name }}</h4>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="add-integration" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="save-details" class="widget-box widget-color-dark user-form" method="POST" action="{{route('integration.store')}}">
                        @csrf
                        <input type="hidden" id="integration_id" name="id" value="">

                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Client/Public Id </label>
                                <input type="text" id="client_id" class="form-control" placeholder="Client/Public id" name="client_id">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-column">Secret Key </label>
                                <input type="text" id="secret_id" class="form-control" placeholder="Secret Key" name="secret_key">
                            </div>
                        </div>

                        <div class="form-group mb-2 mt-2">
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="type" value="live" id="Live">
                                <label class="form-check-label" for="Live"> Live </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="type" value="sandbox" id="SandBox">
                                <label class="form-check-label" for="SandBox"> SandBox </label>
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <button type="submit" class="btn btn-rounded btn-success btn-sm rounded" id="btn-save" > <i class="fas fa-save"></i> Save </button>
                        </div>
                    </form>

                </div>

                <div class="loader_container" id="form_loader" style="display:none">
                    <div class="loader"></div>
                </div>

            </div>
        </div>
    </div>
@endsection



@push('script')
    @include('scripts.backend.setting.integrationjs')
@endpush
