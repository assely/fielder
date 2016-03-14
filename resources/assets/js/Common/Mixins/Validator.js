import $ from 'jquery';

export default {
    /**
     * When component is attached.
     * Set field element.
     *
     * @return {void}
     */
    mounted: function() {
        this.$nextTick(() => {
            this.element = $(`[data-uuid="${this.field.uuid}"]`);

            if (this.field.validator.rules.length) {
                this.setValidatorAttributes()
            }

            this.setLocale();
            this.initValidator();
        });
    },

    watch: {
        /**
         * Watch field value and
         * validate group.
         *
         * @type {Void}
         */
        'field.value': function() {
            this.parsley.validate({
                group: this.field.uuid
            });
        }
    },

    methods: {
        /**
         * Set validator locale.
         *
         * @return {void}
         */
        setLocale: function() {
            var lang = Assely.locale.split("_")[0];

            window.Parsley.setLocale(lang);
        },

        /**
         * Generate field validate attributes.
         *
         * @return {void}
         */
        setValidatorAttributes: function() {
            this.element.attr('data-parsley-group', this.field.uuid);

            $.each(this.field.validator.attributes, function(name, value) {
                this.element
                    .attr(name, value)
                    .attr('data-parsley-' + name, value);
            }.bind(this));
        },

        /**
         * Init validator and bind success
         * and error events to the field
         *
         * @return {void}
         */
        initValidator: function() {
            this.parsley = this.element.closest('form').parsley({
                trigger: 'change focusout',
                focus: 'none',
                fields: '#Assely field, #Assely textarea, #Assely select',
                excluded: 'field[type=button], field[type=submit], field[type=reset]'
            });

            this.element.parsley().on('field:error', function() {
                return $(this.$element)
                    .closest('.assely-box')
                    .removeClass('is-valid')
                    .addClass('is-invalid');
            });

            this.element.parsley().on('field:success', function() {
                return $(this.$element)
                    .closest('.assely-box')
                    .removeClass('is-invalid')
                    .addClass('is-valid');
            });
        }
    }
}