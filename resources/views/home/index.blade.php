<x-appLayout>
    <x-home.header />

    <main>
        <x-home.section.hero />
        <x-home.section.about />
        <x-home.section.features />
        <x-home.section.details />
        <x-home.section.projects />
        <x-home.section.testimonials />
        {{--
        <x-home.section.team /> --}}
        <x-home.section.faq />
        <livewire:contact-form />


    </main>

    <livewire:news-letter />
</x-appLayout>