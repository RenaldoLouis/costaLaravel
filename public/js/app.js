var baseUrl = window.location.origin;

function addToCart(productId, quantity = 1, callback) {
    // Dapatkan elemen gambar produk dan posisi keranjang
    var productImg = $("#product-img-" + productId); // Misalkan Anda memiliki ID seperti ini untuk gambar produk
    var cart = $(".icon-FullShoppingCart");

    $.ajax({
        url: "/add-to-cart", // Ganti dengan URL endpoint Anda
        type: "POST",
        data: {
            productId: productId,
            quantity: quantity,
            _token: $('meta[name="csrf-token"]').attr("content"), // CSRF token untuk keamanan
        },
        success: function (response) {
            // Tangani respon sukses disini, misalnya memperbarui tampilan keranjang
            $(".cart-box ul.cart-box-width li.cart-list")
                .first()
                .html(response.cartHtml);

            // Memperbarui jumlah total produk di keranjang
            $(".total-pro").text(response.totalItems);
            $(".cart-footer .price-content li")
                .first()
                .find("span")
                .text("Rp " + response.total);

            // Panggil callback jika diberikan
            if (typeof callback === 'function') {
                callback();
            }
        },
        error: function (error) {
            // Tangani kesalahan jika ada
            alert(
                "Terjadi kesalahan saat menambahkan produk ke keranjang"
            );
        },
    });

    // Buat clone dari gambar untuk animasi
    var clone = productImg.clone();
    clone
        .offset({
            top: productImg.offset().top,
            left: productImg.offset().left,
        })
        .css({
            opacity: "0.5",
            position: "absolute",
            height: "150px",
            width: "150px",
            "z-index": "100",
        })
        .appendTo($("body"))
        .animate(
            {
                top: cart.offset().top - 50,
                left: cart.offset().left - 50,
                width: 50,
                height: 50,
            },
            1000,
            "easeInOutExpo"
        );

    // Setelah animasi selesai, sembunyikan clone dan lanjutkan proses AJAX
    clone.animate(
        {
            width: 0,
            height: 0,
        },
        function () {
            $(this).detach();
        }
    );
}

function buyNow(productId, quantity = 1) {
    addToCart(productId, quantity, function() {
        // Redirect ke halaman checkout setelah produk berhasil ditambahkan ke keranjang
        window.location.href = baseUrl + "/checkout";
    });
}
