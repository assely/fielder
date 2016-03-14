import { Field } from 'fielder';

Field.create('fielder-media', {
    /**
     * Field data.
     *
     * @type {Object}
     */
    data: () => ({
        src: '',
        attachment: {},
        defaults: {
            message: '',
            image: {
                empty: 'https://placeholdit.imgix.net/~text?txtsize=27&txt=Empty&w=240&h=180',
                document: 'https://placeholdit.imgix.net/~text?txtsize=27&txt=Document&w=240&h=180'
            }
        }
    }),

    /**
     * Field computed properties.
     *
     * @return {void}
     */
    computed: {
        /**
         * Get media image.
         *
         * @return {String}
         */
        image() {
            if (this.field.value.type) {
                if (this.field.value.type === 'image') {
                    // File have preview. Return his url.
                    return this.field.value.url;
                } else {
                    // File type have not preview. Return common image.
                    return this.defaults.image.document;
                }
            }

            // There is any image. Return default image.
            return this.defaults.image.empty;
        }

    },

    /**
     * Field mounted.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Setup Wordpress media frame.
            this.frame = wp.media({
                frame: 'select',
                multiple: false
            });

            // Bind frame events.
            this.bind();
        });
    },

    /**
     * Field methods.
     *
     * @type {Object}
     */
    methods: {
        /**
         * Bind events for selecting attachment.
         *
         * @return {void}
         */
        bind() {
            var that = this;

            this.frame.state('library').on('select', function() {
                this.get('selection').map(function(attachment) {
                    that.field.value = {
                        id: attachment.get('id'),
                        type: attachment.get('type'),
                        url: attachment.get('url')
                    };
                });
            });
        },

        /**
         * Open media frame.
         *
         * @return {void}
         */
        add() {
            this.frame.open();
        },

        /**
         * Clear field value.
         *
         * @return {void}
         */
        clear() {
            this.field.value = {};
        }
    }
});
