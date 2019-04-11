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
			areas="{{ $areas }}"
			questions="{{ $questions }}"
			phone-main="{{ $phone_main }}"			
			>
			<template slot="areas">{!! $areas !!}</template>
			<template slot="questions">{!! $questions !!}</template>
			<template slot="products">{!! $products !!}</template>
		</content-main>
		
		<footer-component></footer-component>	
	</v-app>
@endsection

