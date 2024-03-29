<x-app-layout>

    @if (session('message'))
        <div class="alert alert-message">
            {{ session('message') }}
        </div>
    @endif

    <div class="p-6 text-gray-900 bg-white m-10">
        <h1 class="text-2xl font-bold mb-6">Here are you messages... Read them fast!</h1>
        <div>
            @foreach ($messages as $message)
                <div class="border-color-black border-2 w-1/3 p-3">
                    <p>You have a message from {{ $message->sender }}! Enter the decryption key to view it!</p>

                    <form action="/show-message">
                        @csrf
                        <label for="decryption_key">Please Enter the secret password!</label>
                        <input required type="text" name="decryption_key" id="decryption_key">

                        <button type="submit" class="bg-blue-600 rounded-md p-2 mt-2 w-1/3 mx-auto">Try Secret Password</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
