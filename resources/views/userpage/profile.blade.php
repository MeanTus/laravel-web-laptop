@extends('layout.master')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-center">Thông tin của bạn</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Họ và tên</label>
                        <input type="text" class="form-control" placeholder="first name" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Số điện thoại</label>
                        <input type="text" class="form-control" placeholder="enter phone number" value="">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Giới tính</label>
                        <input type="text" class="form-control" placeholder="enter address line 1" value="{{ $user->getGenderUser() }}">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Địa chỉ email</label>
                        <input type="text" class="form-control" placeholder="enter address line 2" value="{{ $user->email }}">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Password</label>
                        <input type="password" class="form-control" placeholder="enter address line 2" 
                        value="{{ $user->password }}" disabled>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">State</label>
                        <input type="text" class="form-control" placeholder="enter address line 2" value="">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Area</label>
                        <input type="text" class="form-control" placeholder="enter address line 2" value="">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control" placeholder="enter email id" value="">
                    </div>
                    <div class="col-md-12" style="margin-top: 10px">
                        <label class="labels">Education</label>
                        <input type="text" class="form-control" placeholder="education" value="">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6" style="margin-top: 10px">
                        <label class="labels">Country</label>
                        <input type="text" class="form-control" placeholder="country" value="">
                    </div>
                    <div class="col-md-6" style="margin-top: 10px">
                        <label class="labels">State/Region</label>
                        <input type="text" class="form-control" value="" placeholder="state">
                    </div>
                </div>
                <div class="mt-5 text-center" style="margin-top: 10px">
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection