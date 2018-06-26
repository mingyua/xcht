function crtTimeFtt(val) {
if (val != null) {
    var date = new Date(val);
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();
    h = h < 9 ? "0" + h : h;
    m = m < 9 ? "0" + m : m;
    s = s < 9 ? "0" + s : s;
    return h + ':' + m + ':' + s
}
}

//昨天的时间
function getYestertoday() {
var day1 = new Date();
day1.setTime(day1.getTime() - 24 * 60 * 60 * 1000);
var y = day1.getFullYear()
var m = day1.getMonth() + 1;
m = m < 9 ? "0" + m : m;
var d = day1.getDate();
d = d < 9 ? "0" + d : d;
return y + m + d;
}

//今天的时间
function getToday() {
var day = new Date();
day.setTime(day.getTime());
var y = day.getFullYear()
var m = day.getMonth() + 1;
m = m < 9 ? "0" + m : m;
var d = day.getDate();
d = d < 9 ? "0" + d : d;
return y + m + d;
}

//日期格式化 例：var time1 = new Date().format("yyyy-MM-dd hh:mm:ss");
Date.prototype.format = function(fmt) {
var o = {
    "M+": this.getMonth() + 1, //月份 
    "d+": this.getDate(), //日 
    "h+": this.getHours(), //小时 
    "m+": this.getMinutes(), //分 
    "s+": this.getSeconds(), //秒 
    "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
    "S": this.getMilliseconds() //毫秒 
};

if (/(y+)/.test(fmt)) {
    fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
}

for (var k in o) {
    if (new RegExp("(" + k + ")").test(fmt)) {
        fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    }
}
return fmt;
}

document.getElementById("todaytime").innerHTML = new Date().format("yyyy年MM月dd日 hh:mm:ss");
setInterval(function(){ 
document.getElementById("todaytime").innerHTML = new Date().format("yyyy年MM月dd日 hh:mm:ss");
}, 1000)


// 基于准备好的dom，初始化echarts实例;
var app = echarts.init(document.getElementById('charts-box'));
// 指定图表的配置项和数据
app.title = '小草数据';
var colors = ['#5793f3', '#d14a61', '#675bba'];
var option = {
    color: colors,
    tooltip: {
        trigger: 'none',
        axisPointer: {
            type: 'cross'
        }
    },
    legend: {
        data: ['昨日', '今日']
    },
    grid: {
        top: 70,
        bottom: 50
    },
    xAxis: [{
            type: 'category',
            axisTick: {
                alignWithLabel: true
            },
            axisLine: {
                onZero: false,
                lineStyle: {
                    color: colors[1]
                }
            }
        },
        {
            type: 'category',
            axisTick: {
                alignWithLabel: true
            },
            axisLine: {
                onZero: false,
                lineStyle: {
                    color: colors[0]
                }
            }
        }
    ],
    yAxis: [{
        type: 'value'
    }],
    series: [{
            name: '昨日',
            type: 'line',
            xAxisIndex: 1,
            smooth: true,
            showSymbol: false,
            hoverAnimation: false
        },
        {
            showSymbol: false,
            hoverAnimation: false,
            name: '今日',
            type: 'line',
            smooth: true
        }
    ]
};

var timer    = null;
var speedth  = 1000 * 30;

var jilu     = document.getElementById("jilu");
var cje      = document.getElementById("xse");
var kd       = document.getElementById("kedan");
var kdj      = document.getElementById("kedanj");
var _XLineD  = [];

for (var i = 0; i < 24; i++) {
    _XLineD[i] = i < 9 ? "0" + i + ":00:00" : i + ":00:00";
}

// 昨日数据
var zDataNum = [],
    zrkedan  = 0,
    zrJiage  = 0,
    zrKeDanData = [],
    zrKeDanJiaData = [];

for (var i = 0; i < 24; i++) {
    zDataNum[i]    = 0;
    zrKeDanData[i] = 0;
    zrKeDanJiaData[i] = 0;
}

$.ajax({
    type: "get",
//  url: "http://zs.xiaocaoshop.com:8090/yesterdaysales/" + dianpuid + "/" + getYestertoday(),
//  async: false,
    url: logurl,
    data:{dpid:dianpuid,t:getYestertoday()},
    success: function(data) {
        if (data != null) {
            var zNum = 0;
            for (var i = 0; i < data.length; i++) {
                var h = new Date(data[i].cashier_date).getHours();
                zNum += Number(data[i].total_money);
                zDataNum[h]       = zNum;
                zrKeDanData[h]    = i+1;
                zrKeDanJiaData[h] = (zNum/(i+1)).toFixed(2);
            }

            for (var i = 0; i < 24; i++) {
                if (i > 0 && zDataNum[i] == 0) {
                    zDataNum[i] = zDataNum[i - 1];
                }

                if (i > 0 && zrKeDanData[i] == 0) {
                    zrKeDanData[i] = zrKeDanData[i-1];
                }

                if (i > 0 && zrKeDanJiaData[i] == 0) {
                    zrKeDanJiaData[i] = zrKeDanJiaData[i-1];
                }
            }
            zrkedan = data.length;
            zrJiage = zNum;
            document.getElementById("zrCJE").innerHTML  = (zrJiage).toFixed(2);
            document.getElementById("zrKD").innerHTML   = zrkedan;
            if(zrkedan==0){
            	var zrprice=zNum;
            }else{
            	var zrprice=zNum/zrkedan;
            }
            document.getElementById("zrKDJ").innerHTML  = zrprice;
        }
    }
});

