@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>

		<input
			class="fielder-field__input"
			v-model="field.value"
			:data-uuid="field.uuid"
			:value="field.value"
			:name="`${namespace}[${field.slug}]`"
			type="text"
			placeholder="00:00:00"
		/>
	</div>
@stop
