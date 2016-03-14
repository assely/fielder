@extends('Fielder::template')

@section('content')
	<div class="fielder-media">
		<div class="fielder-media__photo">
			<img :src="image">
		</div>

		<div class="fielder-media__content">
			<i>Url:</i>

			<br>

			<div
				class="fielder-field"
				:class="`fielder-field--${field.type}`"
			>
				<input
					:data-uuid="field.uuid"
					:value="(field.value.url) ? field.value.url : defaults.message"
					type="text"
					class="fielder-field__input"
					readonly
				/>
			</div>

			<br>

			<div class="button button-primary button-large" @click="add">
				Add media
			</div>

			<div class="button button-large" @click="clear">
				Clear
			</div>
		</div>

		<input
			v-for="(prop, key, index) in field.value"
			:name="`${namespace}[${field.slug}][${key}]`"
			:value="prop"
			type="hidden"
		/>
	</div>
@stop
