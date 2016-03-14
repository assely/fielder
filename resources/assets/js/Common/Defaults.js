import { Mixins } from './Mixins';

export default {
	/**
	 * Default fields mixins.
	 *
	 * @type {Array}
	 */
    mixins: [
    	Mixins.props,
        Mixins.create,
        Mixins.validator
    ]
}
