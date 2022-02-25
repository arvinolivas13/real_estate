@include('backend.partial.flash-message')

<form id="general_form" method="post" enctype="multipart/form-data">
    
    <div class="row header-bar">
        <div class="col-12">
            <div class="action-button">
                <button type="button" class="add" onclick="resetForm()" disabled  data-toggle="tooltip" data-placement="bottom" title="New Record">
                    <i class="fas fa-plus"></i>
                </button>
                <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Save Record">
                    <i class="fas fa-save"></i>
                </button>
                <button type="button" class="delete" data-toggle="tooltip" data-placement="bottom" title="Delete Record" disabled>
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
    @csrf
    <div class="form-row">
        <div class="col-xl-2 col-lg-3 col-md-6 col-sm-8">
            <div id="" class="image-previewer" onclick="$('#image').click()">
                <img src="/images/employee/default.jpg" alt="" width="100%" id="viewer" data-cropzee="image">
            </div>
            <input id="image" type="file" name="image" class="form-control" onchange="scion.fileView(event)" style="display:none;">
            <button class="btn btn-primary" type="button" onclick="$('#image').click()">Select Photo</button>
        </div>
        <div class="col-xl-7 col-lg-9 col-md-12">
            <div class="form-row">
                <div class="col-xl-6 col-md-6 col-sm-6">
                    @include('backend.partial.component.lookup', [
                        'label' => "Employee Number", 
                        'placeholder' => "<NEW>",
                        'id' => "employee_no", 
                        'title' => "Employee", 
                        'url' => "/payroll/employee-information/get", 
                        'data' => array(
                            array('data' => "DT_RowIndex", 'title' => "#"), 
                            array('data' => "employee_no", 'title' => "Employee Number"),
                            array('data' => "full_name", 'title' => "Full Name"),
                            array('data' => "email", 'title' => "Email Address")
                        ),
                        'disable' => true
                    ])
                </div>
                
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Status <span class="required">*</span></label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">In-active</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Firstname <span class="required">*</span></label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Middlename</label>
                        <input type="text" class="form-control" id="middlename" name="middlename">
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Lastname <span class="required">*</span></label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Suffix</label>
                        <input type="text" class="form-control" id="suffix" name="suffix">
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Birthdate <span class="required">*</span></label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Gender <span class="required">*</span></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Contact Number 1 <span class="required">*</span></label>
                        <input type="text" class="form-control" id="phone1" name="phone1" required>
                    </div>
                </div>

                <div class="col-xl-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Contact Number 2</label>
                        <input type="text" class="form-control" id="phone2" name="phone2">
                    </div>
                </div>

                <div class="col-xl-12"><br><h5>Address 1 <span class="required">*</span></h5><hr></div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Street No.</label>
                        <input type="text" class="form-control" id="street_1" name="street_1">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="text" class="form-control" id="barangay_1" name="barangay_1">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="city_1" name="city_1" required>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" id="province_1" name="province_1" required>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" id="country_1" name="country_1" required>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Zip Code</label>
                        <input type="text" class="form-control" id="zip_1" name="zip_1" required>
                    </div>
                </div>
                
                <div class="col-xl-12"><br><h5>Address 2</h5> <hr></div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Street No.</label>
                        <input type="text" class="form-control" id="street_2" name="street_2">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="text" class="form-control" id="barangay_2" name="barangay_2">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" id="city_2" name="city_2">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" class="form-control" id="province_2" name="province_2">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" id="country_2" name="country_2">
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="form-group">
                        <label>Zip Code</label>
                        <input type="text" class="form-control" id="zipcode_2" name="zipcode_2">
                    </div>
                </div>
                
                <div class="col-xl-12"><br><h5>Emergency Contact</h5> <hr></div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="emergency_name" name="emergency_name">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="emergency_no" name="emergency_no">
                    </div>
                </div>

                <div class="col-xl-12">
                    <br>
                    <h5>Account</h5>
                    <hr>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Email Address <span class="required">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h5>Benefits and Others</h5>
                    <hr>
                    <br>
                </div>

                <div class="col-xl-12">
                    <div class="form-group">
                        <label>Bank Account</label>
                        <input type="text" class="form-control" id="bank_account" name="bank_account">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>TIN Number</label>
                        <input type="text" class="form-control" id="tin_number" name="tin_number">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>SSS Number</label>
                        <input type="text" class="form-control" id="sss_number" name="sss_number">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>Pagibig Number</label>
                        <input type="text" class="form-control" id="pagibig_number" name="pagibig_number">
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="form-group">
                        <label>Philhealth Number</label>
                        <input type="text" class="form-control" id="philhealth_number" name="philhealth_number">
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</form>

