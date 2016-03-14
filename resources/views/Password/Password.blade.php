@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>
		<input
			v-model="field.value"
			:data-uuid="field.uuid"
			:placeholder="field.arguments.placeholder"
			:value="field.value"
			:name="`${namespace}[${field.slug}]`"
			class="fielder-field__input"
			type="password"
		/>
	</div>
@stop
