(function($) {
    'use strict';

    var woocommerce = {};
    qodef.modules.woocommerce = woocommerce;

    woocommerce.qodefInitQuantityButtons = qodefInitQuantityButtons;
    woocommerce.qodefInitSelect2 = qodefInitSelect2;
    woocommerce.qodefInitcheckout = qodefInitcheckout;

    woocommerce.qodefOnDocumentReady = qodefOnDocumentReady;
    woocommerce.qodefOnWindowLoad = qodefOnWindowLoad;
    woocommerce.qodefOnWindowResize = qodefOnWindowResize;
    woocommerce.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefInitQuantityButtons();
        qodefInitSelect2();
        qodefInitcheckout();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {

    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {

    }
    

    function qodefInitQuantityButtons() {

        $(document).on( 'click', '.qodef-quantity-minus, .qodef-quantity-plus', function(e) {
            e.stopPropagation();

            var button = $(this),
                inputField = button.siblings('.qodef-quantity-input'),
                step = parseFloat(inputField.attr('step')),
                max = parseFloat(inputField.attr('max')),
                minus = false,
                inputValue = parseFloat(inputField.val()),
                newInputValue;

            if (button.hasClass('qodef-quantity-minus')) {
                minus = true;
            }

            if (minus) {
                newInputValue = inputValue - step;
                if (newInputValue >= 1) {
                    inputField.val(newInputValue);
                } else {
                    inputField.val(0);
                }
            } else {
                newInputValue = inputValue + step;
                if ( max === undefined ) {
                    inputField.val(newInputValue);
                } else {
                    if ( newInputValue >= max ) {
                        inputField.val(max);
                    } else {
                        inputField.val(newInputValue);
                    }
                }
            }

            inputField.trigger( 'change' );

        });

    }

    function qodefInitSelect2() {

        if ($('.woocommerce-ordering .orderby').length) {

            $('.woocommerce-ordering .orderby').select2({
                minimumResultsForSearch: -1
            });
        }

        if($('select#calc_shipping_country').length) {
            $('select#calc_shipping_country').select2();
        }

        if($('select#calc_shipping_state').length) {
            $('select#calc_shipping_state').select2();
        }

        if($('.qodef-cart-totals').length > 0) {
            $( document.body ).on('updated_shipping_method', function() {
                var select = $('.qodef-cart-totals').find('select#calc_shipping_country');
                if(select.length) {
                    select.select2({});
                }
                var selectState = $('.qodef-cart-totals').find('select#calc_shipping_state');
                if(selectState.length) {
                    selectState.select2({});
                }
            });
        }

        if($('table.variations').length > 0) {
            $('table.variations').find('td.value').each(function() {
                $(this).find('select').select2({
                    minimumResultsForSearch: -1
                }).on("select2-opening", function() { $(this).trigger('focusin'); });
            });
        }

    }

    function qodefInitcheckout() {
        var checkoutHolder  = $('.woocommerce-checkout-review-order');
        if(checkoutHolder.length > 0) {
            checkoutHolder.on('click', 'input[name="payment_method"]', function(){
                if ( $( '.payment_methods input.input-radio' ).length > 1 ) {
                    $('.payment_methods input.input-radio').removeClass("checked");
                    if ( $( this ).is( ':checked' )) {
                        $(this).addClass("checked");
                    }
                }
            });
        }

        var loginHolder = $('#customer_login'); {
            if(loginHolder.length > 0) {
                var checkBox = loginHolder.find('#rememberme');
                checkBox.on('click', function() {
                    if($(this).is(':checked')) {
                        $(this).addClass("checked");
                        $(this).parents('label').addClass("checked");
                    }
                    else {
                        $(this).removeClass("checked");
                        $(this).parents('label').removeClass("checked");
                    }
                });
            }
        }

        $('.input-checkbox').on('click', function() {
            if($(this).is(':checked')) {
                $(this).addClass("checked");
                $(this).siblings('label').addClass("checked");
            }
            else {
                $(this).removeClass("checked");
                $(this).siblings('label').removeClass("checked");
            }
        });
    }


})(jQuery);