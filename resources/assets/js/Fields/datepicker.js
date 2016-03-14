import { Field } from 'fielder';
import $ from 'jquery';

Field.create('fielder-datepicker', {
    /**
     * Field ready.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Get current Wordpress locale.
            var lang = Assely.locale.split("_")[0];
            // Get datepicker locale regional object.
            var locale = $.datepicker.regional[lang];

            // Set locale to the datepicker.
            $.datepicker.setDefaults(locale);

            // Init datepicker on field element.
            $(`[data-uuid="${this.field.uuid}"]`).datepicker({
                dateFormat: "dd.mm.yy",
                altField: `[data-uuid="alt-${this.field.uuid}"]`,
                altFormat: "yy-mm-dd 00:00:00",
                onSelect: function() {
                    // Validate field on date select.
                    this.parsley.validate({
                        group: this.field.uuid
                    });
                }.bind(this)
            });
        });
    },

    /**
     * Field computed properties.
     *
     * @type {Object}
     */
    computed: {
        /**
         * Format field value as date.
         *
         * @return {String}
         */
        date() {
            if (this.field.value) {
                return $.datepicker.formatDate("dd.mm.yy", new Date(this.field.value));
            }
        }
    }
});
