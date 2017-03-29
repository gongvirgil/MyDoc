$(function() {

    'use strict';

    //checkbox、radio
    $('input[type="checkbox"], input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });
    //select
    $("select.select2").select2();
    //bootstrap-switch
    $("[name='bootstrap-switch']").bootstrapSwitch();

    //btn-export
    $('.box').on('click', '.btn-export', function(event) {
        var url = $(this).attr('export-url');
        var param = $(this).attr('export-param');
        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: param,
            })
            .done(function(data) {
                console.log(data);
            })
            .fail(function() {
                console.log(111);
            });
    });


    $('.box').on('click', '.btn-close-box', function(event) {
        $(this).parents('.box').addClass('hidden');
    });
    $('.box').on('click', '.btn-delete-list-data', function(event) {

    });
    $('.box').on('click', '.btn-control-box', function(event) {
        var $target_arr = $(this).attr('target-box-id').split(',');
        var $exclude_arr = $(this).attr('exclude-box-id').split(',');
        for (var i = 0; i < $target_arr.length; i++) {
            $('#' + $target_arr[i]).removeClass('hidden');
        }
        for (var i = 0; i < $exclude_arr.length; i++) {
            $('#' + $exclude_arr[i]).addClass('hidden');
        }
    });


    $('.box').on('ifClicked', 'input.check-all', function(event) {
        $(this).parents('.box').find('input.check-all,input.check-single').iCheck($(this).prop('checked') ? 'uncheck' : 'check');
    });
    $('.box').on('ifChanged', 'input.check-single', function(event) {
        var $subs = $(this).parents('.box').find('input.check-single');
        $(this).parents('.box').find('input.check-all').iCheck($subs.length == $subs.filter(':checked').length ? 'check' : 'uncheck');
    });
})
