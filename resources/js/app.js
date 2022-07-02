import 'bootstrap';
import $ from "jquery";
window.$ = window.jQuery = $;

require('./link');

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).on("click", ".need-confirm-del", function (e) {
    if (confirm("Уверены?")){
        this.parentElement.submit()
    }
});
