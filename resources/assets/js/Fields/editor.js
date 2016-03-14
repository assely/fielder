import { Field } from 'fielder';
import $ from 'jquery';

Field.create('fielder-editor', {
    /**
     * Field mounted.
     *
     * @return {void}
     */
    mounted() {
        this.$nextTick(() => {
            // Set current Wordpress locale to the editor.
            Simditor.locale = Assely.locale;

            // Init editor on field element.
            new Simditor({
                textarea: $(`[data-uuid="${this.field.uuid}"]`),
                toolbar: ['title', 'bold', 'italic', 'underline', 'strikethrough', 'color', 'ol', 'ul', 'blockquote', 'code', 'table', 'link', 'hr', 'indent', 'outdent', 'alignment', '|', 'html', 'markdown']
            });
        });
    }
});
