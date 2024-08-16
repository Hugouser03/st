const productOptions = {
    Fut: 'images/Fut/base1.jpeg',
    Bass: 'images/Bask/base2.jpg',
    Short: 'images/Short/base3.jpeg'
};

const designOptions = {
    Fut: ['images/Bask/azul.jpeg', 'images/camisa/design2.jpg'],
    Bass: ['images/Bask/azul.jpeg', 'images/Bask/negro.jpg'],
    Short: ['images/Short/design1.jpg', 'images/tenis/design2.jpg']
};

const predefinedDesigns = {
    diseño1: 'producto/UniformesCom/unibass/Diseño1.jpeg',
    diseño2: 'images/predefinido/design2.png'
};

document.getElementById('producto').addEventListener('change', function() {
    const selectedProduct = this.value;
    document.getElementById('productImage').src = productOptions[selectedProduct];

    const designSelection = document.getElementById('disenoSeleccion');
    designSelection.innerHTML = '';
    designOptions[selectedProduct].forEach(function(design) {
        const img = document.createElement('img');
        img.src = design;
        img.classList.add('design-option');
        img.addEventListener('click', function() {
            const overlayImage = document.getElementById('overlayImage');
            overlayImage.src = this.src;
            overlayImage.style.display = 'block';
        });
        designSelection.appendChild(img);
    });
});

document.getElementById('disenoPredefinido').addEventListener('change', function() {
    const selectedDesign = this.value;
    const overlayImage = document.getElementById('overlayImage');
    overlayImage.src = predefinedDesigns[selectedDesign];
    overlayImage.style.display = 'block';
});

document.getElementById('archivo').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const overlayImage = document.getElementById('overlayImage');
            overlayImage.src = e.target.result;
            overlayImage.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('eliminarBtn').addEventListener('click', function() {
    const overlayImage = document.getElementById('overlayImage');
    overlayImage.style.display = 'none';
    overlayImage.src = '';
});

document.getElementById('descargarBtn').addEventListener('click', function() {
    const productContainer = document.getElementById('productContainer');
    html2canvas(productContainer).then(canvas => {
        const link = document.createElement('a');
        link.download = 'diseño.png';
        link.href = canvas.toDataURL();
        link.click();
    });
});

// Movimiento de la imagen sobrepuesta
let isDragging = false;
const overlayImage = document.getElementById('overlayImage');

overlayImage.addEventListener('mousedown', function(e) {
    isDragging = true;
    let offsetX = e.clientX - parseInt(window.getComputedStyle(overlayImage).left);
    let offsetY = e.clientY - parseInt(window.getComputedStyle(overlayImage).top);

    function mouseMoveHandler(e) {
        if (isDragging) {
            overlayImage.style.left = `${e.clientX - offsetX}px`;
            overlayImage.style.top = `${e.clientY - offsetY}px`;
        }
    }

    function mouseUpHandler() {
        isDragging = false;
        window.removeEventListener('mousemove', mouseMoveHandler);
        window.removeEventListener('mouseup', mouseUpHandler);
    }

    window.addEventListener('mousemove', mouseMoveHandler);
    window.addEventListener('mouseup', mouseUpHandler);
});
