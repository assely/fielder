import { Field } from 'fielder';

Field.create('fielder-repeatable', {
    /**
     * Watch field values.
     *
     * @type {Object}
     */
    watch: {
        /**
         * Validate field when filtered items change.
         *
         * @return {void}
         */
        'field.children.fields': function() {
            this.parsley.validate({
                group: this.field.uuid
            });
        }
    },

    /**
     * Field methods.
     *
     * @type {Object}
     */
    methods: {
        /**
         * Clone childrem item schema.
         *
         * @param {Object} schema
         * @return {Object}
         */
        clone(schema) {
            return JSON.parse(JSON.stringify(schema));
        },


        /**
         * Add children items to the field.
         *
         * @return {Array}
         */
        add() {
            return this.field.children.fields.push(this.clone(this.field.children.schema));
        },


        /**
         * Remove children item from the field.
         *
         * @param {Object} item
         * @return {Array}
         */
        remove(item) {
            var index = this.field.children.fields.indexOf(item);

            return this.field.children.fields.splice(index, 1);
        },


        /**
         * Duplicate children item and add him to the field.
         *
         * @param {Object} item
         * @return {Array}
         */
        duplicate(item) {
            return this.field.children.fields.push(this.clone(item));
        },


        /**
         * Move up children item in collection.
         *
         * @param {Object} item
         * @param {Integer} by
         * @return {Array}
         */
        moveUp(item, by) {
            var index = this.field.children.fields.indexOf(item);
            var newPos = index - (by || 1);

            if (newPos < 0) {
                newPos = 0;
            }

            this.field.children.fields.splice(index, 1);

            return this.field.children.fields.splice(newPos, 0, item);
        },


        /**
         * Move down children item in collection.
         *
         * @param  {Object} item
         * @param  {int} by
         * @return {Array}
         */
        moveDown(item, by) {
            var index = this.field.children.fields.indexOf(item);
            var newPos = index + (by || 1);

            if (newPos >= this.field.children.fields.length) {
                newPos = this.field.children.fields.length;
            }

            this.field.children.fields.splice(index, 1);

            return this.field.children.fields.splice(newPos, 0, item);
        },


        /**
         * Check if children item index is first.
         *
         * @param {Integer} index
         * @return {Boolean}
         */
        isFirst(index) {
            return index === 0;
        },


        /**
         * Check if children item index is last.
         *
         * @param {Integer} index
         * @return {Boolean}
         */
        isLast(index) {
            return index === (this.field.children.fields.length - 1);
        }
    }
});
