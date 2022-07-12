<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeNote</title>
</head>

<!--
    Respect For https://codepen.io/userliev/pen/zYNrjRo
-->
<style>
    *,
    *::after,
    *::before {
        box-sizing: border-box;
    }

    body {
        background-color: #123;
        display: flex;
        margin: 0;
        justify-content: center;
    }

    .sheet {
        margin-top: 100px;
        background-color: #fff;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' height='30' width='100%'><circle r='10' cx='20' cy='13' fill='%23888' /><line x1='80' x2='80' y1='0' y2='30' stroke='%23f00' /><line x1='0' x2='100%'  y1='28' y2='28' stroke='%2300f'/></svg>");
        background-repeat: repeat-y;
    }

    .textarea {
        font-family: cursive;
        font-size: 20px;
        line-break: anywhere;
        line-height: 30px;
        min-height: 100vh;
        padding: 0 20px 0 100px;
        width: 680px;
    }

    /**
    Respect For https://codepen.io/suez/pen/gPRjBo
    */


    /* MAIN VARIABLES FOR CUSTOMIZATION */
    /* -------------------------------- */
    .nav {
        overflow: hidden;
        position: absolute;
        left: 50%;
        top: 10%;
        width: auto;
        height: 90px;
        margin-top: -45px;
        background: #fff;
        border-radius: 5px;
        transform: translate3d(-50%, 0, 0);
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.2);
    }
    .nav__cb {
        z-index: -1000;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        pointer-events: none;
    }
    .nav__content {
        position: relative;
        width: 90px;
        height: 100%;
        transition: width 1s cubic-bezier(0.49, -0.3, 0.68, 1.23);
    }
    .nav__cb:checked ~ .nav__content {
        transition: width 1s cubic-bezier(0.48, 0.43, 0.29, 1.3);
        width: 410px;
    }
    .nav__items {
        position: relative;
        width: 410px;
        height: 100%;
        padding-left: 20px;
        padding-right: 110px;
        list-style-type: none;
        font-size: 0;
    }
    .nav__item {
        display: inline-block;
        vertical-align: top;
        width: 70px;
        text-align: center;
        color: #6C7784;
        font-size: 14px;
        line-height: 90px;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: bold;
        perspective: 1000px;
        transition: color 0.3s;
        cursor: pointer;
    }
    .nav__item:hover {
        color: #00bdea;
    }
    .nav__item-text {
        display: block;
        height: 100%;
        transform: rotateY(-70deg);
        opacity: 0;
        transition: transform 0.7s cubic-bezier(0.48, 0.43, 0.7, 2.5), opacity 0.7s;
    }
    .nav__cb:checked ~ .nav__content .nav__item-text {
        transform: rotateY(0);
        opacity: 1;
        transition: transform 0.7s cubic-bezier(0.48, 0.43, 0.7, 2.5), opacity 0.2s;
    }
    .nav__item:nth-child(1) .nav__item-text {
        transition-delay: 0.3s;
    }
    .nav__cb:checked ~ .nav__content .nav__item:nth-child(1) .nav__item-text {
        transition-delay: 0s;
    }
    .nav__item:nth-child(2) .nav__item-text {
        transition-delay: 0.2s;
    }
    .nav__cb:checked ~ .nav__content .nav__item:nth-child(2) .nav__item-text {
        transition-delay: 0.1s;
    }
    .nav__item:nth-child(3) .nav__item-text {
        transition-delay: 0.1s;
    }
    .nav__cb:checked ~ .nav__content .nav__item:nth-child(3) .nav__item-text {
        transition-delay: 0.2s;
    }
    .nav__item:nth-child(4) .nav__item-text {
        transition-delay: 0s;
    }
    .nav__cb:checked ~ .nav__content .nav__item:nth-child(4) .nav__item-text {
        transition-delay: 0.3s;
    }
    .nav__btn {
        position: absolute;
        right: 0;
        top: 0;
        width: 90px;
        height: 80px;
        padding: 36px 25px;
        cursor: pointer;
    }
    .nav__btn:before {
        content: "MeNote";
        display: block;
        width: 50px;
        height: 2px;
        border-radius: 2px;
        color :#096DD3;
        background: #096DD3;
        transform-origin: 50% 50%;
        transition: transform 1s cubic-bezier(0.78, 0.83, 0.29, 2.3), background-color 0.3s;
    }
    .nav__btn:before {
        margin-bottom: 10px;
    }
    .nav__btn:hover:before, .nav__btn:hover:after {
        background: #00bdea;
    }
    .nav__cb:checked ~ .nav__btn:before {
        transform: translateY(7px) rotate(-360deg);
    }
    .nav__cb:checked ~ .nav__btn:after {
        transform: translateY(-7px) rotate(225deg);
    }
</style>
@stack('after-styles')
<body>


@yield('content')

</body>
<script>

    @if ($message = Session::get('error'))
    alert('{{ $message }}')
    @endif


    function redirectHome(){
        window.location.href ="{{ route('create') }}";
    }

    function copyContent(){
        navigator.clipboard.writeText(document.getElementById('content').innerHTML);
        alert("Content Copied !");
    }

    function share(){
        navigator.clipboard.writeText(window.location.href);
        alert("Link Copied !");
    }

    function contact(){
        window.open('https://github.com/benahmetcelik', '_blank');


    }
</script>
@stack('after-scripts')

</html>
