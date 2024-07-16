<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="p-3 flex flex-col gap-3">
        <div class="flex flex-col gap-1.5">
            <h1>Equipment Label: <span class="font-semibold">{{ $equipment_label }}</span></h1>
            <h1>Equipment Type: <span class="font-semibold">{{ $equipment_type }}</span></h1>
            <p>Current Value: <span class=" font-semibold">{{ number_format($latestNodeParameter->current_value, 0).' '.$unit_of_measurement }}</span></p>
        </div>
        @if (!empty($datas))
            <div class="h-full w-full rounded-xl overflow-x-auto max-h-[500px] z-0 pb-10">
                <table class="min-w-full text-left border border-separate border-spacing-0.5 rounded-xl">
                    <thead class="{{ $bg_color['thead'] }}">
                        <th class="p-1.5 rounded-tl-xl text-center">{{ __('No.') }}</th>
                        <th class="p-1.5 capitalize">{{ $unit_of_measurement.__(' value') }}</th>
                        <th class="p-1.5 rounded-tr-xl">{{ __('Date Time') }}</th>
                    </thead>
                    <tbody class="text-sm">
                        @foreach ($datas as $data)
                        <tr class="{{ $loop->even ? $bg_color['trOdd'] : $bg_color['trEven'] }}">
                            <td class="p-1.5 border text-center {{ $loop->last ? 'rounded-bl-xl': 'border-b' }}">{{ $loop->iteration }}</td>
                            <td class="p-1.5 border text-center">{{ number_format($data->current_value, 0) }}</td>
                            <td class="p-1.5 border {{ $loop->last ? 'rounded-br-xl': 'border-b' }}">{{ date('h:i:s a, d F Y', strtotime($data->date_time)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No data found.</p>
        @endif
    </div>
</div>
