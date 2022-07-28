@extends('layout.master')
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    <form action="{{ route('userpage.update_user', ['user' => $user->user_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img 
                    id="output"
                    class="rounded-circle mt-5" 
                    style="border-radius: 100%; margin-top: 50%; margin-bottom: 20px; width: 150px; height: 150px;"
                    @if ($user->avatar === null)
                        src="{{ asset('assets/images/users/default-user-avatar.jpg') }}"
                    @else
                        src= "{{ asset('assets/images/users') . '/' . $user->avatar}}"
                    @endif
                    >
                    <input type="text" name="old-avatar" value="{{ $user->avatar }}" hidden>

                    @include('layout.edit-avatar')
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-center">Thông tin của bạn</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12" style="margin-top: 10px">
                            <label class="labels">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}">
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <label class="labels">Giới tính</label><br>
                            @foreach ($gender as $key=>$value)
                                <input 
                                type="radio" 
                                id="frm-reg-email" 
                                name="gender" 
                                value="{{ $key }}" 
                                @if ($user->gender === $key)
                                    checked
                                @endif
                                >
                                <label for="Male">{{ $value }}</label><br>
                            @endforeach
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <label class="labels">Địa chỉ email</label>
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <label class="labels">Password</label>
                            <input type="password" class="form-control" placeholder="enter address line 2" 
                            value="{{ $user->password }}" disabled> <br>
                            <a href="{{ route('userpage.reset-pass') }}" class="btn btn-danger">Đổi mật khẩu</a>
                        </div>
                    </div>
                    <div class="mt-5 text-center" style="margin-top: 10px">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection