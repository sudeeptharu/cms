/**
 once a wise man told you need to work hard !!!
 * **/

$(function () {


    $("#edit_slider").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const description = link.data("description");
        const url = link.data("url");
        const order = link.data("order");
        const is_published = link.data("is_published");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #description").val(description);
        modal.find(".modal-body #url").val(url);
        modal.find(".modal-body #order").val(order);
        modal.find(".modal-body #is_published").prop("checked", is_published === 1);


    });

    $("#edit_category").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
    });
    $("#edit_gallery").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const description = link.data("description");
        const is_published = link.data("is_published");


        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #description").val(description);
        modal.find(".modal-body #is_published").prop("checked", is_published === 1);
    });
    $("#edit_video ").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const url = link.data("url");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #url").val(url);
    });
    $("#edit_scroller ").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const url = link.data("url");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #url").val(url);
    });
    $("#edit_post").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const description = link.data("description");
        const subtitle = link.data("subtitle");
        const draft = link.data("draft");
        const quote = link.data("quote");
        const excerpt = link.data("excerpt");
        const image = link.data("image");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #description").val(description);
        modal.find(".modal-body #subtitle").val(subtitle);
        modal.find(".modal-body #draft").prop("checked", draft === 1);
        modal.find(".modal-body #quote").val(quote);
        modal.find(".modal-body #excerpt").val(excerpt);
        modal.find(".modal-body #image").val(image);
    });
    $("#edit_page").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const description = link.data("description");
        const subtitle = link.data("subtitle");
        const quote = link.data("quote");
        const excerpt = link.data("excerpt");
        const image = link.data("image");
        const slug = link.data("slug");
        const draft = link.data("draft");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #description").val(description);
        modal.find(".modal-body #subtitle").val(subtitle);
        modal.find(".modal-body #quote").val(quote);
        modal.find(".modal-body #excerpt").val(excerpt);
        modal.find(".modal-body #image").val(image);
        modal.find(".modal-body #slug").val(slug);
        modal.find(".modal-body #draft").prop("checked", draft === 1);

    });
    $("#edit_service").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const description = link.data("description");
        const icon = link.data("icon");
        const excerpt = link.data("excerpt");
        const image = link.data("image");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #description").val(description);
        modal.find(".modal-body #icon").val(icon);
        modal.find(".modal-body #excerpt").val(excerpt);
        modal.find(".modal-body #image").val(image);
    });
    $("#edit_web_setting").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const key = link.data("key");
        const value = link.data("value");
        const image = link.data("image");
        const align = link.data("align");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #key").val(key);
        modal.find(".modal-body #value").val(value);
        modal.find(".modal-body #image").val(image);
        modal.find(".modal-body #align").val(align);
    });
    $("#edit_menu").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const title = link.data("title");
        const is_published = link.data("is_published");
        const opens_in_new_tab = link.data("opens_in_new_tab");
        const url = link.data("url");
        const parent_id = link.data("parent_id");
        const order = link.data("order");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #is_published").val(is_published);
        modal.find(".modal-body #opens_in_new_tab").val(opens_in_new_tab);
        modal.find(".modal-body #url").val(url);
        modal.find(".modal-body #parent_id").val(parent_id);
        modal.find(".modal-body #order").val(order);
    });
    $("#edit_link").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const social = link.data("social");
        const icon = link.data("icon");
        const url = link.data("url");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #social").val(social);
        modal.find(".modal-body #icon").val(icon);
        modal.find(".modal-body #url").val(url);
    });
});

// $(document).ready(function() {
//     $('#classification_identifier').change(function() {
//         $('#parent_identifier').prop('disabled', $(this).val() !== "");
//     });
//
//     $('#parent_identifier').change(function() {
//         $('#classification_identifier').prop('disabled', $(this).val() !== "");
//     })
//
//     $(document).on('keyup', '#title', function() {
//         var value = $(this).val().toUpperCase();
//         value = value.replace(/\s+/g, '-');
//         $('#identifier').val(value);
//     });
//
// });

// function calculateSum(){
//     const crAmountFields = document.getElementsByClassName('cr_amount');
//     const crAmounts = Array.from(crAmountFields).map(field => parseFloat(field.value) || 0);
//     const drAmountField = document.getElementById('dr_amount');
//
//     const drAmount = crAmounts.reduce((acc, curr) => acc + curr, 0);
//     drAmountField.value = drAmount;
// }






















