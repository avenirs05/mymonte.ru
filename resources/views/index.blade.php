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
			phone-main="{{ $phone_main }}"			
		></content-main>
		
		<footer-component></footer-component>	
	</v-app>
@endsection

