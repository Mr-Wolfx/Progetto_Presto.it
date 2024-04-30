<footer class="d-flex flex-wrap card-footer justify-content-between align-items-center border-top overflow-hidden">

    <div class="col-xl-4 col-12">
        <p class="text-center text-xl-start my-4"><b>© 2024 Accepts Cookies, Inc.</b></p>
    </div>

    <a class="col-xl-4 col-12 d-flex justify-content-center mb-3 mb-xl-0 me-xl-auto link-body-emphasis text-decoration-none">
        <div class="bi me-2" width="40" height="32">
            <h4 class="text-center titolo" href="{{route('welcome')}}" >PRESTO.IT</h4>
        </div>
    </a>

    <ul class="nav col-xl-3 my-3 col-12 justify-content-around">
        <li class="nav-item"><i class="fa-solid fa-basket-shopping "></i><a class="text-decoration-none text-light" href="{{ route('welcome') }}"> Home</a></li>
        <li class="nav-item"><i class="fa-solid fa-basket-shopping "></i><a class="text-decoration-none text-light" href="{{ route('article.index') }}"> {{__('ui.Annunci')}}</a></li>
        <li class="nav-item"><i class="fa-solid fa-basket-shopping "></i><a class="text-decoration-none text-light" href="{{ route('revisor.become') }}"> {{__('ui.Lavora con noi')}}</a></li>
    </ul>
</footer>
