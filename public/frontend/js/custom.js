// increment and decrement of the product
$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-inp")
            .val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });
    $(".increase-btn").click(function (e) {
        e.preventDefault();

        var value_inc = $(this).closest('.product_data').find('.qty-inp').val();
        var value = parseInt(value_inc, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-inp').val(value);
        }
    });
    $(".decrease-btn").click(function (e) {
        e.preventDefault();

        var value_dec = $(this).closest(".product_data").find(".qty-inp").val();
        var value = parseInt(value_dec, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-inp").val(value);
        }
    });
    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".product_data").find(".product_id").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                'product_id':product_id,
            },
            success: function (response) {
                setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });

    $('.changeQty').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest(".product_data").find(".product_id").val();
        var qty = $(this).closest(".product_data").find(".qty-inp").val();
        data={
            'product_id':product_id,
            'product_qty':qty,
        }
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                setTimeout(location.reload.bind(location), 1000);
                swal("",response.status,"success");
            }
        });
    });
});
