<footer>

    <div class="container">
        <div class="d-flex align-items-center justify-content-around pt-1 pb-1 fix-menu">
            <div class="text-center">
                <a href="{{ route('index') }}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
            </div>
            <div class="text-center">
                <a href="{{ route('wallet.index') }}">
                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                </a>
            </div>
            <div class="text-center">
                <a href="{{ route('single.page.advise')}}">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                </a>
            </div>
            <div class="text-center">
                <a href="{{ route('profile.index') }}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
@stack('js')
</body>
</html>