import Vue from 'vue';

class Engine {
	/**
	 * Construct Fielder Engine.
	 *
	 * @return {void}
	 */
	constructor() {
		this.components = [];
	}

	/**
	 * Register new component inside Fielder.
	 *
	 * @param  {String} name
	 * @param  {Object} instance
	 * @return {void}
	 */
    register(name, instance) {
    	this.components.push({name, instance});

        Vue.component(name, instance);
    }
}

export let Core = new Engine;
