import Create from './Mixins/Create';
import Props from './Mixins/Props';
import Validator from './Mixins/Validator';

export let Mixins = {
	/**
	 * Field create mixin.
	 *
	 * @type {Object}
	 */
	create: Create,

	/**
	 * Field props mixin.
	 *
	 * @type {Object}
	 */
	props: Props,

	/**
	 * Field validator mixin.
	 *
	 * @type {Object}
	 */
	validator: Validator
}
