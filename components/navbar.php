<nav class="navbar sticky top-0 z-50" id="navbar">
    <section class="navbar-start">
        <details class="dropdown">
            <summary class="btn btn-ghost btn-circle swap swap-rotate">
                <!-- this hidden checkbox controls the state -->
                <input type="checkbox" />

                <!-- hamburger icon -->
                <svg
                    class="swap-off fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 512 512">
                    <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                </svg>

                <!-- close icon -->
                <svg
                    class="swap-on fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 512 512">
                    <polygon
                        points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                </svg>
            </summary>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[50] mt-3 w-52 p-2 shadow">
                <li><a href="index.php">Página principal</a></li>
                <?php session_start();
                if (!isset($_SESSION['usuario'])): ?>
                    <li><a href="singIn.php">Ingresar</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="controllers/logOut.php">Salir</a></li>
                <?php endif;?>
            </ul>
        </details>
    </section>
    <section class="navbar-center">
        <a href="#" class="btn btn-ghost text-xl">Proyecto</a>
    </section>
    <section class="navbar-end">
        <button class="btn btn-ghost btn-circle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </button>
        <button class="btn btn-ghost btn-circle">
            <span class="indicator">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </span>
        </button>
        <button class="btn btn-ghost btn-circle">
            <section class="avatar">
                <article class="bg-neutral text-neutral-content h-10 w-10 rounded-full flex items-center justify-center">
                    <?php if (!isset($_SESSION['usuario'])): ?>
                    <span class="text-xl counter">0</span>
                    <script>
                        const counter = document.querySelector('.counter');
                        let count = 0;
                        counter.textContent = count;
                        setInterval(() => {
                            counter.textContent = count++;
                        }, 1000);
                    </script>
                    <?php endif;?>
                    <?php 
                        if (isset($_SESSION['usuario'])) {
                            $inicial = $_SESSION['usuario']['name'][0];
                            echo "<span class='text-xl counter'>$inicial</span>";
                        }
                        session_write_close(); 
                        
                    ?>
                </article>
            </section>
        </button>
    </section>
</nav>

<script>
    const navbar = document.getElementById('navbar');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function() {
        let scrollTop = document.documentElement.scrollTop;
        if (scrollTop > 10) {
            navbar.classList.add('bg-base-100');
        } else {
            navbar.classList.remove('bg-base-100');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);
</script>