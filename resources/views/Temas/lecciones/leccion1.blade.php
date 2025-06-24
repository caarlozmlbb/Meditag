<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedQuiz - Plataforma de Evaluación Médica</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .question-card {
            transition: all 0.3s ease;
        }

        .question-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            transition: width 0.5s ease;
        }

        .option-selected {
            background-color: #3b82f6;
            color: white;
        }

        .correct-answer {
            background-color: #10b981;
            color: white;
        }

        .wrong-answer {
            background-color: #ef4444;
            color: white;
        }

        .pulse-animation {
            animation: pulse 2s infinite;
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
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Header -->

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4 bg-white rounded-lg shadow-md p-6 h-fit">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Temario</h2>
                <div class="space-y-2">
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                        <span class="font-medium">Anatomía</span>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">12</span>
                    </div>
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                        <span>Fisiología</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">8</span>
                    </div>
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                        <span>Farmacología</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">15</span>
                    </div>
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                        <span>Patología</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">20</span>
                    </div>
                    <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-lg cursor-pointer">
                        <span>Microbiología</span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">10</span>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Tu Progreso</h2>
                    <div class="bg-gray-100 rounded-full h-4 mb-2">
                        <div class="bg-blue-600 h-4 rounded-full progress-bar" style="width: 45%"></div>
                    </div>
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>45% completado</span>
                        <span>27/60 preguntas</span>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Logros</h2>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="bg-yellow-100 p-3 rounded-lg flex flex-col items-center">
                            <i class="fas fa-award text-yellow-500 text-xl mb-1"></i>
                            <span class="text-xs text-center">Novato</span>
                        </div>
                        <div class="bg-gray-100 p-3 rounded-lg flex flex-col items-center opacity-50">
                            <i class="fas fa-brain text-gray-400 text-xl mb-1"></i>
                            <span class="text-xs text-center">Experto</span>
                        </div>
                        <div class="bg-gray-100 p-3 rounded-lg flex flex-col items-center opacity-50">
                            <i class="fas fa-trophy text-gray-400 text-xl mb-1"></i>
                            <span class="text-xs text-center">Maestro</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Quiz Area -->
            <div class="w-full lg:w-3/4">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Quiz Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                        <div class="flex justify-between items-center mb-2">
                            <h2 class="text-2xl font-bold">Evaluación de Anatomía</h2>
                            <div class="bg-blue-400 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-clock mr-1"></i>
                                <span id="timer">05:00</span>
                            </div>
                        </div>
                        <p class="text-blue-100">Tema: Sistema Cardiovascular</p>
                    </div>

                    <!-- Progress -->
                    <div class="px-6 pt-4 pb-2 border-b">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Pregunta 5 de 12</span>
                            <span>Dificultad: Media</span>
                        </div>
                        <div class="bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 42%"></div>
                        </div>
                    </div>

                    <!-- Question Area -->
                    <div class="p-6">
                        <!-- Question -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">¿Cuál de las siguientes estructuras
                                forma parte del sistema de conducción cardíaco?</h3>

                            <!-- Multiple Choice Question -->
                            <div id="multiple-choice" class="space-y-3">
                                <div class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 option"
                                    onclick="selectOption(this)">
                                    <div
                                        class="w-6 h-6 rounded-full border border-gray-300 mr-3 flex items-center justify-center option-selector">
                                    </div>
                                    <span>Válvula mitral</span>
                                </div>
                                <div class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 option"
                                    onclick="selectOption(this)">
                                    <div
                                        class="w-6 h-6 rounded-full border border-gray-300 mr-3 flex items-center justify-center option-selector">
                                    </div>
                                    <span>Nódulo sinusal</span>
                                </div>
                                <div class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 option"
                                    onclick="selectOption(this)">
                                    <div
                                        class="w-6 h-6 rounded-full border border-gray-300 mr-3 flex items-center justify-center option-selector">
                                    </div>
                                    <span>Arteria coronaria derecha</span>
                                </div>
                                <div class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50 option"
                                    onclick="selectOption(this)">
                                    <div
                                        class="w-6 h-6 rounded-full border border-gray-300 mr-3 flex items-center justify-center option-selector">
                                    </div>
                                    <span>Venas pulmonares</span>
                                </div>
                            </div>
                        </div>

                        <!-- True/False Question (Hidden by default) -->
                        <div id="true-false-question" class="mb-8 hidden">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">El ventrículo izquierdo tiene una pared
                                más gruesa que el ventrículo derecho porque bombea sangre a una presión más alta.</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <button class="p-4 bg-green-100 hover:bg-green-200 rounded-lg font-medium text-center"
                                    onclick="answerTrueFalse(this, true)">
                                    <i class="fas fa-check mr-2"></i>Verdadero
                                </button>
                                <button class="p-4 bg-red-100 hover:bg-red-200 rounded-lg font-medium text-center"
                                    onclick="answerTrueFalse(this, false)">
                                    <i class="fas fa-times mr-2"></i>Falso
                                </button>
                            </div>
                        </div>

                        <!-- Image-based Question (Hidden by default) -->
                        <div id="image-question" class="mb-8 hidden">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Identifique la estructura señalada en
                                la imagen:</h3>
                            <div class="bg-gray-100 rounded-lg p-4 mb-4 flex justify-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Heart_diagram_es.svg/800px-Heart_diagram_es.svg.png"
                                    alt="Anatomía cardíaca" class="max-h-64">
                                <div class="absolute mt-20 ml-32">
                                    <div
                                        class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center text-white font-bold">
                                        ?</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <button class="p-3 border rounded-lg hover:bg-gray-50"
                                    onclick="answerImageQuestion(this)">Válvula aórtica</button>
                                <button class="p-3 border rounded-lg hover:bg-gray-50"
                                    onclick="answerImageQuestion(this)">Válvula pulmonar</button>
                                <button class="p-3 border rounded-lg hover:bg-gray-50"
                                    onclick="answerImageQuestion(this)">Válvula tricúspide</button>
                                <button class="p-3 border rounded-lg hover:bg-gray-50"
                                    onclick="answerImageQuestion(this)">Válvula mitral</button>
                            </div>
                        </div>

                        <!-- Fill in the blank Question (Hidden by default) -->
                        <div id="fill-blank-question" class="mb-8 hidden">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Complete el enunciado:</h3>
                            <p class="mb-4">La ___________ es la capa más interna del corazón y está en contacto
                                directo con la sangre.</p>
                            <div class="flex">
                                <input type="text"
                                    class="flex-1 border rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Escriba su respuesta">
                                <button class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600"
                                    onclick="checkFillBlankAnswer()">Verificar</button>
                            </div>
                        </div>

                        <!-- Explanation (Shown after answering) -->
                        <div id="explanation" class="bg-blue-50 p-4 rounded-lg mb-6 hidden">
                            <div class="flex items-start">
                                <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-bold text-blue-800 mb-2">Explicación:</h4>
                                    <p class="text-blue-700">El nódulo sinusal (también llamado nódulo sinoauricular)
                                        es el marcapasos natural del corazón y forma parte del sistema de conducción
                                        cardíaco. Genera impulsos eléctricos que se propagan a través del miocardio,
                                        provocando su contracción.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="flex justify-between">
                            <button class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-50"
                                onclick="previousQuestion()">
                                <i class="fas fa-arrow-left mr-2"></i>Anterior
                            </button>
                            <div class="space-x-3">
                                <button class="px-4 py-2 bg-gray-100 rounded-lg text-gray-700 hover:bg-gray-200"
                                    onclick="flagQuestion()">
                                    <i class="fas fa-flag mr-2"></i>Marcar
                                </button>
                                <button id="next-btn"
                                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                                    onclick="nextQuestion()">
                                    Siguiente<i class="fas fa-arrow-right ml-2"></i>
                                </button>
                                <button id="submit-btn"
                                    class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 hidden"
                                    onclick="submitQuiz()">
                                    Finalizar<i class="fas fa-check ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Question Type Selector -->
                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white p-6 rounded-lg shadow-md question-card cursor-pointer"
                        onclick="loadQuestionType('multiple-choice')">
                        <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-list-ol text-blue-500 text-xl"></i>
                        </div>
                        <h3 class="text-center font-medium">Selección Múltiple</h3>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md question-card cursor-pointer"
                        onclick="loadQuestionType('true-false-question')">
                        <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-check-double text-green-500 text-xl"></i>
                        </div>
                        <h3 class="text-center font-medium">Verdadero/Falso</h3>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md question-card cursor-pointer"
                        onclick="loadQuestionType('image-question')">
                        <div
                            class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-image text-purple-500 text-xl"></i>
                        </div>
                        <h3 class="text-center font-medium">Identificación</h3>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md question-card cursor-pointer"
                        onclick="loadQuestionType('fill-blank-question')">
                        <div
                            class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mb-4 mx-auto">
                            <i class="fas fa-pen text-yellow-500 text-xl"></i>
                        </div>
                        <h3 class="text-center font-medium">Completar</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Results Modal (Hidden by default) -->
    <div id="results-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
            <div class="bg-green-500 p-6 rounded-t-lg text-white">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">¡Evaluación completada!</h2>
                    <button onclick="closeModal()" class="text-white hover:text-gray-200">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p>Resultados de tu evaluación</p>
            </div>
            <div class="p-6">
                <div class="flex justify-center mb-8">
                    <div class="relative w-40 h-40">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            <circle class="text-gray-200" stroke-width="10" stroke="currentColor" fill="transparent"
                                r="40" cx="50" cy="50" />
                            <circle class="text-green-500" stroke-width="10" stroke="currentColor"
                                fill="transparent" r="40" cx="50" cy="50" stroke-dasharray="251.2"
                                stroke-dashoffset="75.36" />
                        </svg>
                        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
                            <span class="text-3xl font-bold">70%</span>
                            <span class="text-sm text-gray-500">Correctas</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="bg-green-50 p-4 rounded-lg text-center">
                        <div class="text-green-500 text-2xl font-bold mb-1">7</div>
                        <div class="text-sm text-gray-600">Correctas</div>
                    </div>
                    <div class="bg-red-50 p-4 rounded-lg text-center">
                        <div class="text-red-500 text-2xl font-bold mb-1">3</div>
                        <div class="text-sm text-gray-600">Incorrectas</div>
                    </div>
                    <div class="bg-blue-50 p-4 rounded-lg text-center">
                        <div class="text-blue-500 text-2xl font-bold mb-1">0</div>
                        <div class="text-sm text-gray-600">Sin responder</div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="font-medium mb-2">Desempeño por categoría:</h3>
                    <div class="space-y-2">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>Anatomía</span>
                                <span>80%</span>
                            </div>
                            <div class="bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 80%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>Fisiología</span>
                                <span>60%</span>
                            </div>
                            <div class="bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 60%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span>Patología</span>
                                <span>50%</span>
                            </div>
                            <div class="bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 50%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <button class="px-6 py-2 border rounded-lg text-gray-700 hover:bg-gray-50" onclick="closeModal()">
                        Revisar respuestas
                    </button>
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                        onclick="closeModal()">
                        Continuar estudiando <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variables de estado
        let currentQuestion = 1;
        const totalQuestions = 12;
        let timeLeft = 300; // 5 minutos en segundos
        let timerInterval;
        let currentQuestionType = 'multiple-choice';

        // Inicializar el temporizador
        function startTimer() {
            updateTimerDisplay();
            timerInterval = setInterval(() => {
                timeLeft--;
                updateTimerDisplay();
                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    submitQuiz();
                }
            }, 1000);
        }

        function updateTimerDisplay() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            document.getElementById('timer').textContent =
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        // Selección de opciones
        function selectOption(element) {
            const options = document.querySelectorAll('.option');
            options.forEach(opt => {
                opt.classList.remove('option-selected');
                opt.querySelector('.option-selector').innerHTML = '';
            });

            element.classList.add('option-selected');
            element.querySelector('.option-selector').innerHTML = '<i class="fas fa-check text-white text-xs"></i>';
            element.querySelector('.option-selector').classList.add('bg-blue-500', 'border-blue-500');

            // Mostrar explicación (simulado)
            setTimeout(() => {
                document.getElementById('explanation').classList.remove('hidden');
            }, 500);
        }

        // Respuesta verdadero/falso
        function answerTrueFalse(element, answer) {
            const buttons = document.querySelectorAll('#true-false-question button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-green-500', 'bg-red-500', 'text-white');
                btn.classList.add(btn.textContent.includes('Verdadero') ? 'bg-green-100' : 'bg-red-100');
            });

            // Simular respuesta correcta (verdadero)
            const isCorrect = answer === true;
            if (isCorrect) {
                element.classList.remove('bg-green-100');
                element.classList.add('bg-green-500', 'text-white');
            } else {
                element.classList.remove('bg-red-100');
                element.classList.add('bg-red-500', 'text-white');
            }

            // Mostrar explicación
            document.getElementById('explanation').classList.remove('hidden');
        }

        // Respuesta pregunta con imagen
        function answerImageQuestion(element) {
            const buttons = document.querySelectorAll('#image-question button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-green-500', 'text-white');
                btn.classList.add('border', 'hover:bg-gray-50');
            });

            // Simular respuesta correcta (Válvula mitral)
            const isCorrect = element.textContent.includes('Válvula mitral');
            if (isCorrect) {
                element.classList.remove('border', 'hover:bg-gray-50');
                element.classList.add('bg-green-500', 'text-white');
            } else {
                element.classList.remove('border', 'hover:bg-gray-50');
                element.classList.add('bg-red-500', 'text-white');
            }

            // Mostrar explicación
            document.getElementById('explanation').classList.remove('hidden');
        }

        // Verificar respuesta de completar espacios
        function checkFillBlankAnswer() {
            const input = document.querySelector('#fill-blank-question input');
            // Simular respuesta correcta ("endocardio")
            const isCorrect = input.value.toLowerCase() === 'endocardio';

            if (isCorrect) {
                input.classList.remove('border');
                input.classList.add('border-green-500', 'bg-green-50');
            } else {
                input.classList.remove('border');
                input.classList.add('border-red-500', 'bg-red-50');
            }

            // Mostrar explicación
            document.getElementById('explanation').classList.remove('hidden');
        }

        // Navegación entre preguntas
        function nextQuestion() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                updateQuestionCounter();

                // Ocultar todas las preguntas
                document.querySelectorAll('[id$="-question"], #multiple-choice').forEach(el => {
                    el.classList.add('hidden');
                });

                // Mostrar la pregunta actual según el tipo
                document.getElementById(currentQuestionType).classList.remove('hidden');

                // Ocultar explicación para la nueva pregunta
                document.getElementById('explanation').classList.add('hidden');

                // Mostrar botón de finalizar si es la última pregunta
                if (currentQuestion === totalQuestions) {
                    document.getElementById('next-btn').classList.add('hidden');
                    document.getElementById('submit-btn').classList.remove('hidden');
                }
            }
        }

        function previousQuestion() {
            if (currentQuestion > 1) {
                currentQuestion--;
                updateQuestionCounter();

                // Ocultar todas las preguntas
                document.querySelectorAll('[id$="-question"], #multiple-choice').forEach(el => {
                    el.classList.add('hidden');
                });

                // Mostrar la pregunta actual según el tipo
                document.getElementById(currentQuestionType).classList.remove('hidden');

                // Ocultar explicación para la nueva pregunta
                document.getElementById('explanation').classList.add('hidden');

                // Asegurarse de que el botón siguiente esté visible
                document.getElementById('next-btn').classList.remove('hidden');
                document.getElementById('submit-btn').classList.add('hidden');
            }
        }

        function updateQuestionCounter() {
            document.querySelector('#quiz-header span').textContent = `Pregunta ${currentQuestion} de ${totalQuestions}`;
            const progress = (currentQuestion / totalQuestions) * 100;
            document.querySelector('#quiz-header .bg-blue-500').style.width = `${progress}%`;
        }

        // Marcar pregunta
        function flagQuestion() {
            // Implementar lógica para marcar preguntas
            alert('Pregunta marcada para revisión posterior');
        }

        // Cargar tipo de pregunta
        function loadQuestionType(type) {
            currentQuestionType = type;

            // Ocultar todas las preguntas
            document.querySelectorAll('[id$="-question"], #multiple-choice').forEach(el => {
                el.classList.add('hidden');
            });

            // Mostrar la pregunta seleccionada
            document.getElementById(type).classList.remove('hidden');

            // Ocultar explicación
            document.getElementById('explanation').classList.add('hidden');
        }

        // Finalizar cuestionario
        function submitQuiz() {
            clearInterval(timerInterval);
            document.getElementById('results-modal').classList.remove('hidden');
        }

        // Cerrar modal
        function closeModal() {
            document.getElementById('results-modal').classList.add('hidden');
        }

        // Inicializar
        document.addEventListener('DOMContentLoaded', () => {
            startTimer();
        });
    </script>
</body>

</html>
