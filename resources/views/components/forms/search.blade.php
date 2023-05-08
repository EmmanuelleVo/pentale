@props(['placeholder', 'action', 'searchTerm', 'qp'])

<form action="{{ $action }}" {{ $attributes->merge(['class' => 'form__search']) }}>
    @csrf
    <x-forms.field>
        <label for="search-term" class="form__label">Search</label>
        <div class="form__input-container">
            <x-svg.search/>
            <input type="search" name="search-term" id="search-term"
                   placeholder="{{ $placeholder }}" value="{{ $searchTerm ?? '' }}"
                   class="form__input form__input--search">
        </div>
    </x-forms.field>

    @foreach($qp as $n => $v)
        @if($n != 'page' && $n != 'search-term')
            <input type="hidden" name="{{$n}}" value="{{$v}}">
        @endif
    @endforeach

    <input type="hidden" name="page" value="1">

    <x-forms.button value="Search"/>

</form>
