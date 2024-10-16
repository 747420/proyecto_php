<!DOCTYPE html>
<html lang="es" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Proyecto</title>
    <link href="./assets/daisyUI.min.css" rel="stylesheet" type="text/css" />
    <style>
        .texto-animado {
            height: 3em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .servicio-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .servicio-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .razon-elegir {
            transition: background-color 0.3s ease-in-out;
        }
        .razon-elegir:hover {
            background-color: rgba(255,255,255,0.1);
        }
    </style>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <?php include 'components/navbar.php'; ?>

    <!-- Main -->
    <main class="flex-grow">
        <section class="hero h-[80vh]">
            <article class="hero-content text-center">
                <section class="w-auto">
                    <h1 class="text-4xl md:text-6xl font-bold mb-8">Bienvenido a Proyecto</h1>
                    <p class="py-6 texto-animado text-md md:text-xl"></p>
                    <button class="btn btn-primary btn-md mt-4 hover:scale-105 transition-transform duration-300">Comenzar</button>
                </section>
            </article>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'components/footer.php'; ?>

    <script src="./assets/tailwind.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const textos = [
                "Impulsamos tus sueños con innovación y dedicación.",
                "Creamos soluciones que transforman tu visión en realidad.",
                "Juntos, construimos el futuro que imaginas.",
                "Desafiamos límites para alcanzar la excelencia.",
                "Tu éxito es nuestra misión, tu crecimiento nuestra pasión.",
                "Innovamos constantemente para superar tus expectativas.",
                "Nuestro compromiso es tu satisfacción total.",
                "Transformamos ideas en resultados tangibles.",
                "Somos tu socio estratégico en el camino al éxito.",
                "Calidad y eficiencia en cada proyecto que emprendemos."
            ];
            let indice = 0;
            const parrafo = document.querySelector('.texto-animado');
            
            async function animarTexto(texto) {
                for (let i = 0; i <= texto.length; i++) {
                    parrafo.textContent = texto.slice(0, i);
                    await new Promise(resolve => setTimeout(resolve, 30));
                }
                await new Promise(resolve => setTimeout(resolve, 2000));
                for (let i = texto.length; i >= 0; i--) {
                    parrafo.textContent = texto.slice(0, i);
                    await new Promise(resolve => setTimeout(resolve, 30));
                }
            }

            async function animarTextos() {
                while (true) {
                    await animarTexto(textos[indice]);
                    indice = (indice + 1) % textos.length;
                }
            }

            animarTextos();
        });
    </script>
</body>
</html>