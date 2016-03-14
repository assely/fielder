@extends('Fielder::template')

@section('content')
	<div>
		<div
			class="fielder-field"
			:class="`fielder-field--${field.type}`"
		>
			<input
				type="text"
				:data-uuid="field.uuid"
				:name="`${namespace}[${field.slug}]`"
				:value="field.value"
				:data-default-color="field.value"
				:data-parsley-errors-container="`#errors-${field.uuid}`"
			/>
		</div>

		<div :id="`errors-${field.uuid}`"></div>
	</div>
@stop
