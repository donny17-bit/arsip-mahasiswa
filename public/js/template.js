function filePreview() {
    const file = document.querySelector('#file');
    const fileLabel = document.querySelector('#label');
    // const fileLabel3 = document.querySelector('.custom-file-label');

    if (file.files[0] != null) {
        fileLabel.textContent = file.files[0].name;
        // console.log(file);
    }
}