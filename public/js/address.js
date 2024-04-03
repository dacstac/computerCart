$(function () {
    $('.deleteOrder').on('click', function () {
        $('#deleteAddress').attr('action', $(this).data('delete-link'));
    });

    $('.updateOrder').on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
        $.ajax({
            url: 'dataAddress',
            type: 'POST',
            data: {
                'id': $(this).data('id'),
            },
            success: function (response) {
                response.forEach(value => {
                    $('#updateAddress').attr('action', 'address/update/' + value.id);
                    $('#recover').val('address/update/' + value.id);
                    $('#address').val(value.address);
                    $('#cp').val(value.cp);
                    $('#city').val(value.city);
                    $('#province').val(value.province);
                    $('#' + value.country).prop('selected', true);
                });
            }
        });
    });
});