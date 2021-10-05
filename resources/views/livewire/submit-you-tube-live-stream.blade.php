<div class="flex justify-center">
    <div class="w-full">
        <div class="mt-5 md:mt-0">

            <!-- Global message like success -->
            @if (session()->has('message'))
                    <div class="mb-4 px-4 py-2 text-sm text-green-800 bg-green-200 text-center">
                        {{ session('message') }}
                    </div>
            @endif
        <!-- Global message like success -->

            <!-- Form -->
            <form wire:submit.prevent="submit">
                <div class="overflow-hidden">
                    <div class="bg-white">
                        @if (session()->has('stream-message'))
                            <div class="mb-4 px-4 py-2 text-sm text-white bg-green rounded-md">
                                {{ session('stream-message') }}
                            </div>
                        @endif

                        <div class="flex flex-col space-y-8">

                            <!-- YouTube ID field -->
                            <div>
                                <label for="youTubeIdOrUrl"
                                       class="block mb-2 text-xs font-bold text-gray-dark uppercase">
                                    YouTube Stream URL
                                </label>
                                <input id="youTubeIdOrUrl" type="text" wire:model="youTubeIdOrUrl"
                                       placeholder="e.g. https://www.youtube.com/watch?v=1234"
                                       class="mt-1 focus:ring-red focus:border-red block w-full shadow-sm sm:text-sm border-gray-light rounded-md text-gray-darkest"/>
                                @error('youTubeIdOrUrl')
                                <x-input-error :message="$message"/>
                                @enderror
                            </div>
                            <!-- YouTube ID field -->

                            <!-- Language code field -->
                            <div class="">
                                <label for="languageCode"
                                       class="block mb-2 text-xs font-bold text-gray-dark uppercase">Language</label>
                                <select wire:model.defer="languageCode" id="languageCode"
                                        class="mt-1 focus:ring-red focus:border-red block w-full shadow-sm sm:text-sm border-gray-light rounded-md text-gray-darkest">
                                    @foreach(\App\Models\Language::query()->orderBy('name')->get() as $country)
                                        <option value="{{ $country->code }}"
                                                @if($country->code === 'en') selected @endif> {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('languageCode')
                                <x-input-error :message="$message"/>
                                @enderror
                            </div>
                            <!-- Language code field -->

                            <!-- E-mail field -->
                            <div>
                                <label for="submittedByEmail"
                                       class="block mb-2 text-xs font-bold uppercase text-gray-dark">Your
                                    E-Mail</label>
                                <input wire:model="submittedByEmail" type="text" id="submittedByEmail"
                                       class="mt-1 focus:ring-red focus:border-red block w-full shadow-sm sm:text-sm border-gray-light rounded-md text-gray-darkest"
                                       placeholder="e.g. tim@larastreamers.com"/>
                                @error('submittedByEmail')
                                <x-input-error :message="$message"/>
                                @enderror
                            </div>
                            <!-- E-mail field -->

                        </div>
                    </div>
                    <div class="pt-8 flex justify-end items-center">
                        <button type="submit"
                                class="px-3 py-2 text-sm font-medium text-white transition bg-red rounded-md shadow hover:bg-red-dark focus:bg-red focus:outline-none">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
            <!-- Form -->

        </div>
    </div>
</div>
