import 'bootstrap';
import $ from "jquery";
window.$ = window.jQuery = $;

const linkModal = document.getElementById('linkModalToggle');
if(linkModal){
    linkModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget;

        let id = button.getAttribute('data-bs-id');
        let title = button.getAttribute('data-bs-title');
        let url = button.getAttribute('data-bs-url');
        let material = button.getAttribute('data-bs-material');

        let idInput = linkModal.querySelector('.modal-body .linkId');
        let titleInput = linkModal.querySelector('.modal-body .linkTitle');
        let urlInput = linkModal.querySelector('.modal-body .linkUrl');

        titleInput.value = title;
        urlInput.value = url;

        let form = linkModal.querySelector('.modal-content form');
        if(id){
            idInput.value = id;
            form.action = window.location.origin + '/link/' + id + '/update';
        }
        else{
            idInput.value = material;
            form.action = window.location.origin + '/link/store';
        }

        $(form).find(".invalid-feedback").remove();
        $(form).find(".is-invalid").removeClass("is-invalid");
    })
}

$(document).on("submit", ".link-modal-form", function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: e.target.action,
        data: $(e.target).serialize(),
        dataType: "json",
    })
    .done(function() {
        location.reload();
    })
    .fail(function(jqXHR, exception) {

        if(exception ==='error'){
            let errors = jqXHR.responseJSON.errors;

            $.each(errors, function (name, message) {
                $(e.target).find(".invalid-feedback").remove();

                let span = document.createElement("span");
                let strong = document.createElement("strong");
                let field = $("[name = " + name + "]");

                strong.innerHTML = message;

                $(span)
                    .attr({ class: "invalid-feedback", role: "alert" })
                    .html(strong);

                field.addClass("is-invalid").after(span);
            });
        }
    });
});
