@extends('layouts.app')
@section('title', 'Salesanta | My Address')
@section('content')

	<!-- page header section ending here -->
	<section class="breadcrumb-area breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="breadcrumb-content">
						<h2 class="title">Manage Addresses</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Manage Addresses</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page header section ending here -->
	<!-- contact us section start here -->
	<div class="container">
		<div class="row profile">
			<div class="col-md-3">
				<div class="profile-sidebar">
                    @include('dashboardarea.sideber')
				</div>
			</div>
			<div class="col-md-9">
				<div class="profile-content">
                    <section class="product">
                        <div class="table-responsive">
                            <div class="profile-userbuttons">
                                <a href="{{ url('/add-new-addresses') }}" class="btn btn-success btn-sm" style="float: right; margin-bottom: 8px;">Add New Address</a>
                            </div>

                            <table class="table table-hover table-bordered">
                                <thead class="thead-info">
                                    <tr>
                                        <th>Address Type</th>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Pincode</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($useraddress)
                                        @foreach ($useraddress as $row)
                                            <tr>
                                                <td>
                                                    @if($row->address_type == 0)
                                                        Home
                                                    @else
                                                        Work
                                                    @endif
                                                </td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->mobileno }}</td>
                                                <td>{{ $row->pincode }}</td>
                                                <td>{{ $row->address_area_and_street }}</td>
                                                <td>
                                                    <a href="{{ route('edit-my-addresses',[Crypt::encryptString($row->id)]) }}" title="Edit addresses"><i class="fa fa-eye"></i> </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </section>

				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



@endsection
