@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>
		<textarea
			:data-uuid="field.uuid"
			:name="`${namespace}[${field.slug}]`"
			:value="field.value"
			:placeholder="field.arguments.placeholder"
			class="fielder-field__input"
		></textarea>
	</div>
@stop
