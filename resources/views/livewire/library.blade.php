<div wire: class="library__list">
    @foreach($books as $book)
        <section class="novel__item">
            <figure class="novel__item-figure">
                <a href="/novels/{{ $book->slug }}" title="Read more about {{ $book->title }}" class="u-absolute"></a>
                <img src="{{ $book->cover }}" alt="Cover of {{ $book->title }}" class="novel__item-img">
            </figure>
            <div class="novel__item-container">
                <x-titles.card-title :title="\Illuminate\Support\Str::limit($book->title, 50, $end='...')"/>
                <a href="/novels/{{ $book->slug }}/chapter-" title="Read chapter " class="novel__item-chapter">
                    <span>55</span> / <span>56</span>
                </a>
            </div>
        </section>
    @endforeach
</div>
