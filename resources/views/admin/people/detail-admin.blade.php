@extends('admin.layout.master')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            @if (session('success'))
                @include('layout.alert-success')
            @endif
            @if ($errors->any())
                @include('layout.alert-err')
            @endif
            <div class="row">
                <div class="col-md-3 ">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img 
                        id="output"
                        class="rounded-circle mt-5" 
                        style="border-radius: 100%; margin-top: 50%; margin-bottom: 20px; width: 150px; height: 150px;"
                        @if ($admin->avatar === null)
                            src="{{ asset('assets/images/users/default-user-avatar.jpg') }}"
                        @else
                            src= "{{ asset('assets/images/users') . '/' . $admin->avatar}}"
                        @endif
                        >
                    </div>
                </div>
                <div class="col-md-8 ">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-center">Thông tin của bạn</h4>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Họ và tên</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->getGenderUser() }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->formatDate($admin->birthdate) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Ngày tạo</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->formatDate($admin->created_at) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->phone_number }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->getStatusUser() }}">
                            </div>
                        </div>
                        {{-- @if ($admin->status == 1)
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Lý do block</label>
                                <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $admin->desc_block }}">
                                </div>
                            </div>
                        @endif
                        @if ($admin->status == 0)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Khóa người dùng</button>
                        @else
                            <form action="{{ route('admin.unblock-admin') }}" method="post">
                                @csrf
                                <input type="text" name="admin_id" value="{{ $admin->user_id }}" hidden>
                                <button type="submit" class="btn btn-primary">Mở khóa người dùng</button>
                            </form>
                        @endif --}}
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>

        {{-- Modal desc_block --}}
        {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{ route('admin.block-customer') }}" method="post">
                    @csrf
                    <input type="text" name="customer_id" value="{{ $customer->user_id }}" hidden>
                    <div class="modal-body">
                        <div class="form-check">
                            <input value="Có hành vi không đúng quy tắc" class="form-check-input" type="radio" name="desc_block" checked>
                            <label class="form-check-label">
                                Có hành vi không đúng quy tắc
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Spam" class="form-check-input" type="radio" name="desc_block">
                            <label class="form-check-label">
                                Spam
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="Hủy đơn hàng liên tục" class="form-check-input" type="radio" name="desc_block">
                            <label class="form-check-label">
                                Hủy đơn hàng liên tục
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                      <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </form>
              </div>
            </div>
        </div> --}}
    </div>
@endsection
