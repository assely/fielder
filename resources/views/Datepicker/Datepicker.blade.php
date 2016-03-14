@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>
		<input
			:data-uuid="field.uuid"
			:value="date"
			class="fielder-field__input"
			type="text"
			placeholder="00.00.0000"
		/>

		<input
			v-model="field.value"
			:data-uuid="`alt-${field.uuid}`"
			:name="`${namespace}[${field.slug}]`"
			:value="field.value"
			type="hidden"
		>
	</div>
@stop
