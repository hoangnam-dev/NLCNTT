    $(document).ready(function() {
        $('.test').click(function() {
            console.log('test');
        })

        $('.showPass').click(function() {
            if ($(this).children('i').hasClass('fa-eye-slash')) {
                $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
                $(this).prev().attr('type', 'text');
            } else {
                $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
                $(this).prev().attr('type', 'password');
            }
        });
    });
    // Function Quantity Input Product
    function qty_plus(quantity) {
        quantity = quantity + 1;
        return quantity;
    }

    function qty_minus(quantity) {
        if (quantity > 1) {
            quantity--;
        } else {
            return quantity;
        }
        return quantity;
    }
    //Validate Form
    function showErr(key, message) {
        document.getElementById("error-" + key).innerHTML = message;
    }

    // Countdown function (by Seconds)

    function countDown(seconds) {
        seconds--;
        console.log(seconds);
        $('.resend-link').addClass('disabled');
        $('#countDown').html('(sau ' + seconds + ' giây)');
        if (seconds > 0) {
            setTimeout("countDown(" + seconds + ")", 1000);
        } else {
            $('#countDown').html('');
            $('.resend-link').removeClass('disabled');
        }
    }