@extends('layouts.portfolio')

@section('content')

<x-portfolio.header />

<main class="main">
        <x-portfolio.section.hero/>
        <x-portfolio.section.about/>
        <x-portfolio.section.skills/>
        <x-portfolio.section.resume/>
        <x-portfolio.section.portfolio/>
        <x-portfolio.section.services/>
        <livewire:portfolio-contact-form/>
</main>

<x-portfolio.footer/>

@endsection