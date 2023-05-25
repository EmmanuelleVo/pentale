@props(['book', 'characters'])

<div class="novel__about">
    <div class="novel__about-container accordion">
        <x-titles.small-title title="Characters"/>
        <div class="accordion__content">

        </div>
    </div>

    <div class="novel__about-container accordion">
        <x-titles.small-title title="Story"/>
        <div class="accordion__content wysiwyg">
            {!! $book->synopsis !!}
        </div>
    </div>

</div>