//今日数据
var JDatas   = [],
    jDataNum = [],
    jJilu    = [],
    jrkedna  = 0,
    jrKeDanData = [],
    jrKeDanJiaData = [];

var downstr  = "<span style='color:red;font-size:30px;'>↓</span>",
    upstr    = "<span style='color:#0f1;font-size:30px;'>↑</span>";

for (var i = 0; i < new Date().getHours(); i++) {
    jDataNum[i] = 0;
    jrKeDanData[i] = 0;
    jrKeDanJiaData[i] = 0;
}

function getajaxdata() {
    
    $.ajax({
        type: "get",
        url: logurl,
        data:{dpid:dianpuid},
        success: function(data) {
        	
            if (data != null) {
                var jNum = 0;
                for (var i = 0; i < data.length; i++) {
                    var h = new Date(data[i].cashier_date).getHours();
                    jJilu[i] = {};
                    jJilu[i]["datatime"] = data[i].cashier_date;
                    jJilu[i]["moeny"] = Number(data[i].total_money);
                    jNum += Number(data[i].total_money);

                    jDataNum[h] = jNum;
                    jrKeDanData[h]    = i+1;
                    jrKeDanJiaData[h] = (jNum/(i+1)).toFixed(2);
                    
                }

                jrkedna     = data.length;

                var strTag  = "",
                    strTag1 = "",
                    strTag2 = "";

                if (jrkedna < zrkedan) {
                    strTag = downstr;
                } else {
                    strTag = upstr;
                }

                if (jNum < zrJiage) {
                    strTag1 = downstr;
                } else {
                    strTag1 = upstr;
                }
                var zjg = zrJiage/zrkedan;
                var jjg = jNum/jrkedna;

                if (jjg < zjg) {
                    strTag2 = downstr;
                }else {
                    strTag2 = upstr;
                }

                cje.innerHTML = (jNum).toFixed(2) + strTag1;
                kd.innerHTML = jrkedna + strTag;
                kdj.innerHTML = (jNum / jrkedna).toFixed(2)+strTag2;

                var strhtml = "";
                for (var i = jJilu.length - 1; i > 0; i--) {
                	
                	
                	var price=Math.round(jJilu[i]["moeny"] * 100) / 100;
                    strhtml += "<li> 时间: <span style='color:#888'>" + new Date(jJilu[i]["datatime"]).format("yyyy-MM-dd hh:mm:ss") + "</span>  金额: <span style='color:red'>" + price + "</span></li>";
                }

                for (var i = 0; i < jDataNum.length; i++) {

                    if (i > 0 && jDataNum[i] == 0) {
                        jDataNum[i] = jDataNum[i - 1];
                    }
                    if (i > 0 && jrKeDanData[i] == 0) {
                        jrKeDanData[i] = jrKeDanData[i-1];
                    }

                    if (i > 0 && jrKeDanJiaData[i] == 0) {
                        jrKeDanJiaData[i] = jrKeDanJiaData[i-1];
                    }

                }

                jilu.innerHTML = strhtml;
            }
        }
    });
}

function setoption(notice,jrdata,zrdata) {
    app.setOption({
        xAxis: [{
                axisPointer: {
                    label: {
                        formatter: function(params) {
                            return '时间:' + params.value + (params.seriesData.length ? notice + params.seriesData[0].data : '');
                        }
                    }
                },
                data: _XLineD
            },
            {
                axisPointer: {
                    label: {
                        formatter: function(params) {
                            return '时间:' + params.value + (params.seriesData.length ? notice + params.seriesData[0].data : '');
                        }
                    }
                },
                data: _XLineD
            }
        ],
        series: [{
                name:'昨日',
                data: zrdata
            },
            {
                name:'今日',
                data: jrdata
            }
        ]
    });
}

function xsjeClick() {
    getajaxdata();
    setoption(" 成交额: ",jDataNum,zDataNum);
    if (timer != null) {
        clearInterval(timer);
    }
    timer = setInterval(function() {
        getajaxdata();
        setoption(" 成交额: ",jDataNum,zDataNum);
    }, speedth)
}

function kedanClick(){
    getajaxdata();
    setoption(" 客单: ",jrKeDanData,zrKeDanData);
    if (timer != null) {
        clearInterval(timer);
    }
    timer = setInterval(function() {
        getajaxdata();
        setoption(" 客单: ",jrKeDanData,zrKeDanData);
    }, speedth)
}

function kedanjiaClick(){
    getajaxdata();
    setoption(" 客单价: ",jrKeDanJiaData,zrKeDanJiaData);
    if (timer != null) {
        clearInterval(timer);
    }
    timer = setInterval(function() {
        getajaxdata();
        setoption(" 客单价: ",jrKeDanJiaData,zrKeDanJiaData);
    }, speedth)
}

$(".left ul li").click(function(e){
    $(this).css("background-color","#350696").siblings().css("background-color","#009688");
    if ($(this).find("h3").text() == "今日成交额") {
        xsjeClick();
    }else if ($(this).find("h3").text() == "今日客单") {
        kedanClick();
    }else if ($(this).find("h3").text() == "今日客单价") {
        kedanjiaClick();
    }
})




app.setOption(option);
xsjeClick();