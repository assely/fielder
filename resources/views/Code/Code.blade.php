@extends('Fielder::template')

@section('content')
	<div>
		<div
			class="fielder-field"
			:class="`fielder-field--${field.type}`"
		>
			<pre :id="`editor-${field.uuid}`" :data-uuid="`editor-${field.uuid}`">@{{ field.value }}</pre>
		</div>

		<input
			:id="field.uuid"
			:data-uuid="field.uuid"
			:name="`${namespace}[${field.slug}]`"
			:value="field.value"
			type="hidden"
			class="assely-field__field"
		>
	</div>
@stop
