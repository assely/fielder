@extends('Fielder::template')

@section('content')
	<div>
		<div
			class="fielder-field"
			:class="`fielder-field--${field.type}`"
		>
			<input
				type="hidden"
				:name="`${namespace}[${field.slug}]`"
				value="0"
			>

			<input
				v-model="field.value"
				type="checkbox"
				class="fielder-field__input"
				:id="field.uuid"
				:data-uuid="field.uuid"
				:name="`${namespace}[${field.slug}]`"
				:value="field.value"
				:true-value="true"
				:false-value="false"
			>

			<label :for="field.uuid"></label>

			@{{ (field.value) ? 'On' : 'Off' }}
		</div>
	</div>
@stop
