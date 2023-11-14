import * as THREE from 'three';
import { PLYLoader } from 'three/addons/loaders/PLYLoader.js';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

camera.position.z = 5;

const loader = new PLYLoader();
loader.load('Abono.ply', (geometry) => {
   const material = new THREE.PointsMaterial({ color: 0x00ff00, size: 0.1 });
   const points = new THREE.Points(geometry, material);
   scene.add(points);

   // Adjust camera position to fit the point cloud
   const boundingBox = new THREE.Box3().setFromObject(points);
   const center = boundingBox.getCenter(new THREE.Vector3());
   const size = boundingBox.getSize(new THREE.Vector3());

   const maxDim = Math.max(size.x, size.y, size.z);
   const fov = camera.fov * (Math.PI / 180);
   const cameraZ = Math.abs(maxDim / 2 / Math.tan(fov / 2));

   camera.position.set(center.x, center.y, center.z + cameraZ * 1.5);
   camera.lookAt(center);

   animate();
});

function animate() {
   requestAnimationFrame(animate);
   renderer.render(scene, camera);
}
