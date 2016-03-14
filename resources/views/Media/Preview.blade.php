<div class="assely-column assely-column--media">
	@if (is_array($value))
		@if ($value['type'] === 'image')
			<div class="assely-column__img">
				<img src="{{ $value['url'] }}">
			</div>
		@endif

		@if (isset($value['type']))
			<div class="assely-column__img">
				<div class="assely-column__label">
					<small>{{ "." . pathinfo($value['url'], PATHINFO_EXTENSION) }}</small>
				</div>

				<img src="{{ plugins_url('lumber/assets/images/thumb-document.jpg') }}">
			</div>
		@else
			<div class="assely-column__img">
				<div class="assely-column__label">
					<small>No media</small>
				</div>

				<img src="{{ plugins_url('lumber/assets/images/thumb-empty.jpg') }}">
			</div>
		@endif
	@endif
</div>
