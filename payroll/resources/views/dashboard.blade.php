<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class= "overflow-hidden sm:rounded-lg">
                <div class="columns-3">
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">TOTAL EMPLOYEES</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400" id="total"></p>
                    </a>
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">ACTIVE</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400" id="active"></p>
                    </a>
                    <a href="#"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center">INACTIVE</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400" id="inactive"></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            
        })
    </script>
</x-app-layout>
