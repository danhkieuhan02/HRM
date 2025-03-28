@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Create Employee Information</h2>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="EmployeeCode">Employee Code</label>
                <input type="text" class="form-control" id="EmployeeCode" name="EmployeeCode" maxlength="20" required>
            </div>
            <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" class="form-control" id="FullName" name="FullName" maxlength="100" required>
            </div>
            <div class="form-group">
                <label for="Birthday">Birthday</label>
                <input type="date" class="form-control" id="Birthday" name="Birthday">
            </div>
            <div class="form-group">
                <label for="Hometown">Hometown</label>
                <input type="text" class="form-control" id="Hometown" name="Hometown" maxlength="255">
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="file" class="form-control" id="Image" name="Image">
            </div>
            <div class="form-group">
                <label for="Gender">Gender</label>
                <input type="text" class="form-control" id="Gender" name="Gender" maxlength="10">
            </div>
            <div class="form-group">
                <label for="Ethnic">Ethnic</label>
                <input type="text" class="form-control" id="Ethnic" name="Ethnic" maxlength="50">
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" maxlength="15">
            </div>
            <div class="form-group">
                <label for="Status">Status</label>
                <input type="text" class="form-control" id="Status" name="Status" maxlength="20">
            </div>
            <div class="form-group">
                <label for="DepartmentCode">Department Code</label>
                <input type="text" class="form-control" id="DepartmentCode" name="DepartmentCode" maxlength="20">
            </div>
            <div class="form-group">
                <label for="EmployeePositionCode">Employee Position Code</label>
                <input type="text" class="form-control" id="EmployeePositionCode" name="EmployeePositionCode"
                    maxlength="20">
            </div>
            <div class="form-group">
                <label for="ContractCode">Contract Code</label>
                <input type="text" class="form-control" id="ContractCode" name="ContractCode" maxlength="20">
            </div>
            <div class="form-group">
                <label for="EducationLevelCode">Education Level Code</label>
                <input type="text" class="form-control" id="EducationLevelCode" name="EducationLevelCode" maxlength="20">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
