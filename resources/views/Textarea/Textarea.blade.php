@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>
		<textarea
			v-model="field.value"
			:data-uuid="field.uuid"
			:name="`${namespace}[${field.slug}]`"
			:placeholder="field.arguments.placeholder"
			:value="field.value"
			class="fielder-field__input"
			rows="10"
		></textarea>
	</div>
@stop
