$(document).ready(function() {

    $(document).on('click', '.card-item', function() {
        $.ajax({
            type: "POST",
            datatype: 'json',
            url: "getDataBug.php",
            data: {
                id: $(this).attr('id')
            },
            async: false,
            success: function(result) {
                dataF = result;

                console.log(result)
                $("#card-pest").empty();
                $("#card-pest").append(dataF);
            }
        })
    });

    // insert submit
    $(document).on('click', '.insertSubmit', function(e) {

        let name = $("input[name='name_insert']");
        let alias = $("input[name='alias_insert']");
        let styleChar = $("input[name='charactor_insert']");
        let styleDanger = $("input[name='danger_insert']");
        let icon = $("#pic-logo");
        let picstyle = $("#pic-style-char");
        let picdan = $("#pic-danger");

        let dataNull = [name, alias, styleChar, styleDanger, icon, picstyle, picdan]

        if (!checkNull(dataNull)) return;
        if (!checkSameName(name, -1)) return;
        if (!checkSameAlias(alias, -1)) return;
        if (!checkSameName(styleChar, -1)) return;
        if (!checkSameAlias(styleDanger, -1)) return;

        console.log('insert');
        let form = new FormData($('#form-insert')[0]);
        //insertF(form);
    })

    // Configure/customize these variables.
    var showChar = 100; // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less";

    $('.more').each(function() {
        var content = $(this).html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h +
                '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $(this).html(html);
        }

    });

    $('#addInsect').click(function() {
        console.log('fffff')
        $('.Modal').append(addModal);
        $('#addModal').modal('show');
    });
});