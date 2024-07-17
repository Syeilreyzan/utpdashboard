<div>
    <div class="flex flex-col gap-4 justify-center p-10">
        <div class="flex gap-5 justify-center items-center">
            @foreach ($toggles as $toggle)
                <label
                    for="{{ $toggle->id }}"
                    class="flex flex-col gap-2 text-center items-center cursor-pointer select-none text-dark {{ $toggle->status == 1 ? 'bg-green-300' : 'bg-red-300' }} rounded-xl p-3">
                    <div class="flex flex-col items-center justify-center text-center">
                        <span class=" flex text-sm font-normal">Node Number:&nbsp<p class="font-semibold">{{ $toggle->sensor_name }}</p></span>
                        <span class=" flex text-sm font-normal">Status:&nbsp<p class="font-semibold">{{ $toggle->status == 1 ? 'On' : 'Off' }}</p></span>
                    </div>
                    <div class="relative">
                        <input
                            type="checkbox"
                            id="{{ $toggle->id }}"
                            class="peer sr-only"
                            value="{{ $toggle->status }}"
                            wire:click="toggleStatus({{ $toggle->id }})"
                            {{ $toggle->status == 1 ? 'checked' : '' }}
                            />
                        <div class="block h-8 rounded-full bg-gray-3 w-14"></div>
                        <div class="absolute flex items-center justify-center w-6 h-6 transition bg-red-500 rounded-full  left-1 top-1 peer-checked:translate-x-full peer-checked:bg-green-500">
                            <span class="hidden text-white">
                                <svg
                                    width="11"
                                    height="8"
                                    viewBox="0 0 11 8"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                        fill="white"
                                        stroke="white"
                                        stroke-width="0.4"
                                        />
                                </svg>
                            </span>
                            <span class="text-body-color inactive">
                            </span>
                        </div>
                    </div>
                </label>
            @endforeach
        </div>
    </div>
</div>
