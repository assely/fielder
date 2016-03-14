import { Field } from 'fielder';
import $ from 'jquery';

Field.create('fielder-timepicker', {
    /**
     * Field mounted.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Get current Wordpress lang.
            var lang = Assely.locale.split("_")[0];
            // Get timepicker regional locale object.
            var locale = $.timepicker.regional[lang];

            // Set locale to timepicker.
            $.timepicker.setDefaults(locale);

            // Init time picker on field element.
            $(`[data-uuid="${this.field.uuid}"]`).timepicker({
                timeFormat: 'HH:mm:ss',
                controlType: 'select',
                oneLine: true,
                onSelect: function() {
                    // Validate field on time select.
                    this.parsley.validate({
                        group: this.field.uuid
                    });
                }.bind(this)
            });
        });
    }
});
