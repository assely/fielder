import { Fielder } from 'fielder';
import _ from 'underscore';
import defaults from '../Common/Defaults';

class Input {
	/**
	 * Create field instance.
	 *
	 * @return {void}
	 */
    create(name, instance = {}) {
    	this.name = name;
        this.instance = _.defaults(instance, defaults);

        this.register();
    }

    /**
     * Register field in Fielder.
     *
     * @return {void}
     */
    register() {
    	Fielder.register(this.name, this.instance);
    }
}

export let Field = new Input();