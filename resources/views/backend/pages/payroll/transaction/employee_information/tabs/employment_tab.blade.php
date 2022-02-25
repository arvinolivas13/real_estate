@include('backend.partial.flash-message')
<form id="employment_tab" method="post">
    <div class="row header-bar">
        <div class="col-12">
            <div class="action-button">
                <button type="button" onclick="resetForm()" disabled  data-toggle="tooltip" data-placement="bottom" title="New Record" disabled>
                    <i class="fas fa-plus"></i>
                </button>
                <button type="submit" data-toggle="tooltip" data-placement="bottom" title="Save Record">
                    <i class="fas fa-save"></i>
                </button>
                <button type="button" data-toggle="tooltip" data-placement="bottom" title="Delete Record" disabled>
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 col-md-12">
            <div class="employee-details row">
                <div class="col-6">
                    <div>Employee Number: <span class="emp_no">-</span></div>
                </div>
                <div class="col-6">
                    <div>Employee Name: <span class="name">-</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-9 col-md-12">
            <div class="row">
                <div class="col-xl-4 col-md-12">
                    <div class="form-group">
                        <label>Classes <span class="required">*</span></label>
                        <select name="classes_id" id="classes_id" class="form-control" required>
                            <option value="">Please select classes</option>
                            @foreach ($classes as $item)
                            <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="form-group">
                        <label>Position <span class="required">*</span></label>
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option value="">Please select position</option>
                            @foreach ($position as $item)
                            <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="form-group">
                        <label>Department <span class="required">*</span></label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Please select department</option>
                            @foreach ($department as $item)
                            <option value="{{$item->id}}">{{$item->description}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6 col-md-12">
                    <div class="form-group">
                        <label>Date of Employment <span class="required">*</span></label>
                        <input type="date" class="form-control" id="employment_date" name="employment_date" required>
                    </div>
                </div>
                <div class="col-6 col-md-12">
                    <div class="form-group">
                        <label>Tax Rate</label>
                        <input type="integer" class="form-control" id="tax_rate" name="tax_rate">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
