class BillingPartyForm {
    constructor(form) {
        this.form = form;

        this.initialise();
    }

    initialise() {
        this.initPartyType();
    }

    initPartyType() {
        this.typeElementTabs = this.form.find('#party-type-tabs');
        const tabEl = this.typeElementTabs.find('a[data-bs-toggle="tab"]')
        console.log(tabEl);
        tabEl.each(function () {
            console.log($(this));
            console.log($(this)[ 0 ]);
            $(this)[ 0 ].addEventListener('shown.bs.tab', event => {
                $(event.target).find('input').prop('checked', true);
            });
        });
    }
}


document.addEventListener("DOMContentLoaded", function () {

    $(document).ready(function () {
        try {
            let form = $('form.mkt_billing_party_form');
            if (form.length) {
                new BillingPartyForm(form);
            }
        } catch (ex) {
        }
    });
});
