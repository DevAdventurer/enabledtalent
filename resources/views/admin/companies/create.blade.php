@extends('admin.layouts.master')
@push('links')
    <link rel="stylesheet" href="{{ asset('admin-assets/libs/select2/css/select2.min.css') }}">
    <style type="text/css">
        span.select2-selection.select2-selection--single,
        span.selection {
            height: 37px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            height: 37px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 36px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 37px;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            padding-left: 14px;
            font-size: .8125rem;
        }

        textarea {
            display: block;
            width: 100%;
            height: auto;
            resize: none;
            /* Disable the draggable resizer handle */
            overflow: hidden;
            /* Hide the scrollbar */
            min-height: 100px;
            /* Minimum height */
        }
    </style>
@endpush




@section('main')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ Str::title(str_replace('-', ' ', request()->segment(2))) }}</h4>
                @can('browse_client')
                    <div class="page-title-right">
                        <a href="{{ route('admin.' . request()->segment(2) . '.index') }}"
                            class="btn-sm btn btn-secondary btn-label">
                            <i class="align-middle bx bx-list-ul label-icon fs-16 me-2"></i>
                            All {{ Str::title(str_replace('-', ' ', request()->segment(2))) }}s List
                        </a>
                    </div>
                @endcan

            </div>
        </div>
    </div>


{{ html()->form('POST', route('admin.' . request()->segment(2) . '.store'))->attribute('enctype', 'multipart/form-data')->id('store')->open() }}
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">

            <div class="mt-4 form-group">
                {{ html()->button('Save Client Details')->type('button')->class('btn btn-success bg-gradient')->attribute('onclick = store(this)') }}
            </div>
        </div>
    </div>
{{ html()->form()->close() }}
@endsection




@push('scripts')
    <script src="{{ asset('admin-assets/libs/select2/js/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            var state = $('.states').val();
            var district = $('.getDistrict').val();

            $('.getDistrict').select2({
                placeholder: 'Choose District',
                allowClear: true,
                ajax: {
                    url: '{{ route('admin.common.district.list', '') }}/' + state,
                    dataType: 'json',
                    cache: true,
                    delay: 200,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                }
            });


            $('.getCity').select2({
                placeholder: 'Choose City',
                allowClear: true,
                ajax: {
                    url: '{{ route('admin.common.city.list', '') }}/' + district,
                    dataType: 'json',
                    cache: true,
                    delay: 200,
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1
                        }
                    },
                }
            });



            $('.states').select2();


            $('body').on('change', '.states', function() {
                var state = $(this).val();
                $('.getDistrict').val(null).trigger('change');
                $('.getDistrict').select2({
                    placeholder: 'Choose District',
                    allowClear: true,
                    ajax: {
                        url: '{{ route('admin.common.district.list', '') }}/' + state,
                        dataType: 'json',
                        cache: true,
                        delay: 200,
                        data: function(params) {
                            return {
                                term: params.term || '',
                                page: params.page || 1
                            }
                        },
                    }
                });
            });


            $('body').on('change', '.getDistrict', function() {
                var district = $(this).val();
                $('.getCity').val(null).trigger('change');
                $('.getCity').select2({
                    placeholder: 'Choose City',
                    allowClear: true,
                    ajax: {
                        url: '{{ route('admin.common.city.list', '') }}/' + district,
                        dataType: 'json',
                        cache: true,
                        delay: 200,
                        data: function(params) {
                            return {
                                term: params.term || '',
                                page: params.page || 1
                            }
                        },
                    }
                });
            });
        });
    </script>
@endpush
