<div>
    <div class="flex justify-between items-center">
        <div class="w-96">
            {{ $this->form }}
        </div>
        <div>
            <x-primary-button @click="printOut($refs.printContainer.outerHTML);">
                <span>Print</span>
            </x-primary-button>
        </div>
    </div>
    <div class="mt-10">
        <div x-ref="printContainer">
            <table id="example" style="width:100%">
                <thead class="font-normal">
                    <tr>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">TICKET #
                        </th>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME
                        </th>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">BARANGAY
                        </th>

                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            PUROK
                        </th>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            WASTE
                        </th>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            VIOLATION
                        </th>
                        <th class="border border-gray-500  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            DATE & TIME
                        </th>


                    </tr>
                </thead>
                <tbody class="">

                    @forelse ($complaints as $item)
                        <tr>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->ticket_number }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->user->name }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->purok->barangay->name }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->purok->name }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->waste->name }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ $item->violation->name }}
                            </td>
                            <td class="border border-gray-500  text-gray-700  px-3 py-1">
                                {{ \Carbon\Carbon::parse($item->date_time)->format('F d, Y H:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center border border-gray-500 py-2">
                                No Complaints Record
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
