<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight self-center">
                {{ __('Employee') }}
            </h2>
            <a href="{{ route('a-view') }}" class="ms-auto self-center"><button type="button"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">VIEW
                    EMPLOYEES</button></a>
        </div>
    </x-slot>
    <div class="container mt-5">
        <p class="font-bold text-2xl border-b-2 border-green-300">ADD EMPLOYEE</p>
        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('employee.store') }}" id="empForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/user.png') }}" class="w-52 mx-auto my-3" id="imagePreview">
                    <x-input-label for="imagePreview" :value="__('Upload Employee Image:')" />
                    <x-text-input id="image" class="block mt-1 w-full uppercase" type="file" name="image" accept="image/*" onchange="previewImage(event)"/>
                </div>
                <div class="col">
                    <div class="flex justify-evenly pt-10">
                        <input type="radio" id="emp" name="role" value="EMPLOYEE">
                        <x-input-label for="emp" :value="__('EMPLOYEE')" />
                        <input type="radio" id="on" name="role" value="ON-CALL">
                        <x-input-label for="on" :value="__('ON-CALL')" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="userId" :value="__('User ID:')" />
                        <x-text-input id="userId" class="block mt-1 w-full uppercase" type="text" name="userId"
                            readonly />
                    </div>
                </div>
            </div>
            <div class="mt-3 columns-3">
                <x-input-label for="last" :value="__('Last Name:')" />
                <x-text-input id="last" class="block mt-1 w-full uppercase" type="text" name="last" />
                <x-input-label for="first" :value="__('First Name:')" />
                <x-text-input id="first" class="block mt-1 w-full uppercase" type="text" name="first" />
                <x-input-label for="middle" :value="__('Middle Name:')" />
                <x-text-input id="middle" class="block mt-1 w-full uppercase" type="text" name="middle" />
            </div>
            <div class="mt-3 columns-3">
                <x-input-label for="status" :value="__('Status:')" />
                <select id="status" name="status"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option selected>----------</option>
                    <option value="SINGLE">SINGLE</option>
                    <option value="MARRIED">MARRIED</option>
                    <option value="DIVORCED">DIVORCED</option>
                </select>
                <x-input-label for="email" :value="__('Email:')" />
                <x-text-input id="email" class="block mt-1 w-full uppercase" type="email" name="email" />
                <x-input-label for="phone" :value="__('Phone No.:')" />
                <x-text-input id="phone" class="block mt-1 w-full uppercase" type="text" name="phone" />
            </div>
            <div class="mt-3 columns-3">
                <x-input-label for="job" :value="__('Job:')" />
                <select id="job" name="job"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option selected>----------</option>
                    <option value="AREA MANAGER">AREA MANAGER</option>
                    <option value="BOOK KEEPER">BOOK KEEPER</option>
                    <option value="CASHIER">CASHIER</option>
                    <option value="FARMERS">FARMERS</option>
                    <option value="FARM MANAGER">FARM MANAGER</option>
                    <option value="GENERAL MANAGER">GENERAL MANAGER</option>
                    <option value="HR">HR</option>
                    <option value="PAYROLL ASSISTANT">PAYROLL ASSISTANT</option>
                    <option value="SECRETARY">SECRETARY</option>
                    <option value="SUPERVISOR">SUPERVISOR</option>
                    <option value="TECH SUPPORT">TECH SUPPORT</option>
                </select>
                <x-input-label for="sss" :value="__('SSS No.:')" />
                <x-text-input id="sss" class="block mt-1 w-full uppercase" type="text" name="sss" />
                <x-input-label for="philhealth" :value="__('PhilHealth No.:')" />
                <x-text-input id="philhealth" class="block mt-1 w-full uppercase" type="text" name="philhealth" />
            </div>
            <div class="mt-3 columns-2">
                <x-input-label for="pagibig" :value="__('Pag-Ibig No.:')" />
                <x-text-input id="pagibig" class="block mt-1 w-full uppercase" type="text" name="pagibig" />
                <x-input-label for="rate" :value="__('Rate:')" />
                <x-text-input id="rate" class="block mt-1 w-full uppercase" type="text" name="rate"
                    value="430" />
            </div>

            <p class="font-semibold text-2xl leading-5 border-b-2 pb-2 mt-3 border-green-300">ADDRESS:</p>
            <x-input-label for="address" :value="__('Address:')" />
            <x-text-input id="address" class="block mt-1 w-full uppercase" type="text" name="address" />
            <p class="font-semibold text-2xl leading-5 border-b-2 pb-2 mt-3 border-green-300">EMERGENCY CONTACT:</p>
            <x-input-label for="eName" :value="__('Full Name:')" />
            <x-text-input id="eName" class="block mt-1 w-full uppercase" type="text" name="eName" />
            <x-input-label for="ePhone" :value="__('Phone No.:')" />
            <x-text-input id="ePhone" class="block mt-1 w-full uppercase" type="text" name="ePhone" />
            <x-input-label for="eAdd" :value="__('Address:')" />
            <x-text-input id="eAdd" class="block mt-1 w-full uppercase" type="text" name="eAdd" />
            <div class="flex mt-3 flex-row-reverse">
                <x-primary-button class="m-3">
                    {{ __('Add') }}
                </x-primary-button>
                <x-secondary-button class="m-3">
                    {{ __('Clear') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var file = event.target.files[0];
            var imagePreview = document.getElementById('imagePreview');

            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }
        }
    </script>
    <script type="module">
        $(document).ready(function() {
            var role;
            var text = document.getElementById("userId");
            $('#empForm').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Loop through each text field with the class "uppercase"
                $('.uppercase').each(function() {
                    // Convert the value to uppercase
                    var inputValue = $(this).val().toUpperCase();
                    // Set the uppercase value back to the text field
                    try{
                        $(this).val(inputValue);
                    }catch(error){
                        console.error("An error occurred:", error.message);
                    }
                });

                // Submit the form programmatically
                this.submit();
            });


            // Check if option 1 is checked
            $('#emp').change(function() {
                if ($(this).is(':checked')) {
                    role = document.getElementById("emp").value;
                    $.ajax({
                        url: '/employee/ajax', // Replace with the URL of your Laravel endpoint
                        type: 'POST', // You can also use 'GET' depending on your server route
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            dataString: role
                        },
                        success: function(response) {
                            // Handle success response from the server
                            text.value = response;
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error('Error:', error);
                        }
                    });
                }
            });
            // Check if option 2 is checked
            $('#on').change(function() {
                if ($(this).is(':checked')) {
                    role = document.getElementById("on").value;
                    $.ajax({
                        url: '/employee/ajax', // Replace with the URL of your Laravel endpoint
                        type: 'POST', // You can also use 'GET' depending on your server route
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            dataString: role
                        },
                        success: function(response) {
                            // Handle success response from the server
                            text.value = response;
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error('Error:', error);
                        }
                    });
                }
            });
        });
        /*$('#image').change(function(){
            var file = event.target.files[0];
            var imagePreview = document.getElementById('imagePreview');

            if (file) {
                var formData = new FormData();
                formData.append('image', file);
                var reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
            }

            /*var file = event.target.files[0];
            var formData = new FormData();
            formData.append('image', file);

            axios.post('/image/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                document.getElementById('imagePreview').src = response.data.image_path;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        })*/
    </script>
</x-app-layout>
