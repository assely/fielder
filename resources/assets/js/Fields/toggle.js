import { Field, Mixins } from 'fielder';

Field.create('fielder-toggle', {
    /**
     * Field mixins.
     *
     * @type {Array}
     */
    mixins: [
        Mixins.props,
        Mixins.create
    ],

    created() {
        this.field.value = this.parseBool(this.field.value);
    }
});
