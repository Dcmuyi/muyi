<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
    <title>编辑折线、多边形、圆</title>
    <link rel="stylesheet" href="https://cache.amap.com/lbs/static/main1119.css"/>
    <script src="https://webapi.amap.com/maps?v=1.3&key=9bd72f39ac94b0b615bc9d3b62338e66&plugin=AMap.PolyEditor,AMap.CircleEditor"></script>
    <script type="text/javascript" src="https://cache.amap.com/lbs/static/addToolbar.js"></script>
</head>
<body>
<div id="container" style="height: 500px;width: 500px"></div>
<div class="button-group">
    <input type="button" class="button" value="开始编辑折线" onClick="editor.startEditLine()"/>
    <input type="button" class="button" value="结束编辑折线" onClick="editor.closeEditLine()"/>
    <input type="button" class="button" value="开始编辑多边形" onClick="editor.startEditPolygon()"/>
    <input type="button" class="button" value="结束编辑多边形" onClick="editor.closeEditPolygon()"/>
    <input type="button" class="button" value="开始编辑圆" onClick="editor.startEditCircle()"/>
    <input type="button" class="button" value="结束编辑圆" onClick="editor.closeEditCircle()"/>

    <input type="button" class="btn btn-primary" value="test" onclick="test()">
</div>
<script>
    test = function () {
        console.log('开始：');

        console.log(editor._polygon.getPath());

        return false;
    };
    var editorTool, map = new AMap.Map("container", {
        resizeEnable: true,
        center: [116.403322, 39.900255],//地图中心点
        zoom: 13 //地图显示的缩放级别
    });
    //在地图上绘制折线
    var editor={};
    editor._line=(function(){
        var lineArr = [
            [116.368904, 39.913423],
            [116.382122, 39.901176],
            [116.387271, 39.912501],
            [116.388258, 39.904600]
        ];
        return new AMap.Polyline({
            map: map,
            path: lineArr,
            strokeColor: "#FF33FF",//线颜色
            strokeOpacity: 1,//线透明度
            strokeWeight: 3,//线宽
            strokeStyle: "solid"//线样式
        });
    })();
    editor._polygon=(function(){
        var arr = [ //构建多边形经纬度坐标数组
            [116.403322,39.920255],
            [116.410703,39.897555],
            [116.402292,39.892353],
            [116.389846,39.891365]
        ]
        return new AMap.Polygon({
            map: map,
            path: arr,
            strokeColor: "#0000ff",
            strokeOpacity: 1,
            strokeWeight: 3,
            fillColor: "#f5deb3",
            fillOpacity: 0.35
        });
    })();
    editor._circle=(function(){
        var circle = new AMap.Circle({
            center: [116.433322, 39.900255],// 圆心位置
            radius: 1000, //半径
            strokeColor: "#F33", //线颜色
            strokeOpacity: 1, //线透明度
            strokeWeight: 3, //线粗细度
            fillColor: "#ee2200", //填充颜色
            fillOpacity: 0.35//填充透明度
        });
        circle.setMap(map);
        return circle;
    })();
    map.setFitView();
    editor._lineEditor= new AMap.PolyEditor(map, editor._line);
    editor._polygonEditor= new AMap.PolyEditor(map, editor._polygon);
    editor._circleEditor= new AMap.CircleEditor(map, editor._circle);

    editor.startEditLine=function(){
        editor._lineEditor.open();
    }
    editor.closeEditLine=function(){
        editor._lineEditor.close();
    }

    editor.startEditPolygon=function(){
        editor._polygonEditor.open();
    }
    editor.closeEditPolygon=function(){
        editor._polygonEditor.close();
    }

    editor.startEditCircle=function(){
        editor._circleEditor.open();
    }
    editor.closeEditCircle=function(){
        editor._circleEditor.close();
    }
</script>
</body>
</html>