@extends('layouts.app')
@section('title', 'Salesanta | User Edit addresses')
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
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Edit Addresses</li>
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
					<!-- SIDEBAR MENU -->
                        @include('dashboardarea.sideber')
					<!-- END MENU -->
				</div>
			</div>


			<div class="col-md-9">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif


				<div class="profile-content">
					<form class="form" action="{{ route('edit-user-addresses-post',[$useraddress->id]) }}" method="post" name="edituseraddressespost" id="edituseraddressespost">
                        @csrf

                        <div class="row mb-2">
                            <div class="col-6 ">
								<label for="name">
									<h4>Name</h4>
								</label>
								<input type="text" class="form-control" name="name" id="name" value="{{ $useraddress->name }}">
                            </div>
                            <div class="col-6">
								<label for="mobileno">
									<h4>10 digit mobile number</h4>
								</label>
								<input type="text" class="form-control" name="mobileno" id="mobileno"  value="{{ $useraddress->mobileno }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
								<label for="pincode">
									<h4>Pincode</h4>
								</label>
								<input type="text" class="form-control" name="pincode" id="pincode" value="{{ $useraddress->pincode }}">

                            </div>
                            <div class="col-6">
								<label for="locality">
									<h4>Locality</h4>
								</label>
								<input type="text" class="form-control" name="locality" id="locality" value="{{ $useraddress->locality }}">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
								<label for="address_area_and_street">
									<h4>Address (Area and Street)</h4>
								</label>
								<textarea class="form-control" name="address_area_and_street">{{ $useraddress->address_area_and_street }}</textarea>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="city_or_district_or_town">
									<h4>City/District/Town</h4>
								</label>
								<input type="text" class="form-control" name="city_or_district_or_town" id="city_or_district_or_town" value="{{ $useraddress->city_or_district_or_town }}">
                            </div>
                            <div class="col-6">
								<label for="state">
									<h4>State</h4>
								</label>
                                <select name="state" class="form-control">
                                    <option value="">--Select State--</option>
                                    <option value="AN" @if($useraddress->state == "AN") selected="selected" @endif>Andaman and Nicobar Islands</option>
                                    <option value="AP" @if($useraddress->state == "AP") selected="selected" @endif>Andhra Pradesh</option>
                                    <option value="AR" @if($useraddress->state == "AR") selected="selected" @endif>Arunachal Pradesh</option>
                                    <option value="AS" @if($useraddress->state == "AS") selected="selected" @endif>Assam</option>
                                    <option value="BR" @if($useraddress->state == "BR") selected="selected" @endif>Bihar</option>
                                    <option value="CH" @if($useraddress->state == "CH") selected="selected" @endif>Chandigarh</option>
                                    <option value="CT" @if($useraddress->state == "CT") selected="selected" @endif>Chhattisgarh</option>
                                    <option value="DN" @if($useraddress->state == "DN") selected="selected" @endif>Dadra and Nagar Haveli</option>
                                    <option value="DD" @if($useraddress->state == "DD") selected="selected" @endif>Daman and Diu</option>
                                    <option value="DL" @if($useraddress->state == "DL") selected="selected" @endif>Delhi</option>
                                    <option value="GA" @if($useraddress->state == "GA") selected="selected" @endif>Goa</option>
                                    <option value="GJ" @if($useraddress->state == "GJ") selected="selected" @endif>Gujarat</option>
                                    <option value="HR" @if($useraddress->state == "HR") selected="selected" @endif>Haryana</option>
                                    <option value="HP" @if($useraddress->state == "HP") selected="selected" @endif>Himachal Pradesh</option>
                                    <option value="JK" @if($useraddress->state == "JK") selected="selected" @endif>Jammu and Kashmir</option>
                                    <option value="JH" @if($useraddress->state == "JH") selected="selected" @endif>Jharkhand</option>
                                    <option value="KA" @if($useraddress->state == "KA") selected="selected" @endif>Karnataka</option>
                                    <option value="KL" @if($useraddress->state == "KL") selected="selected" @endif>Kerala</option>
                                    <option value="LA" @if($useraddress->state == "LA") selected="selected" @endif>Ladakh</option>
                                    <option value="LD" @if($useraddress->state == "LD") selected="selected" @endif>Lakshadweep</option>
                                    <option value="MP" @if($useraddress->state == "MP") selected="selected" @endif>Madhya Pradesh</option>
                                    <option value="MH" @if($useraddress->state == "MH") selected="selected" @endif>Maharashtra</option>
                                    <option value="MN" @if($useraddress->state == "MN") selected="selected" @endif>Manipur</option>
                                    <option value="ML" @if($useraddress->state == "ML") selected="selected" @endif>Meghalaya</option>
                                    <option value="MZ" @if($useraddress->state == "MZ") selected="selected" @endif>Mizoram</option>
                                    <option value="NL" @if($useraddress->state == "NL") selected="selected" @endif>Nagaland</option>
                                    <option value="OR" @if($useraddress->state == "OR") selected="selected" @endif>Odisha</option>
                                    <option value="PY" @if($useraddress->state == "PY") selected="selected" @endif>Puducherry</option>
                                    <option value="PB" @if($useraddress->state == "PB") selected="selected" @endif>Punjab</option>
                                    <option value="RJ" @if($useraddress->state == "RJ") selected="selected" @endif>Rajasthan</option>
                                    <option value="SK" @if($useraddress->state == "SK") selected="selected" @endif>Sikkim</option>
                                    <option value="TN" @if($useraddress->state == "TN") selected="selected" @endif>Tamil Nadu</option>
                                    <option value="TG" @if($useraddress->state == "TG") selected="selected" @endif>Telangana</option>
                                    <option value="TR" @if($useraddress->state == "TR") selected="selected" @endif>Tripura</option>
                                    <option value="UP" @if($useraddress->state == "UP") selected="selected" @endif>Uttar Pradesh</option>
                                    <option value="UT" @if($useraddress->state == "UT") selected="selected" @endif>Uttarakhand</option>
                                    <option value="WB" @if($useraddress->state == "WB") selected="selected" @endif>West Bengal</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-6">
								<label for="landmark">
									<h4>Landmark (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="landmark" id="landmark" value="{{ $useraddress->landmark }}">
                            </div>
                            <div class="col-6">
								<label for="alternate_phone">
									<h4>Alternate Phone (Optional)</h4>
								</label>
								<input type="text" class="form-control" name="alternate_phone" id="alternate_phone" value="{{ $useraddress->alternate_phone }}">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
								<label for="address_type">
									<h4>Address Type</h4>
								</label>
                                <select name="address_type" class="form-control">
                                    <option value="">--Select Address Type--</option>
                                    <option value="0" @if($useraddress->address_type == 0) selected="selected" @endif >Home</option>
                                    <option value="1" @if($useraddress->address_type == 1) selected="selected" @endif >Work</option>
                                </select>
                            </div>
                        </div>


						<div class="form-group">
						 <button class="btn btn-lg btn-success pull-left" type="submit">Save</button>
					   </div>

					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- contact us section ending here -->



@endsection
