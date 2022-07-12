@extends('note.layouts.app')


@section('content')
    <nav class="nav">
        <input type="checkbox" class="nav__cb" id="menu-cb"/>
        <div class="nav__content">
            <ul class="nav__items">
                <li class="nav__item">
              <span class="nav__item-text" onclick="redirectHome()">
               New Note
              </span>
                </li>
                <li class="nav__item">
              <span class="nav__item-text" onclick="copyContent()">
               Copy
              </span>
                </li>
                <li class="nav__item">
              <span class="nav__item-text" onclick="share()">
               Share
              </span>
                </li>
                <li class="nav__item">
              <span class="nav__item-text" onclick="contact()">
               Contact</a>
              </span>
                </li>
            </ul>
        </div>
        <label class="nav__btn" for="menu-cb"></label>
    </nav>
    <span class="sheet textarea" role="textbox" id="content" spellcheck="false" contenteditable="false">
     {!! $note_query->note !!}
        </span>

@endsection
