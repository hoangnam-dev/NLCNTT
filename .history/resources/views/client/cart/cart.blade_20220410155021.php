@extends('client.layouts.master')
@section('title')
{{ $title="Giỏ hàng" }}
@endsection
@section('content')
{{-- {{ dd($carts) }} --}}
    <div class="container cartCtn">
        {{-- <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div> --}}
        {{-- <form action="{{ route('client.cart.delCart') }}" method="GET">
            @csrf

            <td><button class="btn btn-dark">Xóa tất cả</button></td>
        </form> --}}
        @include('client.cart.cartComponent')
    </div>
    {{--
</section>
<!--/#cart_items--> --}}

@endsection

@section('js')
<script>
    function plusQty(id) {
        var qty = $('#qty'+id).val();
        qty = parseInt(qty);
        var plus = qty_plus(qty);
        $('#qty'+id).val(plus);
        updateItem(id,plus);
        // return true;
    }

    function minusQty(id) {
        var qty = $('#qty'+id).val();
        qty = parseInt(qty);
        var minus = qty_minus(qty);
        $('#qty'+id).val(minus);
        updateItem(id,minus);
        // return true;
    }

    // //Update  Quantity  Cart Item
    // function qtyChange() {
    //     $("#form-cart-item").click(function(event) {
    //         event.preventDefault();
    //         $.ajax({
    //             type: "POST",
    //             url: "./process.php?update-cart",
    //             data: $(this).serializeArray(),
    //             success: function(response) {
    //                 response = JSON.parse(response);
    //                 if (response.status == "0") {
    //                     // alert(response.message);
    //                     console.log(response.message);
    //                 } else {
    //                     // alert(response.message);
    //                     console.log(response.qty);
    //                     location.reload();
    //                 }
    //             }
    //         });
    //     });
    // }


    function updateItem(id,qty) {
        let url = $('.cartData').data('url');
        let _token = $('.itemID').data('token');
        // alert(id+' === '+qty+' === '+url +" === "+ _token);
        $.ajax({
            type: "POST",
            url: url,
            data: {"id":id, "qty":qty, "_token":_token},
            success: function (response) {
                if(response.status == 'success') {
                    $('.cartCtn').html(response.cartComponent);
                    // console.log(response.cartComponent);
                }
            }
        });
    };

    $(".cart-item_delete").click(function(event) {
        event.preventDefault();
        let url = $(this).data('url');
        let id = $(this).data('id');
        let _token = $('.itemID').data('token');
        // alert(id+'==='+url);
        $.ajax({
            type: "POST",
            url: url,
            data: {"id":id, "_token":_token},
            success: function (response) {
                if(response.status == 'success') {
                    // alert(response.status);
                    $('.cartCtn').html(response.cartComponent);
                    location.reload();
                    // console.log(response.cartComponent);
                }
            }
        });
    });
</script>
@endsection