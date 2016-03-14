import { Field, Mixins } from 'fielder';

Field.create('fielder-tinymce', {
    /**
     * Field mixins.
     *
     * @type {Array}
     */
    mixins: [
        Mixins.props,
        Mixins.create
    ]
});
