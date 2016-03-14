import { Field } from 'fielder';
import $ from 'jquery';

Field.create('fielder-colorpicker', {
    /**
     * Field attach.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Init colorpicker on field element.
            $(`[data-uuid="${this.field.uuid}"]`).wpColorPicker({
                clear: this.clear,
                change: this.change
            });
        });
    },

    /**
     * Field methods.
     *
     * @type {Object}
     */
    methods: {

        /**
         * Clear field value.
         *
         * @return {void}
         */
        clear() {
            this.field.value = '';

            this.change();
        },

        /**
         * Validate field on value change.
         *
         * @return {void}
         */
        change() {
            this.parsley.validate({
                group: this.field.uuid
            });
        }

    }
});
