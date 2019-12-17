
function searchProduct() {
    $('.card').html('');

    $.ajax({
        url: 'https://private-4639ce-ecommerce56.apiary-mock.com/home',
        type: 'get',
        dataType: 'json',
        data: {
            'search': $('.search-text').val()
        },
        success: function (result) {
           console.log(result)
        }
    });
}

$('.search-text').on('keyup', function() {
        $.ajax({
            url: '/home',
            type: 'GET',
        dataType: 'json',
        data : {
            'search': $('.search-text').val()
        },
        success:function (data) {
            $('.card').html(data['view']);
            console.log(data);
        },
        error: function(xhr, status) {
            console.log(xhr.error + " ERROR STATUS : " + status);
        },
        complete: function () {
            alreadyloading = false;
        }
    });
});
