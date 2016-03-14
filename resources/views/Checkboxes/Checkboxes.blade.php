@extends('Fielder::template')

@section('content')
	<div>
		<div
			class="fielder-field"
			:class="`fielder-field--${field.type}`"
		>
			<label v-for="(item, key, index) in field.arguments.items">
				<input
					:name="`${namespace}[${field.slug}][${key}]`"
					type="hidden"
					value="0"
				/>

				<input
					v-model="field.value[key]"
					:value="field.value[key]"
					:true-value="true"
					:false-value="false"
					:data-uuid="(index == 0) ? field.uuid : ''"
					:name="`${namespace}[${field.slug}][${key}]`"
					:data-parsley-multiple="field.uuid"
					:data-parsley-errors-container="`#errors-${field.uuid}`"
					type="checkbox"
				/>

				@{{ item }}
			</label>
		</div>

		<div :id="`errors-${field.uuid}`"></div>
	</div>
@stop
