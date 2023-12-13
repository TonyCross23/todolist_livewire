<div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" wire:submit="createUser" action="">
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="name" type="text" placeholder="Enter name">
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="email" type="email" placeholder="Enter email">
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="password" type="password" placeholder="Enter password">
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            wire:model="image" type="file">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Button
        </button>
    </form>

    @foreach ($user as $user)
        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
    @endforeach
</div>
