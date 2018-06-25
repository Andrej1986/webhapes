'use strict';
let Cart = (function () {
    let totalItemPrice = function (id, itemAmount) {
        let price = $('.site-cart .item-' + id + '-price span').text();
        if ($('.item-' + id + '-category').val() != 'na mieru') {
            return $('.site-cart .item-' + id + '-total span').html(Number(price) * Number(itemAmount.text()));
        }
        return $('.site-cart .item-' + id + '-total span').html(Number(price));

    };

    let increaseCartItem = function (id, url) {
        event.preventDefault();
        let itemAmount = $('.site-cart .item-' + id + '-amount span');
        $.ajax({
            url: url,
            data: {itemAmount: itemAmount.text(), id: id},
            method: 'POST',
            success: function (data) {
                itemAmount.html(data);
                totalItemPrice(id, itemAmount);
            }

        });
    };
    let decreaseCartItem = function (id, url) {
        event.preventDefault();
        let itemAmount = $('.site-cart .item-' + id + '-amount span');

        $.ajax({
            url: url,
            data: {itemAmount: itemAmount.text(), id: id},
            method: 'POST',
            success: function (data) {
                itemAmount.html(data);
                totalItemPrice(id, itemAmount);
                if (itemAmount.text() == '0') {
                    $('.site-cart .cart-item-' + id).remove();
                }
            }

        });
    };
    let removeCartItem = function (id, url) {
        event.preventDefault();
        let itemAmount = $('.site-cart .item-' + id + '-amount span');
        $.ajax({
            url: url,
            data: {itemAmount: itemAmount.text(), id: id},
            method: 'POST',
            success: function (data) {
                itemAmount.html(data);
                $('.site-cart .cart-item-' + id).remove();
                totalItemPrice(id, itemAmount);
            }

        });
    };

    return {
        increaseCartItem: increaseCartItem,
        decreaseCartItem: decreaseCartItem,
        removeCartItem: removeCartItem

    }

}());