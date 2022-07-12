@extends('note.layouts.app')


@push('after-styles')

    <style>
        .nav__cb:checked ~ .nav__content {
            transition: width 1s cubic-bezier(0.48, 0.43, 0.29, 1.3);
            width: 260px;
        }
    </style>

@endpush
@section('content')
    <nav class="nav">
        <input type="checkbox" class="nav__cb" id="menu-cb"/>
        <div class="nav__content">
            <ul class="nav__items">
                <li class="nav__item">
              <span class="nav__item-text" onclick="sendForm();">
               Save
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

    <form action="{{ route('store') }}" name="note_form" method="POST">
        @csrf
          <textarea class="sheet textarea" role="textbox" id="content" name="note" spellcheck="false" contenteditable="true"></textarea>
        <button type="submit" id="form_sender_button"></button>
    </form>



@endsection

@push('after-scripts')

    <script>
        function sendForm(){
            document.getElementById('form_sender_button').click();
        }
    </script>

@endpush
