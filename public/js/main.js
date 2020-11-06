'use stric';

import * as THREE from "../build/three.module.js";
import TWEEN from 'https://cdn.jsdelivr.net/npm/@tweenjs/tween.js@18.5.0/dist/tween.esm.js';
import {OrbitControls} from "../jsm/controls/OrbitControls.js";
import {FBXLoader} from "../jsm/loaders/FBXLoader.js"

//VARIABLES GLOBALES
var container;
var scene, sceneW, sceneH;
var renderer, camara;
var controls;
var clock = new THREE.Clock();
var mixer;

var positionTween;
var rotationTween;

var models = [];
var indexModels;
var indexImagen;

init();

function init(){
    variables();
    createscene();
    update();

}

function variables(){
    indexModels=0;
    indexImagen=0;
}

function createscene(){
    sceneW = window.innerWidth;
    sceneH = window.innerHeight;
    /*document.getElementById("container").style.width=String(window.innerWidth/1.5);
    document.getElementById("container").style.height=String(window.innerHeight/1.3);
    sceneW= document.getElementById("container").offsetWidth;
    sceneH= document.getElementById("container").offsetHeight;*/

    scene = new THREE.Scene();
    scene.background = new THREE.Color( 0xa0a0a0 );
	scene.fog = new THREE.Fog( 0xa0a0a0, 100, 1000 );

    //RENDERER
    var myCanvas = document.getElementById("idCanvas");
    //container = document.getElementById("container");
    renderer = new THREE.WebGLRenderer({ antialias: false, canvas: myCanvas });
    //renderer = new THREE.WebGLRenderer({ canvas: document.querySelector("canvas")});
    //renderer.setPixelRatio(window.devicePixelRatio);
    //renderer.setSize(sceneW, sceneH);
    //renderer.setSize(container.innerWidth, container.innerHeight);
    //renderer.shadowMap.enabled = true;
    //renderer = new THREE.WebGLRenderer({canvas: document.querySelector("canvas")});

    //CANVAS

    //container.appendChild(renderer.domElement);

    //CAMARA
    const fov = 50;
    const acercamiento = 0.1;
    const lejania = 2000;
    //camara = new THREE.PerspectiveCamera(fov, sceneW/sceneH, acercamiento, lejania);
    //camara = new THREE.PerspectiveCamera(fov, container.innerWidth/ container.innerHeight, acercamiento, lejania);
    camara = new THREE.PerspectiveCamera(fov, 1, acercamiento, lejania);
    camara.position.set(0, 200, 300);

    //LUCES
    /*var luz = new THREE.DirectionalLight(0xffffff);
    luz.position.set(50,100,0);
    luz.castShadow=true;
    scene.add(luz);*/

    var ambientLight = new THREE.AmbientLight( 0xffffff, 0.4 );
    scene.add( ambientLight );

    var hemi = new THREE.HemisphereLight(0xffffff, 0x444444);
    hemi.position.set(0,200,0);
    scene.add(hemi);

    var spotLight = new THREE.SpotLight( 0xffffff, 1 );
    spotLight.position.set( 0, 400, 0 );
    spotLight.angle = 0.5;
    spotLight.penumbra = 0.05;
    spotLight.decay = 1;
    spotLight.distance = 2000;

    spotLight.castShadow = true;
    scene.add( spotLight );

    spotLight.target.position.set( 0, 0, 0);
    scene.add( spotLight.target );

    //CONTROLES
    controls = new OrbitControls(camara, renderer.domElement);
    controls.enablePan=false;
    controls.minDistance=200;
    controls.maxDistance=700;
    controls.update();

    //CUBO
    var geometria = new THREE.BoxGeometry(10,10,10);
    var material = new THREE.MeshLambertMaterial({color: 0x44aa88});
    const cubo = new THREE.Mesh(geometria, material);
    //scene.add(cubo);
    //renderer.render(scene, camara);

    //CARGAR FBX'S
    var loadComplete=false;
    const manager = new THREE.LoadingManager();
    var cargador = new FBXLoader(manager);
    var addPos = 0;
    manager.onLoad = function ( ) {
        const loadingScreen = document.getElementById( 'loading-screen' );
        loadingScreen.classList.add( 'fade-out' );
        loadingScreen.addEventListener( 'transitionend', onTransitionEnd );
        console.log( 'Loading complete!');
        loadComplete=true;

        for (let index = 0; index < models.length; index++) {
            models[index].position.x+=addPos;
            console.log(addPos);
            addPos+=800;
        }
    };


    /*cargador.load("../assets/Intersecciones/CilindroCono.fbx", function(object){
        //mixer = new THREE.AnimationMixer(object);
        //var action = mixerclipAction(object.animations[0]);
        //action.play();

        object.traverse(function(child){
            if(child.isMesh){
                //child.castShadow=true;
                //child.recieveShadow = true;
                child.material.fog=false;
                child.material.depthWrite = false;

            }
        });

        //object.position.y=50;
        //object.scale.set(0.02,0.02,0.02);
        scene.add(object);
        models.push(object);
    });*/

    cargarModelo(cargador,"CilindroCono.fbx",false, THREE.FrontSide);

    /*cargador.load("../assets/Intersecciones/CilParabolico-CilParabolico.fbx", function(object){
        //mixer = new THREE.AnimationMixer(object);
        //var action = mixerclipAction(object.animations[0]);
        //action.play();

        object.traverse(function(child){
            if(child.isMesh){
                child.material.fog=false;
                //child.material.depthWrite = false;
                child.material.side=THREE.DoubleSide;
            }
        });

        //object.position.z=50;
        scene.add(object);
        models.push(object);
    });*/
    cargarModelo(cargador,"CilParabolico-CilParabolico.fbx",true, THREE.DoubleSide);

    /*cargador.load("../assets/Intersecciones/Cilindro Cilindro.fbx", function(object){
        //mixer = new THREE.AnimationMixer(object);
        //var action = mixerclipAction(object.animations[0]);
        //action.play();

        object.traverse(function(child){
            if(child.isMesh){
                child.material.fog=false;
                child.material.depthWrite = false;
            }
        });

        //object.position.z=100;
        scene.add(object);
        models.push(object);
    });*/

    cargarModelo(cargador,"Cilindro Cilindro.fbx",false, THREE.FrontSide);
    cargarModelo(cargador,"Cilindro Parabola.fbx",false, THREE.DoubleSide);
    cargarModelo(cargador,"Conico Exp.fbx",false, THREE.DoubleSide);
    cargarModelo(cargador,"Cono Esfera X.fbx",false, THREE.DoubleSide);
    //PISO
    {
        var piso = new THREE.Mesh(new THREE.PlaneBufferGeometry(2000,2000), new THREE.MeshPhongMaterial({color: 0x999999, depthWrite: false}));
        piso.rotation.x= -Math.PI/2;
        piso.position.y= -5;
        piso.receiveShadow  = true;
        scene.add(piso);

        var cuadricula = new THREE.GridHelper( 2000, 20, 0x000000, 0x000000 );
        cuadricula.material.opacity = 0.2;
        cuadricula.material.transparent = true;
        cuadricula.position.y = -5;
        scene.add( cuadricula );
    }

    //BOTONES
    var button1 = document.getElementById('siguiente');
    button1.addEventListener('click', function(ev) {
        if(indexModels < models.length-1)
            indexModels++;
        //var cameraSettings = buttonCameraSettings[buttonId];
        //updateCameraTweens(cameraSettings);
        updateModelsTweens();

    });

    var button2 = document.getElementById('anterior');
    button2.addEventListener('click', function(ev) {
        if(indexModels>0)
            indexModels--;
        //var cameraSettings = buttonCameraSettings[buttonId];
        //updateCameraTweens(cameraSettings);
        updateModelsTweens();

    });

    var btn_Aceptar = document.getElementById('aceptar');
    btn_Aceptar.addEventListener('click', function(ev) {
        var activo = document.querySelector(".slick-active");
        var idImagen = activo.childNodes[0].nextSibling.id
        console.log(idImagen);
        if (indexModels == idImagen) {
           alert("Correcto");
        }
        else
            alert("Incorrecto");


    });

    resizeCanvasToDisplaySize(true);
    //requestAnimationFrame(update);
}

