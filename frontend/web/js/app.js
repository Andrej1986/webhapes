'use strict';

if (document.querySelector('.company')) {
    document.querySelector('.company').classList.add('hide-element');
}

if (document.querySelector('#is-company')) {
    document.querySelector('#is-company').addEventListener('click', function () {
        Order.isCompany();
    });
}
