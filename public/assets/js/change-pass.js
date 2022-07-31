$('#btn-change-pass').click(function(){
    var token = $('input[name="_token"]').val()
    var password = $('#new-pass').val()
    var re_password = $('#cf-new-pass').val()
    var reset_token = $('#token').val()

    if(!reset_token || !password || !re_password){
        swal({
            title: 'Cảnh báo',
            text: 'Vui lòng nhập đầy đủ các trường',
            type: 'error',
        })
        return
    }

    // Kiểm tra độ dài mật khẩu
    if(password.length < 8){
        swal({
            title: 'Cảnh báo',
            text: 'Mật khẩu phải có ít nhất 8 ký tự',
            type: 'error',
        })
        return
    }

    if(password !== re_password){
        swal({
            title: 'Cảnh báo',
            text: 'Nhập lại pass không chính xác!!',
            type: 'error',
        })
        return
    }

    $.ajax({
        url: '/process-change-pass',
        method: 'POST',
        dataType: 'JSON',
        data: {
            _token: token,
            re_password: re_password,
            reset_token: reset_token,
            password: password,
        },
        success: function(data){
            // console.log(data);
            if(data !== 'success'){
                swal({
                    title: 'Thông báo',
                    text: data,
                    type: 'error',
                })
                return
            } else {
                swal({
                    title: 'Thông báo',
                    text: 'Bạn đã đổi mật khẩu thành công',
                    type: 'success',
                    showCancelButton: true,
                    cancelButtonText: 'Tiếp tục',
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'Đăng nhập',
                    closeOnConfirm: false
                },
                    function() {
                        window.location.href = "/login-register"
                    }
                );
                return
            }
        }
    })
})