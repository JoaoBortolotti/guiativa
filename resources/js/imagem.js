document.addEventListener('DOMContentLoaded', function () {
    const inputFile = document.querySelector('#imagem');
    const pictureImage = document.querySelector('#picture_span');
    const pictureImageTxt = 'Choose an Image';

    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener('change', function (e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function (e) {
                const readerTarget = e.target;

                const img = document.createElement('img');
                img.src = readerTarget.result;
                img.classList.add('picture_img');

                pictureImage.innerHTML = '';
                pictureImage.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            pictureImage.innerHTML = pictureImageTxt;
        }
    });
});
