// 设置上传文件夹，临时使用静态数据解决，以后使用数据库。
$('#choose').on("click", '.btn', function () {
    $(this).removeClass('btn-secondary').addClass('btn-primary');
    $(this).siblings().removeClass('btn-primary').addClass('btn-secondary');
    index = $(this).attr("index");
    if (index == '0') {
        subject = "swift"
        endDate = "0906"
        file_dir = subject + "_" + endDate;
        file.fileinput('refresh', { uploadExtraData: { 'dir': file_dir, } }).fileinput('clear').fileinput('enable');
        getFileList();
    }
    if (index == '1') {
        subject = "swift"
        endDate = "0912"
        file_dir = subject + "_" + endDate;
        file.fileinput('refresh', { uploadExtraData: { 'dir': file_dir, } }).fileinput('clear').fileinput('enable');
        getFileList();
    }

});


$(document).ready(function () {
    $("nav").load("../part/nav.html");
    $("footer").load("../part/footer.php");
});

// 初始化上传
var file = $("#file");
file.fileinput({
    uploadUrl: 'file/receive.php',  // post地址
    allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'rar', 'php'],  // 允许的上传地址
    uploadAsync: true,  // 异步上传
    theme: 'fas',  // 主题
    language: 'zh',  // 语言
    showPreview: false,  // 预览
    enctype: 'multipart/form-data',  // 文件编码
});
// 事件：异步上传中
file.on("filepreajax", function () {
    $("#result").text("上传中。。。");
});
// 事件：上传完成后
file.on("fileuploaded", function (event, data, previewId, index) {
    result = data.response.request;
    $("#result").text(result);
    alert(result);
    getFileList();
}).fileinput('disable');




//获取上传列表
function getFileList() {
    $.post("file/receive.php",
        {
            list: "",
            dir: file_dir,
        },
        function (data, status) {
            list = jQuery.parseJSON(data);
            var myDate = new Date();
            var mytime = myDate.toLocaleTimeString();
            $("#uploaded").html("<p class='h5'>刷新时间：<span class='text-info'>" + mytime + "<span></p><br>");
            $.each(list, function (i, v) {

                $("#uploaded").html(function (i, o) {
                    return o + "<p>" + v + "</p>"
                });
            });
        });
}