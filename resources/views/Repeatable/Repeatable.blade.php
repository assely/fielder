@extends('Fielder::template')

@section('content')
	<div
		class="fielder-field"
		:class="`fielder-field--${field.type}`"
	>
		<input
			type="hidden"
			:data-uuid="field.uuid"
			:name="`${namespace}[${field.slug}]`"
			:value="(field.children.fields.length) ? field.children.fields.length : ''"
			data-parsley-required-message="You need to add at least one item."
			data-parsley-min-message="You should have at least %s items."
			data-parsley-max-message="You should have %s or fewer items."
			data-parsley-range-message="You should have beetwen %s and %s items here."
		>

		<div class="pure-g">
			<div class="pure-u-1" v-if=" ! field.children.fields.length">
				<assely-alert>
					<span class="title">
						@{{ field.arguments.messages.empty }}
					</span>
				</assely-alert>
			</div>

			<assely-box
				v-for="(child, index) in field.children.fields"
				:title="field.singular + ' #' + (index+1)"
				:type="field.type"
				:description="field.arguments.description"
				:column="field.arguments.column"
			>
				<ul class="assely-box__buttons">
					<li v-if="!isLast(index)">
						<div @click="moveDown(child)" class="assely-button sm neutral">
							<i class="dashicons dashicons-arrow-down-alt2"></i>
						</div>
					</li>

					<li v-if="!isFirst(index)">
						<div @click="moveUp(child)" class="assely-button sm neutral">
							<i class="dashicons dashicons-arrow-up-alt2"></i>
						</div>
					</li>

					<li>
						<div @click="duplicate(child)" class="assely-button sm neutral">
							<i class="dashicons dashicons-admin-page"></i>
						</div>
					</li>

					<li>
						<div @click="remove(child)" class="assely-button sm neutral">
							<i class="dashicons dashicons-trash"></i>
						</div>
					</li>
				</ul>

				<assely-fields
					:fields="child"
					:namespace="namespace + addIndex(index)"
				></assely-fields>
			</assely-box>

			<div class="pure-u-1">
				<div class="assely-box__footer">
					<div @click="add" class="button button-primary button-large" title="Add item">
						@{{ field.arguments.messages.add }}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
