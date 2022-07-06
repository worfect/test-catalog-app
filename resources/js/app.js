import 'bootstrap';
import $ from "jquery";
window.$ = window.jQuery = $;

require('./link');
require('./remove');

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).on("click", ".unbind-tag", function (e) {
    if (confirm("Уверены?")){
        this.parentElement.submit()
    }
});
