<x-layouts.default-layout title="About us" selected="About" layoutAttribute="id=home">
    <x-slot:links>
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/animation-about.css') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Raleway&display=swap"
          rel="stylesheet"
        />
        <link
          href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Raleway&display=swap"
          rel="stylesheet"
        />
        <link
          href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway&display=swap"
          rel="stylesheet"
        />
    </x-slot>

    <x-slot:content>
        <div class="intro fade-in">
            <img
                src="{{ asset('img/library1.jpg') }}"
                alt="image"
                {{-- class="fade-in-img" --}}
            />
            <span class="after">
                <div class="intro-text">
                    <h1><b>Our Library</b></h1>
                    <span>
                        I'm a paragraph. Click here to add your own text and edit me.
                        It’s easy. Just click “Edit Text” or double click me to add your
                        own content and make changes to the font. I’m a great place for
                        you to tell a story and let your users know a little more about
                        you.
                    </span>
                </div>
            </span>
        </div>
        <div class="member">
            <div class="member_inside">
                <div class="member_title">Our team</div>
                <div class="member_box">
                    <div class="member_left">
                        <div class="member_display">
                            <div class="member_role">Frontend</div>
                            <div class="member_list">
                                <ul>
                                    <li class="member_name">
                                        <p>Nguyen Thai Minh</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Tran Dang Tu</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Tran Ly Dang Khoa</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Tran Gia Long</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Truong Thien An</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="member_right">
                        <div class="member_display">
                            <div class="member_role">Backend</div>
                            <div class="member_list">
                                <ul>
                                    <li class="member_name">
                                        <p>Nguyen Xuan Minh</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Truong Phuc Thinh</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Vo Khanh Minh</p>
                                    </li>
                                    <li class="member_name">
                                        <p>Tran Phuong Hai Dang</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.default-layout>