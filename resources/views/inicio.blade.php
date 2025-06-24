<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedQuiz - Presentación Interactiva</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        .typewriter {
            overflow: hidden;
            border-right: .15em solid #3b82f6;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: #3b82f6;
            }
        }

        .card-enter {
            opacity: 0;
            transform: translateY(50px);
        }

        .card-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.5s ease;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-900 to-purple-900 min-h-screen text-white font-sans overflow-x-hidden">
    <!-- Game Presentation View -->
    <div class="container mx-auto px-4 py-12 flex flex-col items-center justify-center min-h-screen">
        <!-- Game Logo with Animation -->
        <div class="flex flex-col items-center mb-12">
            <div class="relative floating">
                <div class="absolute -inset-4 bg-blue-500 rounded-full opacity-20 blur-lg"></div>
                <div class="relative bg-white w-32 h-32 rounded-2xl flex items-center justify-center shadow-2xl">
                    <i class="fas fa-heartbeat text-6xl text-red-500"></i>
                </div>
            </div>
            <h1 class="text-5xl font-bold mt-8 text-center">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-300 to-purple-300">Med</span>
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-red-300 to-pink-300">Quiz</span>
            </h1>
            <p class="text-xl text-blue-200 mt-2">La aventura del conocimiento médico</p>
        </div>

        <!-- Game Introduction -->
        <div class="max-w-3xl bg-white/10 backdrop-blur-sm rounded-2xl p-8 mb-12 border border-white/20 shadow-xl">
            <h2 class="text-3xl font-bold mb-6 text-center typewriter">¡Prepárate para el desafío!</h2>
            <p class="text-lg text-blue-100 mb-6 text-center">
                Embárcate en un viaje interactivo a través del cuerpo humano, donde cada respuesta correcta te acerca a
                dominar el arte de la medicina.
            </p>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 transform hover:scale-105">
                    <div class="bg-blue-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-brain text-blue-300 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">+500 Preguntas</h3>
                    <p class="text-blue-200 text-center text-sm">Desde anatomía hasta farmacología</p>
                </div>
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 transform hover:scale-105">
                    <div class="bg-purple-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-trophy text-purple-300 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Sistema de Logros</h3>
                    <p class="text-blue-200 text-center text-sm">Desbloquea insignias y niveles</p>
                </div>
                <div
                    class="bg-white/5 p-6 rounded-xl border border-white/10 hover:bg-white/10 transition-all duration-300 transform hover:scale-105">
                    <div class="bg-green-500/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-users text-green-300 text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Modo Competitivo</h3>
                    <p class="text-blue-200 text-center text-sm">Reta a tus compañeros</p>
                </div>
            </div>
        </div>

        <!-- Character Selection -->
        <div class="w-full max-w-4xl mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Elige tu avatar</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div
                    class="bg-white/5 p-4 rounded-xl border-2 border-blue-500/30 hover:border-blue-400 transition-all cursor-pointer transform hover:scale-105">
                    <div class="bg-blue-500/10 w-20 h-20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <i class="fas fa-user-md text-3xl text-blue-300"></i>
                    </div>
                    <p class="text-center font-medium">Cirujano</p>
                </div>
                <div
                    class="bg-white/5 p-4 rounded-xl border-2 border-transparent hover:border-purple-400 transition-all cursor-pointer transform hover:scale-105">
                    <div class="bg-purple-500/10 w-20 h-20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <i class="fas fa-stethoscope text-3xl text-purple-300"></i>
                    </div>
                    <p class="text-center font-medium">Médico General</p>
                </div>
                <div
                    class="bg-white/5 p-4 rounded-xl border-2 border-transparent hover:border-green-400 transition-all cursor-pointer transform hover:scale-105">
                    <div class="bg-green-500/10 w-20 h-20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <i class="fas fa-dna text-3xl text-green-300"></i>
                    </div>
                    <p class="text-center font-medium">Investigador</p>
                </div>
                <div
                    class="bg-white/5 p-4 rounded-xl border-2 border-transparent hover:border-red-400 transition-all cursor-pointer transform hover:scale-105">
                    <div class="bg-red-500/10 w-20 h-20 rounded-full mx-auto mb-3 flex items-center justify-center">
                        <i class="fas fa-ambulance text-3xl text-red-300"></i>
                    </div>
                    <p class="text-center font-medium">Emergenciólogo</p>
                </div>
            </div>
        </div>

        <!-- Difficulty Selection -->
        <div class="w-full max-w-2xl mb-12">
            <h2 class="text-2xl font-bold mb-6 text-center">Selecciona la dificultad</h2>
            <div class="grid grid-cols-3 gap-4">
                <div
                    class="bg-green-500/20 p-4 rounded-xl border-2 border-green-400/50 cursor-pointer transform hover:scale-105 transition-all">
                    <p class="text-center font-bold">Principiante</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-gray-400/50 ml-1"></i>
                        <i class="fas fa-star text-gray-400/50 ml-1"></i>
                    </div>
                </div>
                <div
                    class="bg-yellow-500/20 p-4 rounded-xl border-2 border-yellow-400/50 cursor-pointer transform hover:scale-105 transition-all">
                    <p class="text-center font-bold">Intermedio</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300 ml-1"></i>
                        <i class="fas fa-star text-gray-400/50 ml-1"></i>
                    </div>
                </div>
                <div
                    class="bg-red-500/20 p-4 rounded-xl border-2 border-red-400/50 cursor-pointer transform hover:scale-105 transition-all">
                    <p class="text-center font-bold">Avanzado</p>
                    <div class="flex justify-center mt-2">
                        <i class="fas fa-star text-yellow-300"></i>
                        <i class="fas fa-star text-yellow-300 ml-1"></i>
                        <i class="fas fa-star text-yellow-300 ml-1"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Button -->
        <button
            class="px-12 py-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full text-xl font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all pulse">
            <i class="fas fa-play mr-3"></i> COMENZAR AVENTURA
        </button>

        <!-- Animated Background Elements -->
        <div class="absolute top-1/4 left-10 w-8 h-8 rounded-full bg-blue-400/20 animate-pulse"></div>
        <div class="absolute bottom-1/3 right-20 w-12 h-12 rounded-full bg-purple-400/20 animate-pulse delay-300"></div>
        <div class="absolute top-1/3 right-1/4 w-6 h-6 rounded-full bg-pink-400/20 animate-pulse delay-700"></div>
        <div class="absolute bottom-1/4 left-1/3 w-10 h-10 rounded-full bg-green-400/20 animate-pulse delay-1000"></div>
    </div>

    <script>
        // Simple animation for cards
        document.querySelectorAll('.grid > div').forEach((card, index) => {
            setTimeout(() => {
                card.classList.add('card-enter-active');
            }, index * 100);
        });

        // Character selection
        const characters = document.querySelectorAll('.grid > div');
        characters.forEach(char => {
            char.addEventListener('click', () => {
                characters.forEach(c => c.classList.remove('border-blue-500/30', 'border-blue-400'));
                char.classList.add('border-blue-500/30', 'border-blue-400');
            });
        });

        // Difficulty selection
        const difficulties = document.querySelectorAll('.grid-cols-3 > div');
        difficulties.forEach(diff => {
            diff.addEventListener('click', () => {
                difficulties.forEach(d => d.classList.remove('border-2', 'border-blue-400'));
                diff.classList.add('border-2', 'border-blue-400');
            });
        });
    </script>
</body>

</html>
