$(document).ready(function() {
    $("#search-box").keyup(function() {
        var hyperLinkText = $(location).attr('href');
        var arVal = hyperLinkText.split('/');
        newHlink = arVal[0];

        $.ajax({
            type: "POST",
            url: arVal.length > 6 ?  "../../../readCountry.php" : arVal.length > 5 ? "../../readCountry.php" : "../readCountry.php",
            data: 'keyword=' + $(this).val(),
            beforeSend: function() {
                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background", "#FFF");
            }
        });
    });
});

function selectCountry(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
}