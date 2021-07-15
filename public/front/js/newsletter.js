/*----------------------------------
//---- NEWSLETTER SUBSCRIPTION ----//
-----------------------------------*/
(function () {
    /* $('.mailchimp').ajaxChimp({
        callback: mailchimpCallback,
        //replace bellow url with your own mailchimp form post url inside the url: "---".
        //to learn how to get your own URL, please check documentation file.
        url: 'www.google.com',
    });

    function mailchimpCallback(resp) {
        if (resp.result === 'success') {
            $('.subscription-success').html('<i class="fa fa-check"></i>' + resp.msg).fadeIn(1000);
            $('.subscription-error').fadeOut(500);

        } else if (resp.result === 'error') {
            $('.subscription-error').html('<i class="fa fa-times"></i>' + resp.msg).fadeIn(1000);
        }
    } */
    $('#add_subscriber_button').click(function (event) {
        event.preventDefault();

        let email = $('#subscribeEmail').val();
        $('label.error').text('');
        $('label.success').text('');
        if (email == '') {
            $('label.error').text('Please Enter Your Email');
        } else {
            let _token = $('input[name="_token"]').val();
            let url = $('#add_subscriber_url').val();
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    email: email,
                    _token: _token
                },
                success: function (response) {
                    console.log(response);
                    if(response.result === "success") {
                        $('label.error').text('');
                        $('label.success').text(response.msg);
                    } else {
                        $('label.error').text(response.msg);
                        $('label.success').text('');
                    }
                },
                error: function (e) {
                }
            });
        }
    });
}());
