<div>
    <div class="container content py-6 mx-auto">
        @include('livewire.include.input-box')
    </div>
    <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
        @include('livewire.include.search-box')
    </div>
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.include.show-card')
        @endforeach

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
</div>
