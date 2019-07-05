@extends('layouts.app')

@section('content')

<div class="db-boxes-row row no-gutters">
    <div class="col-12">
        <div class="lowerlevel db-box">
            <h1 class="page-heading">
                <i class="fas fa-briefcase"></i> Assets
                <a href="{{ route('assets.create') }}" class="btn btn-primary d-block-small float-right">
                    <i class="fas fa-plus-square"></i>
                    Create Asset
                </a>
                <a href="{{ route('assets.export') }}" class="btn d-block-small float-right">
                    <i class="fas fa-file-download"></i>
                    Download
                </a>
            </h1>

            <div class="asset-table-wrapper table-wrapper table-responsive">
                <table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th class="name all">
                                Name
                            </th>
                            <th class="id none">
                                ID
                            </th>
                            <th class="contact">
                                Contact
                            </th>
                            <th class="street-address">
                                Address
                            </th>
                            <th class="type">
                                Type
                            </th>
                            <th class="company">
                                Company
                            </th>
                            <th class="rent">
                                Rent
                            </th>
                            <th class="deposit">
                                Deposit
                            </th>
                            <th class="created-on none">
                                Created
                            </th>
                            <th class="updated-on none">
                                Updated
                            </th>
                            <th class="view-button not-mobile-p">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activeAssets as $asset)
                            @include('layouts.components.assets-table')
                        @endforeach
                    </tbody>
                </table> <!-- asset table -->

                {{-- INACTIVE ASSETS --}}
                <table class="asset-table data-table dt-responsive table table-striped table-hover table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th class="name all">
                                    Name
                                </th>
                                <th class="id none">
                                    ID
                                </th>
                                <th class="contact">
                                    Contact
                                </th>
                                <th class="street-address">
                                    Address
                                </th>
                                <th class="type">
                                    Type
                                </th>
                                <th class="company">
                                    Company
                                </th>
                                <th class="rent">
                                    Rent
                                </th>
                                <th class="deposit">
                                    Deposit
                                </th>
                                <th class="created-on none">
                                    Created
                                </th>
                                <th class="updated-on none">
                                    Updated
                                </th>
                                <th class="view-button not-mobile-p">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inactiveAssets as $asset)
                                @include('layouts.components.assets-table')
                            @endforeach
                        </tbody>
                    </table> <!-- asset table -->
            </div> <!-- asset-table-wrapper -->


        </div> <!-- db-box -->
    </div> <!-- col -->
</div> <!-- db boxes -->

@endsection
