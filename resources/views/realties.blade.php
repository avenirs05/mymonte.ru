@extends('layouts.main')

@section('content')
	<v-app id="inspire">
		<drawer></drawer>
		
		<toolbar 
			locale="{{ app()->getLocale() }}" 
			phone-main="{{ $phone_main }}"			
		></toolbar>
		
		<content-realties 
			locale="{{ app()->getLocale() }}"
			realties-json="{{ $realties }}"
			title="{{ $title }}"
		></content-realties>
		
		<footer-component></footer-component>
	</v-app>
	
@endsection