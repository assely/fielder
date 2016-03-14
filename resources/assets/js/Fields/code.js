import { Field } from 'fielder';

Field.create('fielder-code', {
    /**
     * Field attach.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Setup editor on field element.
            this.editor = ace.edit(`editor-${this.field.uuid}`);

            // Set editor options.
            this.editor.setOptions({
                fontSize: '10pt',
                wrap: 'free',
                maxLines: Infinity,
                highlightActiveLine: true,
                showLineNumbers: true,
                enableEmmet: true,
                enableBasicAutocompletion: true,
                enableSnippets: true,
                enableLiveAutocompletion: false
            });

            // Set editor color theme.
            this.editor.setTheme("ace/theme/iplastic");

            // Set mode argument to the html, if it was not setup.
            if (!this.field.arguments.mode) {
                this.field.arguments.mode = 'html';
            }

            // Set editor mode.
            this.editor.getSession().setMode("ace/mode/" + this.field.arguments.mode);

            // Update field on editor change.
            this.editor.getSession().on('change', this.update);
        });
    },

    /**
     * Field methods.
     *
     * @type {Object}
     */
    methods: {
        /**
         * Set field value on editor change.
         *
         * @return {void}
         */
        update() {
            this.field.value = this.editor.getSession().getValue();
        }
    }
});
