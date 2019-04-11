@extends('layouts.main')

@section('content')
	<v-app id="inspire">
		<drawer></drawer>
		<toolbar 
			locale="{{ app()->getLocale() }}" 
			phone-main="{{ $phone_main }}"
		></toolbar>
		<content-feedbacks
			locale="{{ app()->getLocale() }}"
			feedbacks-json="{{ $feedbacks }}"
		></content-feedbacks>
		<footer-component></footer-component>
	</v-app>
@endsection