<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight self-center">
            {{ __('Payroll') }}
        </h2>
    </x-slot>
    <div class="flex w-1/4 my-3 ml-5">
        <label for="simple-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <img src="{{ asset('images/search.png') }}" class="w-3 mx-auto my-3">
            </div>
            <input type="text" id="search"
                class="uppercase bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search employee . . ." required />
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md max-h-[400px] sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="empTable">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-3">
                        <div class="flex items-center">
                            <input id="hbox" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="hbox" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6" id="edit">
                        Edit
                    </th>
                    <th scope="col" class="px-6">
                        ID
                    </th>
                    <th scope="col" class="px-6">
                        Name
                    </th>
                    <th scope="col" class="px-6">
                        Job
                    </th>
                    <th scope="col" class="px-6">
                        Rate
                    </th>
                    <th scope="col" class="px-6">
                        No. Of Days
                    </th>
                    <th scope="col" class="px-6">
                        Late
                    </th>
                    <th scope="col" class="px-6">
                        Salary
                    </th>
                    <th scope="col" class="px-6">
                        Rate Per Hour
                    </th>
                    <th scope="col" class="px-6">
                        No. Of Hours
                    </th>
                    <th scope="col" class="px-6">
                        OT Pay
                    </th>
                    <th scope="col" class="px-6">
                        Holiday
                    </th>
                    <th scope="col" class="px-6">
                        PhilHealth
                    </th>
                    <th scope="col" class="px-6">
                        SSS
                    </th>
                    <th scope="col" class="px-6">
                        Advance
                    </th>
                    <th scope="col" class="px-6">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="parent">
                        <td class="w-4 p-3">
                            <div class="flex items-center">
                                <input id="dbox" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="dbox" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6" id="edit">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                <img src="{{ asset('images/edit.png') }}" class="w-4 mx-auto my-3" id="imagePreview">
                            </a>
                        </td>
                        <th scope="row" class="px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id }}
                        </th>
                        <td class="px-6">{{ $item->name }}</td>
                        <td class="px-6">{{ $item->job }}</td>
                        <td class="px-6">{{ $item->rate}}</td>
                        <td class="px-6">{{ $item->days }}</td>
                        <td class="px-6">{{ $item->late }}</td>
                        <td class="px-6">{{ $item->salary }}</td>
                        <td class="px-6">{{ $item->rph }}</td>
                        <td class="px-6">{{ $item->hrs }}</td>
                        <td class="px-6">{{ $item->otpay }}</td>
                        <td class="px-6">{{ $item->holiday }}</td>
                        <td class="px-6">{{ $item->philhealth }}</td>
                        <td class="px-6">{{ $item->sss }}</td>
                        <td class="px-6">{{ $item->advance }}</td>
                        <td class="px-6">{{ $item->total }}</td>
                        <!-- Display other columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3 fixed bottom-0 bg-white w-full z-10">
        {{ $data->links() }}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#search').on('input', function() {
                var inputValue = $(this).val().toUpperCase();
                $('#empTable tbody tr').filter(function() {
                    $(this).toggle($(this).text().indexOf(inputValue) > -1);
                });
            });
            $('#hbox').change(function(){
                if ($(this).is(':checked')) {
                // The checkbox is checked
                $('#parent #dbox').prop('checked', true);
                $('thead th:nth-child(2), tbody td:nth-child(2)').toggle();
                } else {
                // The checkbox is unchecked
                $('#parent #dbox').prop('checked', false);
                $('thead th:nth-child(2), tbody td:nth-child(2)').toggle();
                }
            })
            $('#parent #dbox').change(function(){
                if ($(this).is(':checked')) {
                // The checkbox is checked
                $('thead th:nth-child(2), tbody td:nth-child(2)').toggle();
                } else {
                // The checkbox is unchecked
                $('thead th:nth-child(2), tbody td:nth-child(2)').toggle();
                }
            })
        })
    </script>
</x-app-layout>