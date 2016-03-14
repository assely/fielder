@extends('Fielder::template')

@section('content')
	<div>
		<div
			class="fielder-field"
			:class="`fielder-field--${field.type}`"
		>
			<label v-for="(item, key, index) in field.arguments.items">
				<input
					v-model="field.value"
					:value="key"
					:data-uuid="(index == 0) ? field.uuid : ''"
					:name="`${namespace}[${field.slug}]`"
					:data-parsley-multiple="field.uuid"
					:data-parsley-errors-container="`#errors-${field.fingerprint}`"
					type="radio"
				>

				@{{ item }}
			</label>
		</div>

		<div :id="`errors-${field.fingerprint}`"></div>
	</div>
@stop
