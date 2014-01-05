$(document).ready(function() {
    $("input[mask]").each(function() {
        var mask = $(this).attr('mask');
        $(this).mask(mask, {placeholder: ' '});
    });
});