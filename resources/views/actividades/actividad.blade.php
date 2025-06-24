<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorador Médico AR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .medical-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            border: 2px solid transparent;
        }

        .medical-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .medical-btn:active {
            transform: translateY(0);
        }

        .medical-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: 0.5s;
        }

        .medical-btn:hover::before {
            left: 100%;
        }

        .pulse-medical {
            animation: pulse-medical 2s infinite;
        }

        @keyframes pulse-medical {
            0% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(16, 185, 129, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        .glow-medical {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .ar-viewer-medical {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 20, 30, 0.95);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .close-ar-medical {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
            color: white;
            font-size: 24px;
            background: rgba(255, 255, 255, 0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        .ar-container-medical {
            width: 90%;
            height: 80%;
            background: rgba(10, 30, 40, 0.7);
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            border: 1px solid rgba(100, 200, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 30px rgba(0, 150, 255, 0.2);
        }

        .anatomy-label {
            position: absolute;
            background: rgba(0, 100, 150, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 10;
            border: 1px solid rgba(100, 200, 255, 0.5);
            backdrop-filter: blur(5px);
        }

        .tooltip {
            position: relative;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        .tooltip-text {
            visibility: hidden;
            width: 200px;
            background-color: rgba(10, 30, 40, 0.9);
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 10px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 14px;
            border: 1px solid rgba(100, 200, 255, 0.3);
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        .heartbeat {
            animation: heartbeat 1.5s ease infinite;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }

            25% {
                transform: scale(1.05);
            }

            50% {
                transform: scale(1);
            }

            75% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-gray-900 to-blue-900 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-6xl mx-auto text-center">
        <div class="flex items-center justify-center mb-8">
            <i class="fas fa-heartbeat text-4xl text-red-500 mr-4 heartbeat"></i>
            <h1 class="text-4xl md:text-5xl font-bold text-white">Explorador Médico AR</h1>
            <i class="fas fa-brain text-4xl text-blue-400 ml-4 floating"></i>
        </div>
        <p class="text-lg text-blue-200 mb-12">Explora la anatomía humana en 3D con realidad aumentada. Selecciona un
            sistema para comenzar.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Sistema Esquelético -->
            <button onclick="openMedicalAR('skeletal')"
                class="medical-btn bg-gradient-to-br from-gray-600 to-gray-800 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center pulse-medical">
                <div class="tooltip">
                    <i class="fas fa-bone text-5xl mb-4 glow-medical"></i>
                    <span class="tooltip-text">Visualiza el sistema óseo completo con detalles anatómicos
                        precisos</span>
                </div>
                <span class="text-xl font-semibold">Sistema Esquelético</span>
                <span class="text-sm mt-2 opacity-90">206 huesos detallados</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-green-600 text-xs px-2 py-1 rounded-full">Interactivo</span>
                </div>
            </button>

            <!-- Sistema Muscular -->
            <button onclick="openMedicalAR('muscular')"
                class="medical-btn bg-gradient-to-br from-red-600 to-red-800 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center">
                <div class="tooltip">
                    <i class="fas fa-dumbbell text-5xl mb-4 glow-medical"></i>
                    <span class="tooltip-text">Explora más de 600 músculos con sus funciones y conexiones</span>
                </div>
                <span class="text-xl font-semibold">Sistema Muscular</span>
                <span class="text-sm mt-2 opacity-90">Músculos y tendones</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-purple-600 text-xs px-2 py-1 rounded-full">Animaciones</span>
                </div>
            </button>

            <!-- Sistema Nervioso -->
            <button onclick="openMedicalAR('nervous')"
                class="medical-btn bg-gradient-to-br from-yellow-500 to-yellow-700 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center">
                <div class="tooltip">
                    <i class="fas fa-brain text-5xl mb-4 glow-medical"></i>
                    <span class="tooltip-text">Sistema nervioso central y periférico con simulaciones de impulso
                        nervioso</span>
                </div>
                <span class="text-xl font-semibold">Sistema Nervioso</span>
                <span class="text-sm mt-2 opacity-90">Cerebro y neuronas</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-yellow-600 text-xs px-2 py-1 rounded-full">Simulación</span>
                </div>
            </button>

            <!-- Sistema Cardiovascular -->
            <button onclick="openMedicalAR('cardiovascular')"
                class="medical-btn bg-gradient-to-br from-red-500 to-pink-700 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center">
                <div class="tooltip">
                    <i class="fas fa-heart text-5xl mb-4 glow-medical heartbeat"></i>
                    <span class="tooltip-text">Corazón, venas y arterias con animación de flujo sanguíneo en tiempo
                        real</span>
                </div>
                <span class="text-xl font-semibold">Cardiovascular</span>
                <span class="text-sm mt-2 opacity-90">Corazón y vasos</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-red-600 text-xs px-2 py-1 rounded-full">Tiempo real</span>
                </div>
            </button>

            <!-- Sistema Respiratorio -->
            <button onclick="openMedicalAR('respiratory')"
                class="medical-btn bg-gradient-to-br from-blue-400 to-blue-600 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center">
                <div class="tooltip">
                    <i class="fas fa-lungs text-5xl mb-4 glow-medical floating"></i>
                    <span class="tooltip-text">Pulmones y vías respiratorias con simulación de respiración</span>
                </div>
                <span class="text-xl font-semibold">Respiratorio</span>
                <span class="text-sm mt-2 opacity-90">Pulmones y diafragma</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-teal-600 text-xs px-2 py-1 rounded-full">Dinámico</span>
                </div>
            </button>

            <!-- Sistema Digestivo -->
            <button onclick="openMedicalAR('digestive')"
                class="medical-btn bg-gradient-to-br from-green-500 to-green-700 text-white py-8 px-6 rounded-xl flex flex-col items-center justify-center">
                <div class="tooltip">
                    <i class="fas fa-stomach text-5xl mb-4 glow-medical"></i>
                    <span class="tooltip-text">Tracto digestivo completo con proceso de digestión animado</span>
                </div>
                <span class="text-xl font-semibold">Digestivo</span>
                <span class="text-sm mt-2 opacity-90">Órganos y procesos</span>
                <div class="mt-3 flex space-x-1">
                    <span class="bg-gray-700 text-xs px-2 py-1 rounded-full">3D</span>
                    <span class="bg-blue-600 text-xs px-2 py-1 rounded-full">AR</span>
                    <span class="bg-green-600 text-xs px-2 py-1 rounded-full">Proceso</span>
                </div>
            </button>
        </div>

        <div class="mt-12 bg-white/10 p-6 rounded-xl shadow-lg backdrop-blur-sm border border-white/10">
            <h2 class="text-2xl font-bold text-white mb-4 flex items-center justify-center">
                <i class="fas fa-graduation-cap mr-3 text-blue-300"></i> Modos de Exploración
            </h2>
            <p class="text-blue-200 mb-6">Selecciona cómo deseas interactuar con los modelos anatómicos:</p>
            <div class="flex flex-wrap justify-center gap-4">
                <button onclick="setInteractionMode('isolate')"
                    class="flex items-center bg-blue-900/50 hover:bg-blue-800/70 px-4 py-3 rounded-xl border border-blue-700/50 transition-all">
                    <i class="fas fa-expand-arrows-alt text-blue-300 mr-3 text-xl"></i>
                    <div class="text-left">
                        <div class="font-semibold text-white">Modo Aislamiento</div>
                        <div class="text-xs text-blue-200">Enfócate en un solo sistema</div>
                    </div>
                </button>
                <button onclick="setInteractionMode('layers')"
                    class="flex items-center bg-purple-900/50 hover:bg-purple-800/70 px-4 py-3 rounded-xl border border-purple-700/50 transition-all">
                    <i class="fas fa-layer-group text-purple-300 mr-3 text-xl"></i>
                    <div class="text-left">
                        <div class="font-semibold text-white">Modo Capas</div>
                        <div class="text-xs text-purple-200">Controla la transparencia</div>
                    </div>
                </button>
                <button onclick="setInteractionMode('compare')"
                    class="flex items-center bg-green-900/50 hover:bg-green-800/70 px-4 py-3 rounded-xl border border-green-700/50 transition-all">
                    <i class="fas fa-balance-scale text-green-300 mr-3 text-xl"></i>
                    <div class="text-left">
                        <div class="font-semibold text-white">Modo Comparación</div>
                        <div class="text-xs text-green-200">Contrasta sistemas</div>
                    </div>
                </button>
                <button onclick="setInteractionMode('pathology')"
                    class="flex items-center bg-red-900/50 hover:bg-red-800/70 px-4 py-3 rounded-xl border border-red-700/50 transition-all">
                    <i class="fas fa-notes-medical text-red-300 mr-3 text-xl"></i>
                    <div class="text-left">
                        <div class="font-semibold text-white">Modo Patologías</div>
                        <div class="text-xs text-red-200">Visualiza condiciones médicas</div>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Medical AR Viewer -->
    <div id="medicalARViewer" class="ar-viewer-medical">
        <span class="close-ar-medical" onclick="closeMedicalAR()"><i class="fas fa-times"></i></span>
        <div class="ar-container-medical">
            <div id="medicalARContent" class="text-center w-full h-full relative">
                <div class="animate-pulse flex flex-col items-center justify-center h-full">
                    <i class="fas fa-atom text-6xl mb-4 text-blue-400 spin"></i>
                    <h3 class="text-2xl font-bold mb-2 text-white">Cargando Atlas Anatómico</h3>
                    <p class="mb-4 text-blue-300">Preparando modelos 3D de alta precisión</p>
                    <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                        <div id="medicalProgressBar" class="bg-teal-500 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 text-white text-center w-full max-w-md">
            <div class="flex justify-center space-x-4 mb-4">
                <button onclick="rotateModel('left')"
                    class="bg-blue-800/70 hover:bg-blue-700/90 text-white font-bold py-2 px-4 rounded-full border border-blue-600/50">
                    <i class="fas fa-undo mr-2"></i> Rotar
                </button>
                <button onclick="toggleLayers()"
                    class="bg-purple-800/70 hover:bg-purple-700/90 text-white font-bold py-2 px-4 rounded-full border border-purple-600/50">
                    <i class="fas fa-eye mr-2"></i> Capas
                </button>
                <button onclick="zoomModel('in')"
                    class="bg-green-800/70 hover:bg-green-700/90 text-white font-bold py-2 px-4 rounded-full border border-green-600/50">
                    <i class="fas fa-search-plus mr-2"></i> Zoom
                </button>
            </div>
            <p class="text-sm text-blue-300">Usa gestos táctiles o controles para interactuar con el modelo</p>
        </div>
    </div>

    <script>
        let currentSystem = '';
        let interactionMode = 'isolate';

        function openMedicalAR(system) {
            currentSystem = system;
            const viewer = document.getElementById('medicalARViewer');
            const content = document.getElementById('medicalARContent');

            viewer.style.display = 'flex';
            content.innerHTML = `
                <div class="animate-pulse flex flex-col items-center justify-center h-full">
                    <i class="fas fa-${getMedicalIcon(system)} text-6xl mb-4 text-${getMedicalColor(system)}-400 spin"></i>
                    <h3 class="text-2xl font-bold mb-2 text-white">Cargando ${getSystemName(system)}</h3>
                    <p class="mb-4 text-${getMedicalColor(system)}-300">Preparando modelos 3D de alta precisión</p>
                    <div class="w-1/2 bg-gray-700 rounded-full h-2.5">
                        <div id="medicalProgressBar" class="bg-${getMedicalColor(system)}-500 h-2.5 rounded-full" style="width: 0%"></div>
                    </div>
                </div>
            `;

            // Simular progreso de carga
            let progress = 0;
            const progressInterval = setInterval(() => {
                progress += 2;
                document.getElementById('medicalProgressBar').style.width = `${progress}%`;

                if (progress >= 100) {
                    clearInterval(progressInterval);
                    // Mostrar modelo médico
                    setTimeout(() => {
                        loadMedicalModel(system);
                    }, 500);
                }
            }, 50);
        }

        function loadMedicalModel(system) {
            const content = document.getElementById('medicalARContent');
            const systemName = getSystemName(system);
            const systemColor = getMedicalColor(system);

            content.innerHTML = `
                <div class="relative w-full h-full">
                    <div class="ar-scene-medical absolute inset-0 flex items-center justify-center">
                        <div class="ar-model bg-${systemColor}-500/10 border-2 border-${systemColor}-400 rounded-2xl w-full h-full flex items-center justify-center relative overflow-hidden">
                            <i class="fas fa-${getMedicalIcon(system)} text-8xl text-${systemColor}-400/30 absolute"></i>
                            <div class="ar-model-content z-10 w-64 h-64 md:w-96 md:h-96 bg-${systemColor}-500/20 border-2 border-dashed border-${systemColor}-400 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-${getMedicalIcon(system)} text-6xl text-${systemColor}-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="absolute top-4 left-0 right-0 text-center">
                        <span class="bg-${systemColor}-800/80 text-white px-4 py-1 rounded-full text-sm font-medium">${systemName}</span>
                    </div>
                    ${generateAnatomyLabels(system)}
                </div>
            `;

            // Agregar animación al modelo
            const model = document.querySelector('.ar-model-content');
            model.classList.add('floating');

            // Mostrar notificación de carga completada
            showMedicalNotification(`Modelo ${systemName} cargado`, systemColor);
        }

        function generateAnatomyLabels(system) {
            const labels = {
                skeletal: [{
                        name: "Cráneo",
                        top: "30%",
                        left: "50%"
                    },
                    {
                        name: "Fémur",
                        top: "70%",
                        left: "50%"
                    },
                    {
                        name: "Columna",
                        top: "50%",
                        left: "50%"
                    }
                ],
                muscular: [{
                        name: "Bíceps",
                        top: "40%",
                        left: "30%"
                    },
                    {
                        name: "Abdominales",
                        top: "60%",
                        left: "50%"
                    },
                    {
                        name: "Cuádriceps",
                        top: "75%",
                        left: "50%"
                    }
                ],
                nervous: [{
                        name: "Cerebro",
                        top: "30%",
                        left: "50%"
                    },
                    {
                        name: "Médula",
                        top: "60%",
                        left: "50%"
                    },
                    {
                        name: "Nervios",
                        top: "75%",
                        left: "30%"
                    }
                ],
                cardiovascular: [{
                        name: "Corazón",
                        top: "50%",
                        left: "50%"
                    },
                    {
                        name: "Aorta",
                        top: "55%",
                        left: "50%"
                    },
                    {
                        name: "Venas",
                        top: "65%",
                        left: "40%"
                    }
                ],
                respiratory: [{
                        name: "Pulmones",
                        top: "50%",
                        left: "50%"
                    },
                    {
                        name: "Tráquea",
                        top: "40%",
                        left: "50%"
                    },
                    {
                        name: "Diafragma",
                        top: "70%",
                        left: "50%"
                    }
                ],
                digestive: [{
                        name: "Estómago",
                        top: "50%",
                        left: "50%"
                    },
                    {
                        name: "Intestino",
                        top: "60%",
                        left: "50%"
                    },
                    {
                        name: "Hígado",
                        top: "45%",
                        left: "60%"
                    }
                ]
            };

            let labelsHTML = '';
            const systemLabels = labels[system] || [];
            const labelColor = getMedicalColor(system);

            systemLabels.forEach(label => {
                labelsHTML += `
                    <div class="anatomy-label" style="top:${label.top}; left:${label.left}; background:rgba(var(--${labelColor}-600),0.8);">
                        ${label.name}
                    </div>
                `;
            });

            return labelsHTML;
        }

        function closeMedicalAR() {
            document.getElementById('medicalARViewer').style.display = 'none';
        }

        function rotateModel(direction) {
            const model = document.querySelector('.ar-model-content');
            model.style.transform = direction === 'left' ?
                'rotateY(-30deg)' :
                'rotateY(30deg)';

            setTimeout(() => {
                model.style.transform = 'rotateY(0deg)';
            }, 500);

            showMedicalNotification(`Rotando modelo ${direction === 'left' ? 'izquierda' : 'derecha'}`, 'blue');
        }

        function toggleLayers() {
            const model = document.querySelector('.ar-model');
            const currentOpacity = window.getComputedStyle(model).getPropertyValue('opacity');
            model.style.opacity = currentOpacity === '1' ? '0.5' : '1';

            showMedicalNotification(`Transparencia ${currentOpacity === '1' ? 'activada' : 'desactivada'}`, 'purple');
        }

        function zoomModel(action) {
            const model = document.querySelector('.ar-model-content');
            const currentScale = model.style.transform.includes('scale') ?
                parseFloat(model.style.transform.match(/scale\(([^)]+)\)/)[1]) :
                1;

            const newScale = action === 'in' ? currentScale * 1.2 : currentScale * 0.8;
            model.style.transform = `scale(${newScale})`;

            showMedicalNotification(`Zoom ${action === 'in' ? 'aumentado' : 'disminuido'}`, 'green');
        }

        function setInteractionMode(mode) {
            interactionMode = mode;
            const modes = {
                'isolate': {
                    color: 'blue',
                    icon: 'expand-arrows-alt'
                },
                'layers': {
                    color: 'purple',
                    icon: 'layer-group'
                },
                'compare': {
                    color: 'green',
                    icon: 'balance-scale'
                },
                'pathology': {
                    color: 'red',
                    icon: 'notes-medical'
                }
            };

            showMedicalNotification(`Modo ${mode} activado`, modes[mode].color);
        }

        function showMedicalNotification(message, color) {
            const notification = document.createElement('div');
            notification.className =
                `fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-${color}-800 text-white px-4 py-2 rounded-full text-sm flex items-center animate-fade-in`;
            notification.innerHTML = `
                <i class="fas fa-${getNotificationIcon(color)} mr-2"></i>
                ${message}
            `;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.classList.add('animate-fade-out');
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }

        function getNotificationIcon(color) {
            const icons = {
                'blue': 'info-circle',
                'purple': 'eye',
                'green': 'check-circle',
                'red': 'exclamation-triangle',
                'gray': 'cog',
                'yellow': 'lightbulb'
            };
            return icons[color] || 'info-circle';
        }

        function getMedicalIcon(system) {
            const icons = {
                'skeletal': 'bone',
                'muscular': 'dumbbell',
                'nervous': 'brain',
                'cardiovascular': 'heartbeat',
                'respiratory': 'lungs',
                'digestive': 'stomach'
            };
            return icons[system] || 'atom';
        }

        function getMedicalColor(system) {
            const colors = {
                'skeletal': 'gray',
                'muscular': 'red',
                'nervous': 'yellow',
                'cardiovascular': 'pink',
                'respiratory': 'blue',
                'digestive': 'green'
            };
            return colors[system] || 'blue';
        }

        function getSystemName(system) {
            const names = {
                'skeletal': 'Sistema Esquelético',
                'muscular': 'Sistema Muscular',
                'nervous': 'Sistema Nervioso',
                'cardiovascular': 'Sistema Cardiovascular',
                'respiratory': 'Sistema Respiratorio',
                'digestive': 'Sistema Digestivo'
            };
            return names[system] || 'Modelo Anatómico';
        }

        // Agregar animación de giro
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
            .spin { animation: spin 2s linear infinite; }

            @keyframes animate-fade-in {
                from { opacity: 0; transform: translate(-50%, 10px); }
                to { opacity: 1; transform: translate(-50%, 0); }
            }
            .animate-fade-in { animation: animate-fade-in 0.3s ease-out forwards; }

            @keyframes animate-fade-out {
                from { opacity: 1; transform: translate(-50%, 0); }
                to { opacity: 0; transform: translate(-50%, -10px); }
            }
            .animate-fade-out { animation: animate-fade-out 0.3s ease-in forwards; }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>
