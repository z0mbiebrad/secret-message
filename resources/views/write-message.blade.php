<x-app-layout>

    @if(session('message'))
        <div class="alert alert-message">
            {{ session('message') }}
        </div>
    @endif

    <div class="p-6 text-gray-900 bg-white m-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Create a secret message for your friend! or foe!</h1>
        <form action="/write-message" class="w-1/2 mx-auto" method="POST">
            @csrf
            <label for="recipient" class="mx-auto">Who is this message for?</label>
            <input required type="text" class="block w-full" name="recipient" id="recipient">

            <label for="message" class="mx-auto">What do you want this message to say?</label>
            <input required type="text" class="block w-full" name="message" id="message">

            <label for="decryption_key" class="mx-auto">Whats the secret word?</label>
            <input required type="text" class="block w-full" name="decryption_key" id="decryption_key">


            <button type="submit" class="bg-blue-600 rounded-md p-2 mt-2 w-1/3 mx-auto">Send Message</button>
        </form>
    </div>
</x-app-layout>
