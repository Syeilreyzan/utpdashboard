<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-2 items-center w-full gap-5 p-10">
        <div class="w-[100%] flex flex-col gap-3 bg-blue-50 rounded-xl pb-5 px-4">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="">
                    <p class="text-xl font-bold">{{  __('CO2').' ('.$equipment_type.')'  }}</p>
                    <p>{{ __('Current Value: ') }}{{ number_format(end($values), 0) }}&nbspCO<sub>2</sub></p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modal.co2Modal', arguments: { node_id: 1 } })"
                    class="bg-blue-500 text-white rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 cursor-pointer">
                    {{ __('Show Table') }}
                </button>
            </div>
            <canvas id="lineChart"></canvas>
        </div>
        <div class="w-[100%] flex flex-col gap-3 bg-purple-50 rounded-xl pb-5 px-4">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="">
                    <p class="text-xl font-bold">{{ __('Celcius').' ('.$equipment_type2.')' }}</p>
                    <p>{{ __('Current Value: ') }}{{ number_format(end($values2), 0) }} &deg;C</p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modal.co2Modal', arguments: { node_id: 2 } })"
                    class="bg-purple-500 text-white rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 cursor-pointer">
                    {{ __('Show Table') }}
                </button>
            </div>
            <canvas id="lineChart2"></canvas>
        </div>
        <div class="w-[100%] flex flex-col gap-3 bg-red-50 rounded-xl pb-5 px-4">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="">
                    <p class="text-xl font-bold">{{ __('Pressure').' ('.$equipment_type3.')' }}</p>
                    <p>{{ __('Current Value: ') }}{{ number_format(end($values3), 0) }} psi</p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modal.co2Modal', arguments: { node_id: 3 } })"
                    class="bg-red-500 text-white rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 cursor-pointer">
                    {{ __('Show Table') }}
                </button>
            </div>
            <canvas id="lineChart3"></canvas>
        </div>
        <div class="w-[100%] flex flex-col gap-3 bg-red-50 rounded-xl pb-5 px-4">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="">
                    <p class="text-xl font-bold">{{ __('Pressure').' ('.$equipment_type4.')' }}</p>
                    <p>{{ __('Current Value: ') }}{{ number_format(end($values4), 0) }} psi</p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modal.co2Modal', arguments: { node_id: 4 } })"
                    class="bg-red-500 text-white rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 cursor-pointer">
                    {{ __('Show Table') }}
                </button>
            </div>
            <canvas id="lineChart4"></canvas>
        </div>
        <div class="w-[100%] flex flex-col gap-3 bg-green-50 rounded-xl pb-5 px-4">
            <div class="flex items-center justify-between px-6 py-3">
                <div class="">
                    <p class="text-xl font-bold">{{ __('Power of Hydrogen').' ('.$equipment_type4.')' }}</p>
                    <p>{{ __('Current Value: ') }}{{ number_format(end($values5), 0) }} pH</p>
                </div>
                <button
                    onclick="Livewire.dispatch('openModal', { component: 'modal.co2Modal', arguments: { node_id: 5 } })"
                    class="bg-green-500 text-white rounded-lg px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 cursor-pointer">
                    {{ __('Show Table') }}
                </button>
            </div>
            <canvas id="lineChart5"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: {!! json_encode($titleNode) !!},
                    data: {!! json_encode($values) !!},
                    backgroundColor: 'rgba(0, 18, 199, 0.5)',
                    borderColor: 'rgba(0, 18, 199, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx2 = document.getElementById('lineChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels2) !!},
                datasets: [{
                    label: {!! json_encode($titleNode2) !!},
                    data: {!! json_encode($values2) !!},
                    backgroundColor: 'rgba(184, 0, 199, 0.5)',
                    borderColor: 'rgba(184, 0, 199, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx3 = document.getElementById('lineChart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels3) !!},
                datasets: [{
                    label: {!! json_encode($titleNode3) !!},
                    data: {!! json_encode($values3) !!},
                    backgroundColor: 'rgba(199, 0, 78, 0.5)',
                    borderColor: 'rgba(199, 0, 78, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx4 = document.getElementById('lineChart4').getContext('2d');
        var myChart4 = new Chart(ctx4, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels4) !!},
                datasets: [{
                    label: {!! json_encode($titleNode4) !!},
                    data: {!! json_encode($values4) !!},
                    backgroundColor: 'rgba(199, 0, 78, 0.5)',
                    borderColor: 'rgba(199, 0, 78, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctx5 = document.getElementById('lineChart5').getContext('2d');
        var myChart5 = new Chart(ctx5, {
            type: 'line',
            data: {
                labels: {!! json_encode($labels5) !!},
                datasets: [{
                    label: {!! json_encode($titleNode5) !!},
                    data: {!! json_encode($values5) !!},
                    backgroundColor: 'rgba(15, 199, 0, 0.5)',
                    borderColor: 'rgba(15, 199, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</x-app-layout>
