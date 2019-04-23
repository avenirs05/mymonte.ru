@extends('layouts.main')

@section('content')	
	<v-app id="inspire">
		<drawer></drawer>
		<toolbar 
			locale="{{ $locale }}"
			phone-main="{{ $phone_main }}"
		></toolbar>		
		<content-main 
			locale="{{ $locale }}" 
			header-main-screen="{{ $header_main_screen }}"
			header-main-content="{{ $header_main_content }}"
			header-areas="{{ $header_areas }}"
			phone-main="{{ $phone_main }}"			
			areas="{{ $areas }}"			
		></content-main>
		
		<footer-component></footer-component>	
	</v-app>
@endsection

