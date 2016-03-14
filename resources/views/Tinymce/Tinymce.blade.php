@extends('Fielder::template')

@section('content')

<?php wp_editor('{{ field.value }}', $fingerprint, [
    'textarea_name' => '`${namespace}[${field.slug}]`',
])?>

@stop
