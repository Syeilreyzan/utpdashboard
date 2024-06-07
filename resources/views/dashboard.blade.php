<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col items-center w-full gap-5 p-10">
        {{-- For Pressure --}}
        <livewire:pressure-chart />

        <div class="flex gap-5 w-full h-60">
            {{-- For Temperature --}}
            <livewire:temperature-chart />

            {{-- For CO2 --}}
            <livewire:co2-chart />
        </div>

        <div class="flex gap-5 w-full h-60">
            {{-- For Flow Controller --}}
            <livewire:flow-controller-chart />

            {{-- For Controller --}}
            <livewire:controller-valve />
        </div>

    </div>
</x-app-layout>
