
  function out(id) {
    x = confirm("确定退房嘛？");
    if (x==true){
        xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","/api/index/checkout?time_id="+id,true);
        xmlhttp.send();
        location.reload();
    }else{
        console.log('xxx');
    }
  }


//获取之前五天的日期
var myDate = new Date(); //获取今天日期
myDate.setDate(myDate.getDate() - 5);
var date = [];
var dateTemp;
var flag = 1;
for (var i = 0; i < 5; i++) {
    dateTemp = (myDate.getMonth()+1)+"/"+myDate.getDate();
    date.push(dateTemp);
    myDate.setDate(myDate.getDate() + flag);
}


//图标数据获取
var income   = [9000, 8881, 7897, 3506, 4601];
var count    = [9000, 8881, 7897, 3506, 4601];

var roominfo = [[0,0,1],[1,1,1],[0,3,1],[2,4,1]];


//近日经营情况
  // 基于准备好的dom，初始化echarts实例
  var pillChart = echarts.init(document.getElementById('OperatChart'));

  // 指定图表的配置项和数据
  var pillOpt = {
      title: {
          text: '近日经营情况'
      },
      tooltip: {},
      legend: {
          data:['CNY']
      },
      xAxis: {
          data: date
      },
      yAxis: {},
      series: [{
          name: 'CNY',
          type: 'bar',
          data: income
      }]
  };

  pillChart.setOption(pillOpt);


//近日入住人数


// 基于准备好的dom，初始化echarts实例
  var linechart = echarts.init(document.getElementById('holderChart'));

  // 指定图表的配置项和数据
  var lineOpt = {
      title: {
          text: '近日入住情况'
      },
      tooltip: {},
      legend: {
          data:['人数']
      },
      xAxis: {
          data: date
      },
      yAxis: {},
      series: [{
          name: '人数',
          type: 'line',
          data: [30, 20, 26, 22, 17]
      }]
  };

  // 使用刚指定的配置项和数据显示图表。
  linechart.setOption(lineOpt);

//当前房间实时数据
var heatMap = echarts.init(document.getElementById('roomChart'));
var Room = ['1','2','3','4','5','6','7','8','9'];
var Floor = ['一楼', '二楼', '三楼','四楼', '五楼'];

var roominfo = roominfo.map(function (item) {
    return [item[1], item[0], item[2] || '-'];
});

heatMapOpt = {
    color:['#87CEFA'],
    legend: {
        orient: 'vertical',
        x:'left',
        y:'top',
        padding:[0,0,0,0],
        data: ['可入住房间']
    },
    tooltip: {
        position: 'top'
    },
    animation: true,
    grid: {
        height: '50%',
        top: '10%'
    },
    xAxis: {
        name:'房间号',
        type: 'category',
        data: Room,
        splitArea: {
            show: true
        }
    },
    yAxis: {
        name:'',
        type: 'category',
        data: Floor,
        splitArea: {
            show: true
        }
    },
    visualMap: {
        min: 0,
        max: 10,
        calculable: true,
        orient: 'horizontal',
        left: 'center',
        bottom: '15%'
    },
    series: [{
        name: '可入住房间',
        type: 'heatmap',
        data: roominfo,
        label: {
            show: false
        },
        emphasis: {
            itemStyle: {
                shadowBlur: 10,
                shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
        }
    }]
};
heatMap.setOption(heatMapOpt);



$(document).ready(function() {
    $.get('/api/index/titledata', function (data) {
        var count = data.data.count;
        var reser = data.data.reservation;
        var leave = data.data.leave;
        var nowIn = data.data.nowIn;
        
        $('#count').empty();
        $('#count').append(count);

        $('#reser').empty();
        $('#reser').append(reser);

        $('#leave').empty();
        $('#leave').append(leave);

        $('#nowIn').empty();
        $('#nowIn').append(nowIn);
}

);

    $.get('api/index/custlist', function (data) {
        let Str = '';
        for (var i= 0 ;i<data.data.length;i++)
        {
            $(data.data[i]).each(function () {
                Str += `
                <tr>
                <td></td>
                <td>${data.data[i].room_id}</td>
                <td class="am-hide-sm-only">${data.data[i].name}</td>
                <td class="am-hide-sm-only">${data.data[i].id_code}</td>
                <td class="am-hide-sm-only">${data.data[i].in_time}</td>
                <td class="am-hide-sm-only">${data.data[i].out_time}</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
<button class="am-btn am-btn-default am-btn-xs am-text- danger am-hide-sm-only" onclick="out(${data.data[i].time_id})"> 提前退房
</button>
      </div>
    </div>
</td> </tr>
`;
});
        }
        $('#custlist').empty();
        $('#custlist').append(Str);

}

);



});
