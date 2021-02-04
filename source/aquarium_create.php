<?php
session_start();
// ログインしていない場合
if ($_SESSION['user_name'] == false) {
  header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="熱帯魚の通販サイトです。">
  <meta name="keywords" content="熱帯魚, 魚, 水槽, ECサイト, 通販, オンラインショップ">
  <title>Auarium | 水槽作成</title>

  <?php include_once('./link.html'); ?>
  <script type="text/javascript" src="./threejs/three.js"></script>
  <script type="text/javascript" src="./threejs/stats.js"></script>
  <script type="text/javascript" src="./threejs/dat.gui.js"></script>
  <script type="text/javascript" src="./threejs/OrbitControls.js"></script>
  <script type="text/javascript" src="./threejs/ColladaLoader.js"></script>
  <script type="text/javascript" src="./threejs/jquery-2.1.4.min.js"></script>
</head>


<body>
  <div class="wrapper">
    <?php include_once('./header.html'); ?>


    <!-- メインコンテンツ -->
    <div class="contents">
      <h2>水槽作成</h2>
      <!-- 暫定的に追加 -->
      <p><a href="./aquarium_1.php">マイ水槽へ</a></p>

      <div id="Stats-output">
      </div>
      <div id="WebGL-output">
      </div>

      <!-- <form action="aquarium_1.php" method="post">
                <p>水槽を選択してください</p>
                <input type="image" src="images/.png" alt="Sサイズ水槽">
                <input type="image" src="images/.png" alt="Mサイズ水槽">
                <input type="image" src="images/.png" alt="Lサイズ水槽">
                <input type="submit" name="create" value="作成">
            </form> -->
    </div>


    <?php include_once('./footer.html'); ?>
  </div>

  <?php include_once('./script.html'); ?>

  <script type="text/javascript">
    // import * as THREE from './threejs/three.module.js';

    class CSV {
      constructor(data, keys = false) {
        this.ARRAY = Symbol('ARRAY')
        this.OBJECT = Symbol('OBJECT')

        this.data = data

        if (CSV.isArray(data)) {
          if (0 == data.length) {
            this.dataType = this.ARRAY
          } else if (CSV.isObject(data[0])) {
            this.dataType = this.OBJECT
          } else if (CSV.isArray(data[0])) {
            this.dataType = this.ARRAY
          } else {
            throw Error('Error: 未対応のデータ型です')
          }
        } else {
          throw Error('Error: 未対応のデータ型です')
        }

        this.keys = keys
      }

      toString() {
        if (this.dataType === this.ARRAY) {
          return this.data.map((record) => (
            record.map((field) => (
              CSV.prepare(field)
            )).join(',')
          )).join('\n')
        } else if (this.dataType === this.OBJECT) {
          const keys = this.keys || Array.from(this.extractKeys(this.data))

          const arrayData = this.data.map((record) => (
            keys.map((key) => record[key])
          ))

          console.log([].concat([keys], arrayData))

          return [].concat([keys], arrayData).map((record) => (
            record.map((field) => (
              CSV.prepare(field)
            )).join(',')
          )).join('\n')
        }
      }

      save(filename = 'data.csv') {
        if (!filename.match(/\.csv$/i)) {
          filename = filename + '.csv'
        }

        console.info('filename:', filename)
        console.table(this.data)

        const csvStr = this.toString()

        const bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
        const blob = new Blob([bom, csvStr], {
          'type': 'text/csv'
        });
        const url = window.URL || window.webkitURL;
        const blobURL = url.createObjectURL(blob);

        let a = document.createElement('a');
        a.download = decodeURI(filename);
        a.href = blobURL;
        a.type = 'text/csv';

        a.click();
      }

      extractKeys(data) {
        return new Set([].concat(...this.data.map((record) => Object.keys(record))))
      }

      static prepare(field) {
        return ('' + field).replace(/"/g, '""')
      }

      static isObject(obj) {
        return '[object Object]' === Object.prototype.toString.call(obj)
      }

      static isArray(obj) {
        return '[object Array]' === Object.prototype.toString.call(obj)
      }
    }

    // 外部に保存する(csv)情報の配列
    // let 配列名 = [モデル名１, ｘ座標１, ｙ座標１, ｚ座標１, ....];
    // インデックス0はさかなの各種類の個数を保持するために0で埋めておく
    // インデックス1は水草
    // インデックス2は装飾品
    // インデックス3は水槽の情報を保持するために0で埋めておく

    // (index)              種類１   種類２   種類３   種類４
    // さかなの個数              2        3        4        2
    // 水草の個数                3        2        1        5
    // 装飾品の個数              2        1        3        2
    // 水槽の種類   "suiso-sikaku"        0        0        0
    let model_csv = [
      [0, 0, 0, 0],
      [0, 0, 0, 0],
      [0, 0, 0, 0],
      [0, 0, 0, 0]
    ];

    // 水槽モデルの”model.name”を一時保存する変数
    let suiso_name;
    // 水草モデルの”model.name”を一時保存する配列
    let mizukusa_name = [];
    // 装飾品モデルの”model.name”を一時保存する配列
    let sosyoku_name = [];

    // const mouse = new THREE.Vector2();
    let INTERSECTED;
    let plane;

    // シーン(３Dモデルを表示する空間)の定義
    let scene = new THREE.Scene();
    // シーンに地面を定義と設定
    var textureLoader = new THREE.TextureLoader();
    var floorTex = textureLoader.load("./models/floor-wood.jpg");
    plane = new THREE.Mesh(new THREE.BoxGeometry(200, 100, 0.1, 30), new THREE.MeshPhongMaterial({
      // 画像の色味の指定
      color: 0xffffff,
      map: floorTex
    }));
    // plane(地面の部分)の表示する角度，位置の指定
    plane.rotation.x = -0.5 * Math.PI;
    plane.position.x = 0;
    plane.position.y = -13;
    plane.position.z = 0;
    // シーンにplane(地面)を追加する
    scene.add(plane);


    // rendererの設定と表示サイズの指定
    let renderer = new THREE.WebGLRenderer();
    // 空間の背景色の指定
    renderer.setClearColor(new THREE.Color(0xEEEEEE));
    // サイトに表示するサイズの指定
    renderer.setSize(window.innerWidth, window.innerHeight);
    // 影の定義
    renderer.shadowMap.enabled = true;


    // カメラの定義と設定
    let camera = new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 0.1, 1000);
    // カメラの位置の指定
    camera.position.x = 0;
    camera.position.y = 20;
    camera.position.z = 60;
    // カメラの向きの指定
    camera.lookAt(scene.position);
    // マウスでカメラをコントロール
    let orbit = new THREE.OrbitControls(camera, renderer.domElement);
    // シーンにcamera(カメラ)を追加する
    scene.add(camera);


    // ライト(光)の定義と指定
    // ambiLight(シーン内のオブジェクトを均等に照らすライト)の定義と明るさ指定
    var ambiLight = new THREE.AmbientLight(0x242424);
    scene.add(ambiLight);

    // spotLight(単一の点から一方向に放射され，円錐に発せられるライト)の定義と設定
    let spotLight = new THREE.SpotLight(0xffffff);
    // 位置の指定
    spotLight.position.set(0, 50, 0);
    // 影の設定(spotLightは影が発生する)．今回は発生させる
    spotLight.castShadow = true;
    scene.add(spotLight);


    // rendererの出力をhtmlに追加
    document.getElementById("WebGL-output").appendChild(renderer.domElement);

    // 3DS形式のモデルデータを読み込む
    const loader = new THREE.ColladaLoader();




    // ------------------------------------------------------

    // let mouse, raycaster, isShiftDown = false;

    // let rollOverMesh, rollOverMaterial;
    // let cubeGeo, cubeMaterial;

    // const objects = [];

    // ------------------------------------------------------

    function init() {

      // -------------------------------------------------------


      // roll-over helpers

      // const rollOverGeo = new THREE.BoxBufferGeometry( 50, 50, 50 );
      // rollOverMaterial = new THREE.MeshBasicMaterial( { color: 0xff0000, opacity: 0.5, transparent: true } );
      // rollOverMesh = new THREE.Mesh( rollOverGeo, rollOverMaterial );
      // scene.add( rollOverMesh );

      // // cubes

      // cubeGeo = new THREE.BoxBufferGeometry( 50, 50, 50 );
      // cubeMaterial = new THREE.MeshLambertMaterial( { color: 0xfeb74c } );

      // // grid

      // const gridHelper = new THREE.GridHelper( 1000, 20 );
      // scene.add( gridHelper );

      // //

      // raycaster = new THREE.Raycaster();
      // mouse = new THREE.Vector2();

      // const geometry = new THREE.PlaneBufferGeometry( 1000, 1000 );
      // geometry.rotateX( - Math.PI / 2 );

      // plane = new THREE.Mesh( geometry, new THREE.MeshBasicMaterial( { visible: false } ) );
      // scene.add( plane );

      // objects.push( plane );

      // // lights

      // const ambientLight = new THREE.AmbientLight( 0x606060 );
      // scene.add( ambientLight );

      // const directionalLight = new THREE.DirectionalLight( 0xffffff );
      // directionalLight.position.set( 1, 0.75, 0.5 ).normalize();
      // scene.add( directionalLight );

      // renderer = new THREE.WebGLRenderer( { antialias: true } );
      // renderer.setPixelRatio( window.devicePixelRatio );
      // renderer.setSize( window.innerWidth, window.innerHeight );
      // document.body.appendChild( renderer.domElement );

      // document.addEventListener( 'mousemove', onDocumentMouseMove, false );
      // document.addEventListener( 'mousedown', onDocumentMouseDown, false );
      // document.addEventListener( 'keydown', onDocumentKeyDown, false );
      // document.addEventListener( 'keyup', onDocumentKeyUp, false );

      // //

      // window.addEventListener( 'resize', onWindowResize, false );





















      // ----------------------------------------------------

      let stats = initStats();



      // dat.guiのコントロールエリアの設定
      let controls = new function() {

        this.rotationSpeed = 0;
        this.numberOfObjects = scene.children.length;
        this.positionX = 0;
        this.positionY = 4;
        this.positionZ = 0;
        this.視点を移動する = false;

        // “モデルを削除する”関数の定義と設定
        this.ひとつ戻る = function() {
          let allChildren = scene.children;
          let lastObject = 0;
          if (allChildren.length > 4) {
            lastObject = allChildren[allChildren.length - 1];
            scene.remove(lastObject);
          }
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        this.さかなを削除する = function() {
          scene.remove(scene.getObjectByName("sakana"));
        };
        this.水草を削除する = function() {
          scene.remove(scene.getObjectByName("mizukusa"));
        };
        this.装飾を削除する = function() {
          scene.remove(scene.getObjectByName("sosyoku"));
        };

        // “水槽を初期化”関数の定義と設定
        this.水槽を初期化 = function() {

          scene.remove(scene.getObjectByName("suiso-sikaku"));
          scene.remove(scene.getObjectByName("suiso-entyu"));
        }

        // “四角い水槽”関数の定義と設定
        this.四角い水槽 = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/suiso3.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(5, 5, 5);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 2;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.57;
            model.rotation.z = -1.57;
            // model.opacity = 0.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "suiso-sikaku";

            // 配列に水槽名を保存
            model_csv[3] = ["suiso-sikaku", 0, 2, 0];

            // 変数suiso_nameにモデル名を保存
            if (suiso_name != model.name) {
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “円柱の水槽”関数の定義と設定
        this.円柱の水槽 = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/suiso_entyu3.dae', (collada) => {
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(17, 17, 17);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 2;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.57;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "suiso-entyu";

            // 配列に水槽名を保存
            model_csv[3] = ["suiso-entyu", 0, 2, 0];
            // 変数suiso_nameにモデル名を保存
            if (suiso_name != model.name) {
              suiso_name = model.name;
            }
            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // さかなカウンタ
        let sakana_count = 0;

        // “さかなを追加する”関数の定義と設定
        this.さかなを追加する = function() {
          // 3dsファイルのパスを指定
          loader.load('./models/sakana01.dae', (collada) => {
            sakana_count++;
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(1.25, 1.25, 1.25);
            // 表示する位置を指定
            model.position.x = -15 + Math.round((Math.random() * 35));
            model.position.y = -10 + Math.round((Math.random() * 25));
            model.position.z = -12 + Math.round((Math.random() * 23));
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            model.name = "sakana";
            // model.name = "sakana-" + sakana_count;
            // オブジェクトをシーンに追加
            scene.add(model);
            // 配列"model_csv"に要素を追加する
            model_csv.push(["sakana-" + sakana_count, model.position.x, model.position.y, model.position.z]);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // 水草カウンタ
        let mizukusa_count = 0;
        let object;
        // “水槽を追加する”関数の定義と設定
        this.水草を追加する = function() {
          // 3dsファイルのパスを指定
          object = loader.load('./models/mizukusa01.dae', (collada) => {
            mizukusa_count++;
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(3, 3, 3);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = 0;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            // model.name = "mizukusa";
            model.name = "mizukusa-" + mizukusa_count;
            // mizukusa_name配列に名前を保存
            mizukusa_name.push(["mizukusa-" + mizukusa_count, 0, 0, 0]);
            // 水草の座標のGUIの定義と設定
            guiPosition = gui.addFolder('水草の座標' + mizukusa_count);
            var contX = guiPosition.add(controls, 'positionX', -50, 50);
            var contZ = guiPosition.add(controls, 'positionZ', -50, 50);
            // 座標のｘ軸の設定とチェックボックスの判定
            contX.listen();
            contX.onChange(function(value) {
              model.position.x = controls.positionX;
            });
            // 座標のｙ軸の設定とチェックボックスの判定
            contZ.listen();
            contZ.onChange(function(value) {
              model.position.z = controls.positionZ;
            });

            // 配列"model_csv"に要素を追加する
            model_csv.push(["mizukusa-" + mizukusa_count, model.position.x, model.position.y, model.position.z]);

            // オブジェクトをシーンに追加
            scene.add(model);

          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        let sosyoku_count = 0;

        // “装飾を追加する”関数の定義と設定
        this.装飾を追加する = function() {

          // 3dsファイルのパスを指定
          loader.load('./models/isi3.dae', (collada) => {
            sosyoku_count++;
            // 読み込み後に3D空間に追加
            let model = collada.scene;
            // 表示するサイズを指定
            model.scale.set(10, 10, 10);
            // 表示する位置を指定
            model.position.x = 0;
            model.position.y = -7.7;
            model.position.z = 0;
            // 表示する角度の指定
            model.rotation.x = -1.5;
            // 影の設定
            model.castShadow = true;
            // オブジェクトの名前を指定
            // model.name = "sosyoku";
            model.name = "sosyoku-" + sosyoku_count;
            // sosyoku_name配列に名前を保存
            sosyoku_name.push(["sosyoku-" + sosyoku_count, 0, 0, 0]);
            // 装飾品の座標のGUIの定義と設定
            guiPosition = gui.addFolder('装飾品の座標' + sosyoku_count);
            // 装飾の座標のGUIの定義と設定
            var contX = guiPosition.add(controls, 'positionX', -50, 50);
            var contZ = guiPosition.add(controls, 'positionZ', -50, 50);
            // 座標のｘ軸の設定とチェックボックスの判定
            contX.listen();
            contX.onChange(function(value) {
              model.position.x = controls.positionX;
            });
            // 座標のｚ軸の設定とチェックボックスの判定
            contZ.listen();
            contZ.onChange(function(value) {
              model.position.z = controls.positionZ;
            });
            // 配列"model_csv"に要素を追加する
            model_csv.push(["sosyoku-" + sosyoku_count, model.position.x, model.position.y, model.position.z]);
            // 配列"ssk_name"に要素を追加する
            // ssk_num.push(["sosyoku-" + sosyoku_count, model.position.x, model.position.y, model.position.z]);
            // オブジェクトをシーンに追加
            scene.add(model);
          });
          // シーンにあるオブジェクトの数を更新
          this.numberOfObjects = scene.children.length;
        };

        // “視点を戻す”関数の定義と設定
        this.視点を戻す = function() {
          // カメラの初期値を指定
          camera.position.x = 0;
          camera.position.y = 20;
          camera.position.z = 60;
          camera.lookAt(scene.position);
        };

        // “モデルを保存する”関数の定義と設定
        this.マイ水槽を保存 = function() {

          model_csv[0][0] = sakana_count;
          model_csv[1][0] = mizukusa_count;
          model_csv[2][0] = sosyoku_count;

          console.log(model_csv);


          for (i = 0; i < model_csv.length; i++) {

            // 水草の個々の座標の保存
            for (let mzks_num = 0; mzks_num < mizukusa_name.length; mzks_num++) {

              // ["モデル名", x, y, z]のモデル名のみ比較
              if (model_csv[i][0] === mizukusa_name[mzks_num][0]) {
                let k = mizukusa_name[mzks_num][0];
                let j = scene.getObjectByName(String(k));

                // 水草の移動後のｘ座標とｚ座標の値に変更する
                model_csv[i][1] = Math.floor(j.position.x);
                model_csv[i][3] = Math.floor(j.position.z);
              }
            }

            // 装飾品の個々の座標の保存
            for (let ssk_num = 0; ssk_num < sosyoku_name.length; ssk_num++) {

              // ["モデル名", x, y, z]のモデル名のみ比較
              if (model_csv[i][0] === sosyoku_name[ssk_num][0]) {
                let k = sosyoku_name[ssk_num][0];
                let j = scene.getObjectByName(String(k));

                // 装飾の移動後のｘ座標とｚ座標の値に変更する
                model_csv[i][1] = Math.floor(j.position.x);
                model_csv[i][3] = Math.floor(j.position.z);
              }
            }
            // console.log(model_csv)
            // model_csv = [];
          }

          let qwe = ArrayToCSV(model_csv);

          let json = JSON.stringify(model_csv);

          console.log(json);

          // ajax(json);

          // ここからAjaxでJavaScriptからPHPに配列を送る
          // ------------------------------------------------------------------
          $(function() {
            $.ajax({
              //POST通信
              type: "POST",
              //ここでデータの送信先URLを指定します。
              url: "csv_receive_and_save.php",
              data: {
                model_erea: json
              },
              //処理が成功したら
              success: function(data) {
                //HTMLファイル内の該当箇所にレスポンスデータを追加する場合
                //  $('#sample').html("送信成功しました");
                alert("送信成功しました");
              },
              //処理がエラーであれば
              error: function() {
                alert('通信エラー');
              }
            });
            //submitによる画面リロードを防いでいます。
            return false;
          });
          // ------------------------------------------------------------------


          // (new CSV(model_csv)).save('scene.csv')
        }
      };


      // dat.GUIの設定
      let gui = new dat.GUI();
      // チェックボックスのパラメーターの設定(今回はtrue,false)
      let = parameters = {
        a: false,
        b: false,
      }

      // dat.GUIのコントロールに水槽の選択を追加
      let suiso_select = gui.addFolder("水槽を選択してください");
      let suiso1 = suiso_select.add(parameters, 'a').name('四角い水槽').listen().onChange(function() {
        setChecked("a");
        controls.水槽を初期化();
        controls.四角い水槽()
      });
      let suiso2 = suiso_select.add(parameters, 'b').name('円柱形の水槽').listen().onChange(function() {
        setChecked("b");
        controls.水槽を初期化();
        controls.円柱の水槽()
      });

      // 水槽のチェックボックスの判定
      function setChecked(prop) {
        for (let param in parameters) {
          parameters[param] = false;
        }
        parameters[prop] = true;
      }

      // dat.GUIのコントロールにさかなの選択を追加
      let sakana_select = gui.addFolder("さかなを選択してください");
      sakana_select.add(controls, 'さかなを追加する');

      // dat.GUIのコントロールに水草の選択を追加
      let mizukusa_select = gui.addFolder("水草を選択してください");
      mizukusa_select.add(controls, '水草を追加する');

      // dat.GUIのコントロールに装飾品の選択を追加
      let sosyoku_select = gui.addFolder("装飾を選択してください");
      sosyoku_select.add(controls, '装飾を追加する');

      // dat.GUIのコントロールに装飾品の選択を追加
      let delete_select = gui.addFolder("削除するモデルを選択してください");
      delete_select.add(controls, 'ひとつ戻る');
      delete_select.add(controls, 'さかなを削除する');
      delete_select.add(controls, '水草を削除する');
      delete_select.add(controls, '装飾を削除する');



      // dat.GUIのコントロールに関数を追加
      // gui.add(controls, 'さかなを追加する');
      // gui.add(controls, '水草を追加する');
      // gui.add(controls, '装飾を追加する');
      // gui.add(controls, 'モデルを削除する');
      // gui.add(controls, '水槽を初期化');
      gui.add(controls, '視点を戻す');
      gui.add(controls, 'マイ水槽を保存');

      // 画面を更新するrender関数を呼び出す
      render();

      // let raycaster;

      // document.addEventListener( 'mousemove', onClick, false );



      // 画面を更新する関数
      function render() {
        // let raycaster = new THREE.Raycaster();
        // stats.update();

        // raycaster.setFromCamera( mouse, camera );

        // const intersects = raycaster.intersectObjects( scene.children );
        // // console.log(scene.children)

        // if ( intersects.length > 0 ) {

        //   if ( INTERSECTED != intersects[ 0 ].object ) {

        //     if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );

        //     INTERSECTED = intersects[ 0 ].object;
        //     INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
        //     INTERSECTED.material.emissive.setHex( 0xff0000 );

        //     console.log(INTERSECTED)
        //   // scene.remove(INTERSECTED);

        //   }

        // } else {

        //   if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );


        //   INTERSECTED = null;

        // }




        // render using requestAnimationFrame
        requestAnimationFrame(render);
        renderer.render(scene, camera);
      }

      // HTML要素への表示の設定
      function initStats() {

        let stats = new Stats();
        stats.setMode(0); // 0: fps, 1: ms
        stats.domElement.style.position = 'absolute';
        stats.domElement.style.left = '0px';
        stats.domElement.style.top = '0px';
        document.getElementById("Stats-output").appendChild(stats.domElement);

        return stats;
      }
    }


    // ここから配列をcsvに変換します
    function ArrayToCSV(array) {
      var csv = "";
      for (var i = 0; i < array.length; i++) {
        csv += array[i] + ",";
      }
      csv = csv.slice(0, -1);
      return csv;
    }










    function onWindowResize() {

      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();

      renderer.setSize(window.innerWidth, window.innerHeight);

    }

    function onDocumentMouseMove(event) {

      event.preventDefault();

      mouse.set((event.clientX / window.innerWidth) * 2 - 1, -(event.clientY / window.innerHeight) * 2 + 1);

      raycaster.setFromCamera(mouse, camera);

      const intersects = raycaster.intersectObjects(objects);

      if (intersects.length > 0) {

        const intersect = intersects[0];

        rollOverMesh.position.copy(intersect.point).add(intersect.face.normal);
        rollOverMesh.position.divideScalar(50).floor().multiplyScalar(50).addScalar(25);

      }

      render();

    }

    function onDocumentMouseDown(event) {

      event.preventDefault();

      mouse.set((event.clientX / window.innerWidth) * 2 - 1, -(event.clientY / window.innerHeight) * 2 + 1);

      raycaster.setFromCamera(mouse, camera);

      const intersects = raycaster.intersectObjects(objects);

      if (intersects.length > 0) {

        const intersect = intersects[0];

        // delete cube

        if (isShiftDown) {

          if (intersect.object !== plane) {

            scene.remove(intersect.object);

            objects.splice(objects.indexOf(intersect.object), 1);

          }

          // create cube

        } else {

          const voxel = new THREE.Mesh(cubeGeo, cubeMaterial);
          voxel.position.copy(intersect.point).add(intersect.face.normal);
          voxel.position.divideScalar(50).floor().multiplyScalar(50).addScalar(25);
          scene.add(voxel);

          objects.push(voxel);

        }

        render();

      }

    }

    function onDocumentKeyDown(event) {

      switch (event.keyCode) {

        case 16:
          isShiftDown = true;
          break;

      }

    }

    function onDocumentKeyUp(event) {

      switch (event.keyCode) {

        case 16:
          isShiftDown = false;
          break;

      }

    }











    // ここからマウスをクリックしたモデルを削除する処理を書いていきます


    // function onClick( event ) {

    //   event.preventDefault();

    //   mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
    //   mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;

    // }

    // event.preventDefault();


    // window.onmousedown = function (){

    // var raycaster = new THREE.Raycaster();
    // var mouse = new THREE.Vector2();
    // mouse.x = (event.clientX / window.innerWidth) * 2 -1;
    // mouse.y = - (event.clientY / window.innerHeight) * 2 +1;
    // raycaster.setFromCamera(mouse, camera);

    // var intersects = raycaster.intersectObjects( scene.children);
    // if (intersects.length > 0) { // 何かにぶつかった
    //   for (var i = 0; i < intersects.length; i++) {
    //     // intersects[ i ]; ぶつかったオブジェクト
    //     // scene.remove(intersects[i]);
    //     console.log(intersects[i]);
    //   }
    //   alert("click!!")
    // }
    // }

    // var projector = new THREE.Projector();
    // //マウスのグローバル変数
    // var mouse = { x: 0, y: 0 };
    // //オブジェクト格納グローバル変数
    // var targetList = [];


    // //マウスが押された時
    // window.onmousedown = function (ev){
    //   if (ev.target == renderer.domElement) {

    //       //マウス座標2D変換
    //       var rect = ev.target.getBoundingClientRect();
    //       mouse.x =  ev.clientX - rect.left;
    //       mouse.y =  ev.clientY - rect.top;

    //       //マウス座標3D変換 width（横）やheight（縦）は画面サイズ
    //       mouse.x =  (mouse.x / window.innerWidth) * 2 - 1;
    //       mouse.y = -(mouse.y / window.innerHeight) * 2 + 1;

    //       // マウスベクトル
    //       var vector = new THREE.Vector3( mouse.x, mouse.y ,1);

    //       // vector はスクリーン座標系なので, オブジェクトの座標系に変換
    //       projector.unprojectVector( vector, camera );

    //       // 始点, 向きベクトルを渡してレイを作成
    //       var ray = new THREE.Raycaster( camera.position, vector.sub( camera.position ).normalize() );

    //       // クリック判定
    //       var obj = ray.intersectObjects( targetList );

    //       // クリックしていたら、alertを表示
    //       if ( obj.length > 0 ){

    //         alert("click!!")

    //       }

    //     }
    //   };

    // 画面がロードされたらinitを呼び出す
    window.onload = init;
  </script>
</body>

</html>