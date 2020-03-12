/**
 * Filepond.js for file uploading
 *
 */

const inputElement = document.getElementById("fileUpload");
FilePond.registerPlugin(
    FilePondPluginFileEncode,
    FilePondPluginFileValidateType,
    FilePondPluginFileValidateSize
);
const filepond = FilePond.create(inputElement, {
    name: "material[]",
    allowMultiple: true,
    labelIdle: '<i class="fa fa-cloud-upload-alt fa-2x text-success"></i><br>Drag & Drop your files or <span class="filepond--label-action"> Browse </span>',
    acceptedFileTypes: [
        "application/vnd.ms-excel",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
    ],
    fileValidateTypeLabelExpectedTypesMap: {
        "application/vnd.ms-excel": ".xls",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet": ".xlsx"
    },
    allowFileTypeValidation: true,
    labelFileTypeNotAllowed: "File of invalid type",
    allowFileSizeValidation: true,
    maxFileSize: "7MB",
    labelMaxTotalFileSize: "Maximum total file size is {filesize}",
    allowFileEncode: "true"
});

/**
 * Bootstrap Tooltip
 *
 */

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

/**
 * Jquery Data Tables Initializing
 *
 */

$(document).ready(function() {
    $('#data_table').DataTable();
});