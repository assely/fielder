import { Field } from 'fielder';

Field.create('fielder-checkboxes', {
    created() {
        for (var key in this.field.value) {
            if ( ! this.field.value.hasOwnProperty(key)) {
                continue;
            }

            this.field.value[key] = this.parseBool(this.field.value[key]);
        }
    }
});
