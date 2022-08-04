load_comment()

function load_comment(){
    var product_id = $('.product_id').val()
    var token = $('input[name="_token"]').val()
    $.ajax({
        url: '/load-comment',
        method: 'POST',
        data: {
            product_id: product_id,
            _token: token
        },
        success: function(data){
            if(!data){
                var text = `
                    <span style="font-size: 20px;">Hiện chưa có bình luận cho sản phẩm này</span>
                `;
                $('#comments').html(text)
            } else {
                $('#comments').html(data)
            }
        }
    })
}

$('#submit-comment').click(function(){
    var token = $('input[name="_token"]').val()
    var comment_content = $('#comment-content').val()
    var customer_id = $('.customer_id').val()
    var product_id = $('.product_id').val()

    // Kiểm tra đăng nhập
    if(customer_id == 'null'){
        swal({
            title: 'Yêu cầu đăng nhập',
            text: 'Đăng nhập vào tài khoản để có thể để lại bình luận bạn nhé!!',
            showCancelButton: true,
            cancelButtonText: 'Xem tiếp',
            confirmButtonClass: 'btn-success',
            confirmButtonText: 'Đăng nhập',
            closeOnConfirm: false
            },
                function() {
                window.location.href = '/login-register';
                }
            );
        return
    }

    if(!comment_content){
        swal({
            title: 'Cảnh báo',
            text: 'Bạn chưa nhập nội dung bình luận',
            type: 'error'
        })
        return
    }

    $.ajax({
        url: '/submit-comment',
        method: 'POST',
        data: {
            product_id: product_id,
            comment_content: comment_content,
            customer_id, customer_id,
            _token: token
        },
        success: function(data){
            if(data !== 'success'){
                    swal({
                    title: 'Thông báo',
                    text: data,
                    type: 'error'
                })
                $('#comment-content').val('')
                return
            } else {
                swal({
                    title: 'Thông báo',
                    text: 'Cảm ơn bạn đã để lại nhận xét',
                    type: 'success'
                })
                load_comment()
                $('#comment-content').val('')
            }
        }
    })
})

function rating(e) {
    var customer_id = $('.customer_id').val()
    var product_id = $('.product_id').val()
    var rating = e.value
    var token = $('meta[name="csrf-token"]').attr('content')

    // Kiểm tra đăng nhập
    if(customer_id == 'null'){
        swal({
            title: 'Yêu cầu đăng nhập',
            text: 'Đăng nhập vào tài khoản để có thể đánh giá sản phẩm nhé nhé!!',
            showCancelButton: true,
            cancelButtonText: 'Xem tiếp',
            confirmButtonClass: 'btn-success',
            confirmButtonText: 'Đăng nhập',
            closeOnConfirm: false
            },
                function() {
                window.location.href = '/login-register';
                }
            );
        return
    }

    $.ajax({
        url: '/rating',
        method: 'POST',
        data: {
            product_id: product_id,
            rating: rating,
            customer_id, customer_id,
            _token: token
        },
        success: function(data){
            if(data){
                swal({
                    title: 'Cảnh báo',
                    text: data,
                    type: 'error'
                })
            } else {
                swal({
                    title: 'Thông báo',
                    text: 'Cảm ơn bạn đã đánh giá sản phẩm của chúng tôi',
                    type: 'success'
                })
            }
        }
    })
}