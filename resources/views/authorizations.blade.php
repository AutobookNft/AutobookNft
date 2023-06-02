<x-app-layout>

    <br><br><br>

    <x-slot name="header">
       <h2>
            <div class="mb-4 col-span-6 sm:col-span-4">
                <label for="email" class="block text-gray-700 text-xxl font-bold mb-2">{{ __('Assign role & permissions') }}</label>
                <x-jet-section-border />
            </div>
       </h2>
    </x-slot>

   <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <form method="POST" action="authorizations/update" class="">
                @csrf

                @method('PUT')

                <div class = 'mt-5 md:mt-2 md:col-span-4'>

                    <div class="mb-4 col-span-4 sm:col-span-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Indirizzo email:</label>
                        <input type="email" id="email" name="email" required
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6 col-span-4 sm:col-span-4">
                        <label for="usertype" class="block text-gray-700 text-sm font-bold mb-2">Ruolo:</label>
                        <select id="usertype" name="usertype" required
                            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            <option value="Superadmin">Superadmin</option>
                            <option value="admin">Admin</option>
                            <option value="creator">Creator</option>
                            <option value="epp">EPP</option>
                        </select>
                    </div>

                    <div class="mb-4 col-span-6 sm:col-span-4">
                        <div class="flex items-center justify-between">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                {{__('Assign the role')}}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-jet-app-layout>
