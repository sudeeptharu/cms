/**
 once a wise man told you need to work hard !!!
 * **/

$(function () {

    $("#edit_ledger_group").on("shown.bs.modal", function (e) {
        const modal = $(this);
        const link = $(e.relatedTarget);
        const id = link.data("id");
        const title = link.data("title");
        const classification_identifier = link.data("classification_identifier");
        const parent_identifier = link.data("parent_identifier");
        const negative_identifier = link.data("negative_identifier");
        const identifier = link.data("identifier");
        const affects_gross_profit = link.data("affects_gross_profit");

        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
        modal.find(".modal-body #identifier").val(identifier);
        modal.find(".modal-body #classification_identifier").html("");
        modal.find(".modal-body #parent_identifier").html("");
        modal.find(".modal-body #negative_identifier").html("");
        const radioYes = modal.find(".modal-body input[name='affects_gross_profit'][value='1']");
        const radioNo = modal.find(".modal-body input[name='affects_gross_profit'][value='0']");

        if (affects_gross_profit === "1") {
            radioYes.prop("checked", true);
        } else {
            radioNo.prop("checked", true);
        }
        $.ajax({
            url: "/ledger/group_identifier",
            type: "get",
            data: { _token: $("input[name='_token']").val(), _method: "get" },
            success: function (response) {
                modal.find(".modal-body #negative_identifier").append(
                    $("<option>", {
                        value: "",
                        text: "select one"
                    })
                );
                response.forEach(function (data) {
                    modal.find(".modal-body #negative_identifier").append(
                        $("<option>", {
                            value: data.identifier,
                            text: data.title,
                        })
                    );
                });
                modal
                    .find(`.modal-body #negative_identifier option[value=${negative_identifier}]`)
                    .prop("selected", "selected")
                    .change();
            },
        });
        if(classification_identifier!=''){
            $.ajax({
                url: "/ledger/classification_identifier",
                type: "get",
                data: { _token: $("input[name='_token']").val(), _method: "get" },
                success: function (response) {
                    modal.find(".modal-body #classification_identifier").append(
                        $("<option>", {
                            value: "",
                            text: ""
                        })
                    );
                    response.forEach(function (data) {
                        modal.find(".modal-body #classification_identifier").append(
                            $("<option>", {
                                value: data.identifier,
                                text: data.title,
                            })
                        );
                    });
                    modal
                        .find(`.modal-body #classification_identifier option[value=${classification_identifier}]`)
                        .prop("selected", "selected")
                        .change();
                },
            });

        }else{
            $.ajax({
                url: "/ledger/group_identifier",
                type: "get",
                data: { _token: $("input[name='_token']").val(), _method: "get" },
                success: function (response) {
                    response.forEach(function (data) {
                        modal.find(".modal-body #parent_identifier").append(
                            $("<option>", {
                                value: data.identifier,
                                text: data.title,
                            })
                        );
                    });
                    modal
                        .find(`.modal-body #parent_identifier option[value=${parent_identifier}]`)
                        .prop("selected", "selected")
                        .change();
                },
            });
        }
    });

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

$(document).ready(function() {
    $('#classification_identifier').change(function() {
        $('#parent_identifier').prop('disabled', $(this).val() !== "");
    });

    $('#parent_identifier').change(function() {
        $('#classification_identifier').prop('disabled', $(this).val() !== "");
    })

    $(document).on('keyup', '#title', function() {
        var value = $(this).val().toUpperCase();
        value = value.replace(/\s+/g, '-');
        $('#identifier').val(value);
    });

});

// function calculateSum(){
//     const crAmountFields = document.getElementsByClassName('cr_amount');
//     const crAmounts = Array.from(crAmountFields).map(field => parseFloat(field.value) || 0);
//     const drAmountField = document.getElementById('dr_amount');
//
//     const drAmount = crAmounts.reduce((acc, curr) => acc + curr, 0);
//     drAmountField.value = drAmount;
// }

$(document).ready(function() {
    const selectElement = $('.ledger-selector');
    function getDataFromAttribute() {
        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: ['ledgers'],
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(selectElement);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$(document).ready(function() {
    const cashBankSelector = $('.cash-bank-ledger-selector');
    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['CASH','BANK']
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(cashBankSelector);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$(document).ready(function() {
    const creditorDebitorSelctor = $('.creditor-debitor-ledger-selector');
    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['DEBTOR-CREDITOR']
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(creditorDebitorSelctor);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$(document).ready(function() {
    const cashBankCreditorDebitorSelctor = $('.cash-bank-creditor-debitor-ledger-selector');
    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['CASH','BANK','DEBTOR-CREDITOR']
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(cashBankCreditorDebitorSelctor);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$(document).ready(function() {
    const salesTaxSelctor = $('.sales-tax-ledger-selector');
    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['SALES','TAX']
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(salesTaxSelctor);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$(document).ready(function() {
    const purchaseTaxSelctor = $('.purchase-tax-ledger-selector');
    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['PURCHASE','TAX']
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(purchaseTaxSelctor);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});

$("#addCrContra").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Cr',value:0},
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }
    crDisabled.selectedIndex=0;

    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control cr_amount" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addCrBoxInContra').appendChild(newCrBox);
    const selectElement = $('.cash-bank-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['CASH','BANK'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addDcJournal").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Cr',value:0},
        {text:'Dr',value:1}
    ];

    for(var i=0;i<2;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }

    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]";

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addLedgerBoxInJournal').appendChild(newCrBox);

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: ['ledgers'],
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addCrPayment").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Cr',value:0},
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }
    crDisabled.selectedIndex=0;

    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addCrBoxInPayment').appendChild(newCrBox);
    const selectElement = $('.cash-bank-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['CASH','BANK'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addDrPurchase").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Dr',value:1}
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);

    }
    crDisabled.selectedIndex=0;


    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addDrBoxInPurchase').appendChild(newCrBox);
    const selectElement = $('.purchase-tax-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['PURCHASE','TAX'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addDrReceipt").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Dr',value:1}
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }
    crDisabled.selectedIndex=0;


    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addDrBoxInReceipt').appendChild(newCrBox);
    const selectElement = $('.cash-bank-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['CASH','BANK'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addCrSales").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]"

    var options=[
        {text:'Cr',value:0},
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }
    crDisabled.selectedIndex=0;

    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]"" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addCrBoxInSales').appendChild(newCrBox);
    const selectElement = $('.sales-tax-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['SALES','TAX'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});
$("#addDrNoteSales").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var drDisabled=document.createElement('select');
    drDisabled.classList.add('form-control');
    drDisabled.name="dc[]";
    var options=[
        {text:'Dr',value:1}
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        drDisabled.add(option);
    }
    drDisabled.selectedIndex=0;

    var drDisabledDiv=document.createElement('div');
    drDisabledDiv.classList.add('col-1');
    drDisabledDiv.appendChild(drDisabled);

    var newDrSelect = document.createElement('select');
    newDrSelect.classList.add('form-control');
    newDrSelect.name="ledger_id[]";

    var newDrDiv=document.createElement('div');
    newDrDiv.classList.add('col-5');
    newDrDiv.appendChild(newDrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newDrBox = document.createElement('div');
    newDrBox.classList.add('addDrBox', 'row');
    newDrBox.appendChild(drDisabledDiv);
    newDrBox.appendChild(newDrDiv);
    newDrBox.appendChild(newAmountDiv);
    newDrBox.appendChild(deleteBtn);

    document.getElementById('addDrBoxInNoteSales').appendChild(newDrBox);
    const selectElement = $('.sales-tax-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['SALES','TAX'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newDrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();

});
$("#addCrDebitNote").on("click", function () {
    var deleteBtn = document.createElement('button');
    deleteBtn.innerText = 'Delete';
    deleteBtn.classList.add('deleteBtn','btn','btn-danger');
    deleteBtn.addEventListener('click', function () {
        this.parentNode.remove();
    });

    var crDisabled=document.createElement('select');
    crDisabled.classList.add('form-control');
    crDisabled.name="dc[]";
    var options=[
        {text:'Cr',value:0},
    ];

    for(var i=0;i<1;i++){
        var option=document.createElement('option');
        option.text=options[i].text
        option.value=options[i].value
        crDisabled.add(option);
    }
    crDisabled.selectedIndex=0;

    var crDisabledDiv=document.createElement('div');
    crDisabledDiv.classList.add('col-1');
    crDisabledDiv.appendChild(crDisabled);

    var newCrSelect = document.createElement('select');
    newCrSelect.classList.add('form-control');
    newCrSelect.name="ledger_id[]"

    var newCrDiv=document.createElement('div');
    newCrDiv.classList.add('col-5');
    newCrDiv.appendChild(newCrSelect);

    var newAmountDiv = document.createElement('div');
    newAmountDiv.classList.add('col-5');
    newAmountDiv.innerHTML = `
        <div class="form-group">
            <input type="number" class="form-control" name="amount[]" id="amount" placeholder="Enter Amount"  autocomplete="off">
        </div>
    `;

    var newCrBox = document.createElement('div');
    newCrBox.classList.add('addCrBox', 'row');
    newCrBox.appendChild(crDisabledDiv);
    newCrBox.appendChild(newCrDiv);
    newCrBox.appendChild(newAmountDiv);
    newCrBox.appendChild(deleteBtn);

    document.getElementById('addCrBoxInDebitNote').appendChild(newCrBox);
    const selectElement = $('.sales-tax-ledger-selector');

    function getDataFromAttribute() {

        $.ajax({
            url: "/ledgerbytype",
            type: "get",
            data: {
                types: ['SALES','TAX'],
            },
            success: function (data, textStatus, xhr) {
                if (xhr.status === 200) {

                    data.data.forEach((ledger)=>{
                        let optionTag = $("<option>")
                        optionTag.prop({
                            value: ledger.id,
                            text: ledger.title
                        })
                        optionTag.appendTo(newCrSelect);
                    })
                }
            },
        });
    }

    getDataFromAttribute();
});






















