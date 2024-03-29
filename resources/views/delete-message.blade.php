<x-app-layout>

    <div class="p-6 text-gray-900 bg-white m-10">
        <h1 class="text-2xl font-bold mb-6">Here is your message... Read it fast!</h1>
        <div>
            {{ $secret_message[0]->message }}
        </div>
    </div>

    <script> setTimeout(function(){window.location='read-message'}, 1000); </script> 
</x-app-layout>
