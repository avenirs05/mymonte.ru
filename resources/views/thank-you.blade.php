@extends('layouts.main')

@section('content')
<v-app id="inspire">
	<drawer></drawer>
	<toolbar 
		locale="{{ app()->getLocale() }}"
		phone-main="{{ $phone_main }}"
	></toolbar>
	<content-thank-you></content-thank-you>
	<footer-component></footer-component>
</v-app>
@endsection