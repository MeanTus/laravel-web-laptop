$('#btn-register').click(function(){
    var token = $('input[name="_token"]').val()
    var name = $('#frm-reg-lname').val()
    var email = $('#frm-reg-email').val()
    var gender = $('input[name="gender"]:checked').val()
    var birthdate = $('#frm-reg-birthdate').val()
    var password = $('#frm-reg-pass').val()
    var cfpass = $('#frm-reg-cfpass').val()

    // Kiểm tra điền đầy đủ thông tin
    if(!name || !email || !gender || !birthdate || !password || !cfpass){
        swal({
            title: 'Cảnh báo',
            text: 'Vui lòng nhập đầy đủ thông tin',
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
    // Kiểm tra nhập lại pass có đúng hay ko
    if (password !== cfpass){
        swal({
            title: 'Cảnh báo',
            text: 'Nhập lại pass không chính xác!!',
            type: 'error',
        })
        return
    }

    $.ajax({
        url: '/register',
        method: 'POST',
        dataType: 'JSON',
        data: {
            _token: token,
            email: email,
            name: name,
            gender: gender,
            birthdate: birthdate,
            password: password,
        },
        success: function(data){
            if(data == 'Email Err'){
                swal({
                    title: 'Thông báo',
                    text: 'Email của bạn đã được sử dụng',
                    type: 'error',
                })
            } else {
                swal({
                    title: 'Thông báo',
                    text: 'Bạn đã đăng ký thành công',
                })
            }
        }
    })
})