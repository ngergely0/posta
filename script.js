$(document).ready(function () {
    $('#countyDropdown').change(function () {
        var selectedCountyId = $(this).val();
        $.ajax({
            url: 'fetch_cities.php',
            type: 'POST',
            data: { selectedCountyId: selectedCountyId },
            success: function (response) {
                $('#cityDropdown').html(response);
                $('#postalCode').val('');
            }
        });
    });
    $('#cityDropdown').change(function () {
        var selectedCityId = $(this).val();
        $.ajax({
            url: 'fetch_postalcode.php',
            type: 'POST',
            data: { selectedCityId: selectedCityId },
            success: function (response) {
                $('#postalCode').val(response);
            }
        });
    });

});