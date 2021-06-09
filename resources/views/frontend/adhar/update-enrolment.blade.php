@extends('layouts.front-app')
@section('title', 'Intranet | Update Enrolment')
@section('content')
	<!--Update Enrolment Form Section Start-->
	<div class="enrolment_section">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="enrolment_area">
						<h5>certificate for aadhar Enrolment / Update</h5>
						<form>
							<div class="row justify-content-end">
								<div class="col-xl-4">
									<div class="form-group">
										<input type="date" class="form-control">
									</div>
								</div>
							</div>
							<h5>Resident's Details</h5>
							<div class="row">
								<div class="col-xl-3">
									<div class="form-check">
									    <input type="radio" name="citizenship" class="form-check-input">
									    <label class="form-check-label">Resident</label>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-check">
									    <input type="radio" name="citizenship" class="form-check-input">
									    <label class="form-check-label">Non Resident Indian (NRI)</label>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-check">
									    <input type="radio" name="citizenship" class="form-check-input">
									    <label class="form-check-label">New Employment</label>
									</div>
								</div>
								<div class="col-xl-3">
									<div class="form-check">
									    <input type="radio" name="citizenship" class="form-check-input">
									    <label class="form-check-label">Update Request</label>
									</div>
								</div>
							</div>
							<hr/>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label for="">Aadhar Number( Only Update Only ):</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Full Name:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">C/O:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">House No/Bldg?Apt:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Street/Road/Lane:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Landmark:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Area/Locality/Sector:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Village/Town/City:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Post Office:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">District:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">State:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">Pin Code:</label>
										<input type="text" name="" class="form-control">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="">Date of Birth:</label>
										<input type="Date" name="" class="form-control">
									</div>
								</div>
							</div>
							<h5>Certifier's Details ( To be filled by the Certifier Onle )</h5>
							<div class="form-group row">
							    <label for="" class="col-sm-2 col-form-label">Name of Certifier:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" value="SIMAERJEET SINGH BANS" disabled>
							    </div>
							</div>
							<div class="form-group row">
							    <label for="" class="col-sm-2 col-form-label">Designation:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" value="MLA ATAM NAGAR" disabled>
							    </div>
							</div>
							<div class="form-group row">
							    <label for="" class="col-sm-2 col-form-label">Address:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" value="#9757 STREET NO.5 KOT MANGAL SINGH LUDHIANA, PUNJAB" disabled>
							    </div>
							</div>
							<div class="form-group row">
							    <label for="" class="col-sm-2 col-form-label">Contact Number:</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" value="98140-93795" disabled>
							    </div>
							</div>
							<div class="row">
								<div class="col-6">
									<label for="">I hereby certify above mentioned details of the resident and I am a...( Tick appropriate Box Bellow)</label>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Gazetted Officer :Group A</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Village Panchayat Head or Mukhiya</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Gazetted Officer :Group B</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">MP/MLA/MCL/Municipal Councillour</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Tehsildar</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Head od Recognized Educational Institution</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">Superintendent/Warden/Matron/Head of Institution of Recognized Shelter homes/Orphanages</label>
									</div>
									<div class="form-check">
									    <input type="radio" name="certifier" class="form-check-input">
									    <label class="form-check-label">EPFO Officer</label>
									</div>	
								</div>
								<div class="col-6">
									<div class="checklist">
										<label for="">Checklist for Certifier</label>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" value="option1">
										  <label class="form-check-label" for="inlineCheckbox1">No Overwriting</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" value="option1">
										  <label class="form-check-label" for="inlineCheckbox1">Issue date is filled</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" value="option1">
										  <label class="form-check-label" for="inlineCheckbox1">Resident's Signature</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" value="option1">
										  <label class="form-check-label" for="inlineCheckbox1">Certifier's Details</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" value="option1">
										  <label class="form-check-label" for="inlineCheckbox1">Resident's Photo is cross signed and cross stamped</label>
										</div>
									</div>
									<div class="signature">
									<p>Signature & Stamp of the Certifier</p>	
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Update Enrolment Form Section End-->
	
@endsection
