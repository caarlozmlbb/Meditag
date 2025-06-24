<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>MindAR + Modelo 3D Estable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Import Map para Three.js y MindAR -->
    <script type="importmap">
      {
        "imports": {
          "three": "https://unpkg.com/three@0.160.0/build/three.module.js",
          "three/addons/": "https://unpkg.com/three@0.160.0/examples/jsm/",
          "mindar-image-three": "https://cdn.jsdelivr.net/npm/mind-ar@1.2.5/dist/mindar-image-three.prod.js"
        }
      }
    </script>

    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        #container {
            width: 100vw;
            height: 100vh;
            position: relative;
        }

        #control {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
        }
    </style>
</head>

<body>
    <div id="control">
        <button id="startButton">Start</button>
        <button id="stopButton">Stop</button>
    </div>
    <div id="container"></div>

    <script type="module">
        import * as THREE from "three";
        import {
            MindARThree
        } from "mindar-image-three";
        import {
            GLTFLoader
        } from "three/addons/loaders/GLTFLoader.js";

        const mindarThree = new MindARThree({
            container: document.querySelector("#container"),
            imageTargetSrc: "assets/models3D/craneo.mind",
            filterMinCF: 0.001, // Filtro de seguimiento más suave
            filterBeta: 0.01, // Reducir sensibilidad del filtro
            warmupTolerance: 5, // Mayor tolerancia en el calentamiento
            missTolerance: 5 // Mayor tolerancia a fallos de tracking
        });

        const {
            renderer,
            scene,
            camera
        } = mindarThree;

        // Añadir luz
        const light = new THREE.HemisphereLight(0xffffff, 0xbbbbff, 1);
        scene.add(light);
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(1, 1, 1).normalize();
        scene.add(directionalLight);

        const anchor = mindarThree.addAnchor(0);

        // Variables para suavizado de movimiento
        let model;
        let targetPosition = new THREE.Vector3();
        let targetRotation = new THREE.Quaternion();
        let smoothFactor = 0.1; // Factor de suavizado (0-1)

        // Cargar modelo
        const loader = new GLTFLoader();
        loader.load("assets/models3D/craneoMovimiento.glb", (gltf) => {
            model = gltf.scene;
            model.scale.set(0.03, 0.03, 0.03);

            // Crear un grupo contenedor para el modelo
            const modelContainer = new THREE.Group();
            modelContainer.add(model);
            anchor.group.add(modelContainer);
        });

        // Función de animación con suavizado
        const animate = () => {
            if (model && anchor.visible) {
                // Aplicar suavizado de posición y rotación
                model.position.lerp(targetPosition, smoothFactor);
                model.quaternion.slerp(targetRotation, smoothFactor);
            }
            renderer.render(scene, camera);
        };

        // Start
        const start = async () => {
            await mindarThree.start();
            renderer.setAnimationLoop(animate);
        };

        document.querySelector("#startButton").addEventListener("click", start);
        document.querySelector("#stopButton").addEventListener("click", () => {
            mindarThree.stop();
            renderer.setAnimationLoop(null);
        });
    </script>
</body>

</html>
