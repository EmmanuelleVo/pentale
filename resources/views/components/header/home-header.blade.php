<header class="header header--home" {{--style="background-image: url("")"--}}>
    <h1 aria-level="1" role="heading" class="u-visually-hidden">{{ $title ?? 'Home - Pentale' }}</h1>
    <x-navigation.navigation/>

    <div class="o-wrapper">
        <div class="header__container">
            <h2 aria-level="1" role="heading" class="title title--big title--black">
                Read and write novels on <span class="colored">Pentale</span>
            </h2>
            <div class="header__wrapper">
                <figure class="header__figure">
                    <img src="img/header.jpg" alt="" class="header__img">
                </figure>
                <div class="header__content wysiwyg">
                    <div class="header__content--container">
                        <span class="title title--small">Best place for authors</span>
                        <p>Create a story and publish it.</p>
                        <p>Interact with our community to get feedback and support from the books you made.</p>
                    </div>
                    <div class="header__content--container">
                        <span class="title title--small">Best place for readers</span>
                        <p>Read the best novels the authors created.</p>
                        <p>Interact with the author of your favorite novels and with other readers.</p>
                        <p>Bookmark the stories you love so you don’t miss the updates.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
