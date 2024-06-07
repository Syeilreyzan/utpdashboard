<div class="flex relative w-1/2 h-full border-2 border-blue-600 rounded-lg">
    <div class="absolute left-4 -top-4 font-medium text-sm text-white bg-blue-600 px-3 py-1 rounded-lg">
        {{ __('Controller') }}
    </div>
    <div class="flex items-center justify-center w-full">
        <label for="toggleValve1" class="flex flex-col gap-2 justify-center items-center cursor-pointer">
            <div class="relative">
                <input wire:model="valve1" wire:click="updateValve({{ $valve1 }})" type="checkbox" id="toggleValve1" value="{{ $valve1 ? 'checked' : '' }}" class="sr-only">
                <!-- line -->
                <div class="dot_background block bg-gray-400 w-32 h-[72px] rounded-full"></div>
                <!-- dot -->
                <div class="dot_checked absolute left-2 top-2 bg-white w-14 h-14 rounded-full transition"></div>
            </div>
            <!-- label -->
            <div class="ml-3 text-gray-700 font-medium">
            Valve 1
            </div>
        </label>
    </div>
    <div class="flex items-center justify-center w-full">
        <label for="toggleValve2" class="flex flex-col gap-2 justify-center items-center cursor-pointer">
            <!-- toggle -->
            <div class="relative">
            <!-- input -->
                <input type="checkbox" id="toggleValve2" class="sr-only">
                <!-- line -->
                <div class="dot_background block bg-gray-400 w-32 h-[72px] rounded-full"></div>
                <!-- dot -->
                <div class="dot_checked absolute left-2 top-2 bg-white w-14 h-14 rounded-full transition"></div>
            </div>
            <!-- label -->
            <div class="ml-3 text-gray-700 font-medium">
            Valve 2
            </div>
        </label>
    </div>
    <div class="flex items-center justify-center w-full">
        <label for="toggleValve3" class="flex flex-col gap-2 justify-center items-center cursor-pointer">
            <!-- toggle -->
            <div class="relative">
            <!-- input -->
                <input type="checkbox" id="toggleValve3" class="sr-only">
                <!-- line -->
                <div class="dot_background block bg-gray-400 w-32 h-[72px] rounded-full"></div>
                <!-- dot -->
                <div class="dot_checked absolute left-2 top-2 bg-white w-14 h-14 rounded-full transition"></div>
            </div>
            <!-- label -->
            <div class="ml-3 text-gray-700 font-medium">
            Valve 3
            </div>
        </label>
    </div>
</div>