function cargarModelo(cargador,objeto,depthWrite, side){
    cargador.load("../assets/Intersecciones/"+objeto, function(object){
        //mixer = new THREE.AnimationMixer(object);
        //var action = mixerclipAction(object.animations[0]);
        //action.play();

        object.traverse(function(child){
            if(child.isMesh){
                child.material.fog=false;
                child.material.depthWrite = depthWrite;
                child.material.side=side;
            }
        });

        //object.position.z=100;
        scene.add(object);
        models.push(object);
    });
}

function resizeCanvasToDisplaySize(force) {
    const canvas = renderer.domElement;
    const width = canvas.clientWidth;
    const height = canvas.clientHeight;
    if (force || canvas.width !== width ||canvas.height !== height) {
        // you must pass false here or three.js sadly fights the browser
        renderer.setSize(width, height, false);
        camara.aspect = width / height;
        camara.updateProjectionMatrix();

        // set render target sizes here
    }
}

function updateModelsTweens() {
    TWEEN.removeAll();

    new TWEEN.Tween(camara.position)
    .to({x : models[indexModels].position.x}, 1000)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .start();

    new TWEEN.Tween(controls.target)
    .to({x : models[indexModels].position.x}, 1000)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .start();


    //controls.enabled=false;
    /*for (let i = 0; i < models.length; i++) {
        switch (i) {
            case 0:
                new TWEEN.Tween(models[i].position)
                .to({x : 500}, 1000)
                .easing(TWEEN.Easing.Quadratic.InOut)
                .start();
                break;

            case 1:
                new TWEEN.Tween(models[i].position)
                .to({x:0}, 1000)
                .easing(TWEEN.Easing.Quadratic.InOut)
                .start();
                break;
        }
    }*/
    /*if (params.position) {
      positionTween.stop();
      positionTween.to(params.position, 1000).start();
    }

    if (params.rotation) {
      rotationTween.stop();
      rotationTween.to(params.rotation, 1000).start();
    }*/

}

function onTransitionEnd( event ) {

	event.target.remove();

}

function update(){
    //var delta = clock.getDelta();
    //if(mixer)mixer.update(delta);
    TWEEN.update();
    render();
    requestAnimationFrame(update);
}

function render(){
    controls.update();
    renderer.render(scene, camara);
}


