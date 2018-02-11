$(document).ready(function(){
    init();
    addActiveClassToMenuItem();
    initializeObservers();
    validateProductForm();
    proceesFileUpload();
});

function init() {
    Dropzone.autoDiscover = false;
}

function addActiveClassToMenuItem() {
    $('#' + activeMenuItem).addClass('active');
}

function initializeObservers() {
    $('body').on('click', '#save-product', function() {
        event.preventDefault();
        saveProduct(this.href);
    });

    $('body').on('click', '#delete-product', function() {
        event.preventDefault();
        deleteProduct(this.href);
    });
}

function saveProduct(href) {
    var form = $('#edit-product');
    form.attr('action', href);
    form.submit();
}

function deleteProduct(href) {

}

function validateProductForm() {

}

function proceesFileUpload() {
    var dropZone = $('#uploadfile').dropzone({
        url: '/admin/uploadfile',
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        success: function(file, done) {
            if (done != undefined && done.length > 0) {
                var responce = JSON.parse(done);
                $('#image').val(responce.file_name);
            }
        },
        maxFiles: 1,
        init: function () {
            this.on("maxfilesexceeded", function(file) {
                this.removeAllFiles();
                this.addFile(file);
            });

            this.on("removedfile", function(file) {
                $('#image').val('');
            });

            if ($('input#image').val().length > 0) {
                var fileUrl = '/img/cms/products/' + $('input#image').val();
                var mockFile = { name: "Filename", size: 12312312, accepted: true, type: 'image/jpeg' };
                this.emit("addedfile", mockFile);
                this.emit("thumbnail", mockFile, fileUrl);
                this.createThumbnailFromUrl(mockFile, fileUrl);
                this.emit("success", mockFile);
                this.emit("complete", mockFile);
                this.files.push(mockFile);
            }
        },
        addRemoveLinks: true
    });
}