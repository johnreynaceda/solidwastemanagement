<div>
    <ul class="space-y-3">
        @forelse ($complaints as $item)
            <li class="border p-5 rounded-xl">
                <div class="flex justify-between items-center">
                    <h1 class="bg-blue-500 px-4 text-white py-1 font-semibold rounded-xl">{{ $item->ticket_number }}</h1>
                </div>
                <div class="mt-4 ">
                    <h1>{{ \Carbon\Carbon::parse($item->date_time)->format('F d, Y H:i A') }}</h1>
                    <div class="mt-3 grid 2xl:grid-cols-2 grid-cols-1 2xl:gap-0 gap-5 2xl:divide-x divide-y">
                        <div class="2xl:px-5 py-5">
                            <div>
                                <h1 class="text-xl uppercase font-bold text-gray-600">{{ $item->purok->barangay->name }}
                                </h1>
                                <h1 class="text-xl uppercase font-bold text-gray-600">Prk. {{ $item->purok->name }}</h1>
                                <div class="mt-2">
                                    <h1>Type of Waste: <strong class="text-green-600">{{ $item->waste->name }}</strong>
                                    </h1>
                                    <h1>Type of Violation: <strong
                                            class="text-green-600">{{ $item->violation->name }}</strong>
                                    </h1>
                                    <div class="mt-2 border p-3 h-40 rounded-xl">
                                        <h1 class="font-semibold text-gray-700">STATUS: <span>{{ $item->status }}</span>
                                        </h1>
                                        <p class="mt-2">
                                            {{ $item->feedback }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="2xl:px-5  py-5">
                            <a href="" class="h-40">
                                <img src="{{ Storage::url($item->file_path) }}"
                                    class="h-full w-full object-cover rounded-2xl hover:scale-95" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>
</div>
