<div>
    <input wire:model="search" type="search" placeholder="Search novels...">

    <h1>Search Results:</h1>

    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>
</div>
