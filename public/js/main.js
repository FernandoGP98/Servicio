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
var spotLight;

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
    renderer.sortObjects = false;
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

    spotLight = new THREE.SpotLight( 0xffffff, 1 );
    spotLight.position.set( 0, 400, 0 );
    spotLight.angle = 0.5;
    spotLight.penumbra = 0.05;
    spotLight.decay = 1;
    spotLight.distance = 2000;
    //spotLight.power= 5 * Math.PI;

    spotLight.castShadow = true;
    scene.add( spotLight );

    spotLight.target.position.set( 0, 0, 0);
    scene.add( spotLight.target );

    //CONTROLES
    controls = new OrbitControls(camara, renderer.domElement);
    controls.minDistance=200;
    controls.maxDistance=700;
    controls.update();
    controls.target.y = 100;

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
            models[index].renderOrder=index;
            models[index].position.x+=addPos;
            console.log(models[index]);
            addPos+=800;
        }
    };
    cargarModelo(cargador,"Demos","Bisonte.fbx",true, THREE.FrontSide);
    //PISO
    {
        var piso = new THREE.Mesh(new THREE.PlaneBufferGeometry(25000,1000), new THREE.MeshPhongMaterial({color: 0x999999, depthWrite: false}));
        piso.rotation.x= -Math.PI/2;
        piso.position.y= -5;
        piso.receiveShadow  = true;
        scene.add(piso);

        var cuadricula = new THREE.GridHelper( 25000, 100, 0x000000, 0x000000 );
        cuadricula.material.opacity = 0.2;
        cuadricula.material.transparent = true;
        cuadricula.position.y = -5;
        scene.add( cuadricula );
    }

    resizeCanvasToDisplaySize(true);
    //requestAnimationFrame(update);
}

function cargarModelo(cargador,carpeta,objeto,depthWrite, side){
    cargador.load("../assets/"+carpeta+"/"+objeto, function(object){
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
        object.name=objeto;
        //object.position.z=100;
        if(object.name=="Bisonte.fbx"){models.unshift(object);}else models.push(object);
        scene.add(object);
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

    new TWEEN.Tween(spotLight.position)
    .to({x : models[indexModels].position.x}, 1000)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .start();

    new TWEEN.Tween(spotLight.target.position)
    .to({x : models[indexModels].position.x}, 1000)
    .easing(TWEEN.Easing.Quadratic.InOut)
    .start();

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


