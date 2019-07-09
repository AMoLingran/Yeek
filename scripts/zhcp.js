var arr = [];

function getData() {
    if (localStorage.mylist == undefined) {
        arr = [
            {
                "base": "",
                "add_item": "",
                "add_sum": "",
                "weighted": "",
                "del_item": "",
                "del_sum": "",
                "sum": "0",
                "remarks": ""
            },
            {
                "base": "",
                "add_item": "",
                "add_sum": "",
                "weighted": "",
                "del_item": "",
                "del_sum": "",
                "sum": "0",
                "remarks": ""
            },
            {
                "base": "",
                "add_item": "",
                "add_sum": "",
                "weighted": "",
                "del_item": "",
                "del_sum": "",
                "sum": "0",
                "remarks": ""
            },
            {
                "base": "",
                "add_item": "",
                "add_sum": "",
                "weighted": "",
                "del_item": "",
                "del_sum": "",
                "sum": "0",
                "remarks": ""
            },
        ];
    } else {
        arr = JSON.parse(localStorage.mylist);
    }
    return arr;
}


//把数据存到本地存储，并且转换成字符串格式的JSON
function saveData(data) {
    //  var data = getData();
    //  JSON.stringify(localStorage.tableList);
    localStorage.mylist = JSON.stringify(data);
}

show();
$('table').on('blur', '[contenteditable="true"]', function () {
    var data = getData();
    var val = $(this).html();
    var name = $(this).attr('data-name');
    var index = $(this).parent().attr('key');
    data[index][name] = val;
    data[index]['sum'] = Number(data[index]["base"]) + Number(data[index]["add_sum"]) - Number(data[index]["del_sum"]);
    saveData(data);
    show();
});

function show() {
    var data = getData();
    var key = 0;
    do {
        var row = $("[key=" + key + "] td");
        row.filter("[data-name=base]").text(data[key]["base"]);
        row.filter("[data-name=add_sum]").text(data[key]["add_sum"]);
        row.filter("[data-name=del_sum]").text(data[key]["del_sum"]);
        row.filter("[data-name=sum]").text(data[key]["sum"]);
        key++;
    } while (key < data.length);
    var sum = (data[0]['sum']*0.2) + (data[1]["sum"]*0.6) + (data[2]["sum"]*0.1) + (data[3]["sum"]*0.1);
    $("#zf").text(Math.round(sum * 10000) / 10000);
}


function resetDate() {
    localStorage.removeItem("mylist");
    window.location.reload();
}