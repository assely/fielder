<span class="assely-column assely-column--checkboxes">
	@if (is_array($value))
		@foreach ($value as $key => $content)
			@if (!empty($content))
				<div>
					<span class="assely-column__icon dashicons dashicons-yes"></span> {{ $content }}
				</div>
			@endif
		@endforeach
	@endif
</span>
