import 'bootstrap';
import $ from "jquery";
window.$ = window.jQuery = $;

$(document).on("click", ".remove-btn", function (e) {
    e.preventDefault();

    if (confirm("Уверены?")){
        let id = parseInt($(this).prop("id").match(/\d+/));
        let type = $(this).prop("id").split("-")[0];

        $.ajax({
            type: "POST",
            url: "/" + type + "/remove/" + id,
        })
            .done(function() {
                location.reload();
            })
            .fail(function(jqXHR, exception) {
                if(exception ==='error'){
                    alert(jqXHR.responseJSON.message);
                }
            });
    }
});
